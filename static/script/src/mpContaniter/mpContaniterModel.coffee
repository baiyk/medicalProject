define([], ()->
  class mpContaniterModel
    constructor: ->

    getDoctorUrlList: =>
      return [{id:1,url:'doctor/doctor1.png'},{id:2,url:'doctor/doctor2.png'}, {id:3,url:'doctor/doctor3.png'}]


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

          loginPanel.dialog('close')
          ##关闭弹出窗口
      ,"json")

    register: (registerPanel, registerObj)=>
      loginDataList = registerPanel.find('.registerForm').serializeArray();
      for i in [0...loginDataList.length]
        loginData = loginDataList[i]
        registerObj[loginData.name] = loginData.value

      if(registerObj.pwd != registerObj.resetPwd)
        alert('密码不一致');
        registerObj = {}
        return
      $.post(
        BASEPATH + "Login/loginSystem",
        {
          user : {
            userId : registerObj.userId
            pwd : registerObj.pwd
          }
        },
      (responseMsg)->
        if responseMsg.errorCode
          alert(responseMsg.errorDesc);
          return;
        registerPanel.dialog('close')

        ##关闭弹出窗口
      ,"json")



)