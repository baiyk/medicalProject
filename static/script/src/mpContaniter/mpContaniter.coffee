define(['doT!../views/main/doctorInfo', 'doT!../views/log/login', 'mpContaniterModel', 'aboutUsCtrl', 'desPartnersCtrl', 'ui.dialog'], (doctorInfo, loginTmp, mpContaniterModel, aboutUsCtrl, desPartnersCtrl)->
  class mpContaniter
    mainPanel = null
    mainHeader = null
    mainBody = null
    doctorUrlPanel = null
    menuListPanel = null
    constructor: ->
      mainPanel = $('.mainPanel')
      mainBody = mainPanel.find('.mainBody')
      mainHeader = mainPanel.find('.headerPanel')
      doctorUrlPanel = mainBody.find('.doctorListPanel')
      menuListPanel = mainPanel.find('.menuList')
      @mpContaniterModel = new mpContaniterModel();
      doctorUrlList = @mpContaniterModel.getDoctorUrlList();

      urlPanel = ''
      for doctorData in doctorUrlList
        urlPanel += """<div id=""" + doctorData.id + """ class="doctorPic">
                          <img src=""" + "img" + doctorData.url + """>
                      </div>"""
      doctorUrlPanel.find('.doctorListScroll').append(urlPanel)
      @bindEvent()

    bindEvent: =>
      mainHeader.on('click', '.login', (event)=>
        loginPanel = $(loginTmp('')).dialog(
            title: '登陆'
            modal: true;
            width: 300;
            height: 250;
            resizable: false
        ).on('click', '.login', (event)=>
          loginObj = {}
          loginObj = @mpContaniterModel.login(loginPanel, loginObj)
        )

      ).on('click', '.aboutUs', (event)=>
        new aboutUsCtrl(mainBody)
      ).on('click', '.DesPartners', (event)=>
        new desPartnersCtrl(mainBody)
      )


      doctorUrlPanel.on('click', '.doctorPic img', (event)=>
          doctorPic = $(event.currentTarget)
          id = doctorPic.attr('id')
          $(doctorInfo({id:id})).dialog(
            title: '医生信息'
            modal: true;
            width: 300;
            height: 250;
            resizable: false
          )
      )

      doctorPicIndex = 1
      changeDotImg = window.setInterval(=>
        if(doctorUrlPanel.length == 0)
          window.clearInterval(changeDotImg)
        doctorPicIndex++
#        doctorUrlPanel.find('.showPic').removeClass('showPic')
        marginLeft = (doctorPicIndex - 1) * 115
        doctorUrlPanel.find('.doctorPic').first().css('margin-left', '-'+marginLeft+'px')
#        doctorUrlPanel.find('#'+doctorPicIndex).addClass('showPic')
#        console.log(doctorPicIndex)
        if doctorPicIndex == 3
          doctorPicIndex = 0
      ,'2000')
)