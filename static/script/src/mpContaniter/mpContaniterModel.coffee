define([], ()->
  class mpContaniterModel
    constructor: ->

    getDoctorUrlList: =>
      return [{id:1,url:'/doctor/doctor1.png'},{id:2,url:'/doctor/doctor2.png'}, {id:3,url:'/doctor/doctor3.png'}]


    login: (loginPanel, loginObj, successHandler)=>
      loginDataList = loginPanel.find('.loginForm').serializeArray()
      for i in [0..loginDataList.length]
        loginData = loginDataList[i]
        loginObj[loginData.name] = loginData.val
      $.post(
        basePath + '',
        loginObj
        (response)=>

      ,'json')



)