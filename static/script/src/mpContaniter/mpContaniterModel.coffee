define([], ()->
  class mpContaniterModel
    constructor: ->

    getDoctorUrlList: =>
      return [{id:1,url:'doctor/doctor1.png'},{id:2,url:'doctor/doctor2.png'}, {id:3,url:'doctor/doctor3.png'}]

    getDocumentList : (classification,callback)=>
      $.post(
        BASEPATH + "Document/getDocumentList",
        {
          classification : classification
        },
      (responseMsg)->
        if responseMsg.errorCode
          alert(responseMsg.errorDesc);
          return;
        callback && callback()
      ,"json")

    getDocumentList: (classification,callback)=>
      $.post(
        BASEPATH + "Document/getDocumentList",
        {
           classification : classification
        },
      (responseMsg)->
        if responseMsg.errorCode
          alert(responseMsg.errorDesc);
          return;
        callback && callback(responseMsg)
      ,"json")

    login: (loginPanel, loginObj, successHandler)=>
      loginDataList = loginPanel.find('.loginForm').serializeArray()
      for i in [0...loginDataList.length]
        loginData = loginDataList[i]
        loginObj[loginData.name] = loginData.value
      $.post(
        BASEPATH + "Login/loginSystem",
        {
          user : {
            userId : loginObj.userId
            pwd : loginObj.pwd
          }
        },
        (responseMsg)->
          if responseMsg.errorCode
            alert(responseMsg.errorDesc);
            return;
          responseUserInfo = responseMsg.userInfo || {}
          ##存一下用户名，方便使用
          $.cookie.setCookie("userid",responseUserInfo.userId)
          loginPanel.dialog('close')
          ##关闭弹出窗口
      ,"json")

    register: (registerPanel, registerObj)=>
      loginDataList = registerPanel.find('.registerForm').serializeArray();
      for i in [0...loginDataList.length]
        loginData = loginDataList[i]
        registerObj[loginData.name] = loginData.value
      ##这儿加一个手机和邮箱的验证 还有一个图形验证码的验证，样式帮我调调。我这儿编译不了less...
      if(registerObj.pwd != registerObj.resetPwd)
        alert('密码不一致');
        registerObj = {}
        return
      $.post(
        BASEPATH + "Register/registerUser",
        {
          user : {
            userId : registerObj.userId
            pwd : registerObj.pwd
            captcha : registerObj.captcha
          }
        },
      (responseMsg)->
        ##当errorCode 为 1004的时候要重新刷新验证码 还有给验证码那个图片加上点击刷新验证码的功能就是 点击图片给那个图片的路径后面加上时间戳就可以刷新验证码了
        if responseMsg.errorCode
          alert(responseMsg.errorDesc);
          return;
        ##注册完成后是要自动给它登录还是，提示让他马上登录
        registerPanel.dialog('close')

        ##关闭弹出窗口
      ,"json")



)