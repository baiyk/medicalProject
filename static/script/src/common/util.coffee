$(->

  getCookieVal = (offset)->
    endstr = document.cookie.indexOf(";", offset)
    if endstr == -1
      endstr = document.cookie.length
    return decodeURIComponent(decodeURIComponent(document.cookie.substring(offset, endstr)))

  ##获取cookie的值
  getCookieStr = (name,path)->
    arg = name + "="
    alen = arg.length
    clen = document.cookie.length
    i = 0
    j = 0
    while(i < clen)
      j = i + alen;
      if (document.cookie.substring(i, j) == arg)
        return getCookieVal(j);
      i = document.cookie.indexOf(" ", i) + 1;
      if(i == 0)
        break;
    return null;

  ##添加cookie
  setCookie = (cookiename, cookievalue, hours = 24, path = '/')->
    date = new Date();
    date.setTime(date.getTime() + Number(hours) * 3600 * 1000);
    document.cookie = cookiename + "=" + cookievalue + "; path=" + path + ";expires = " + date.toGMTString();

  GLOBAL_COOKIE = {}


  ##cookie的相关方法
  $.cookie = {
  ##获取cookie中的值
    getCookie : (name)->
      return if GLOBAL_COOKIE[name] then GLOBAL_COOKIE[name] else getCookieStr(name)

    setCookie : (key,value,hour,path)->
      setCookie(key,value,hour,path)
  }
);