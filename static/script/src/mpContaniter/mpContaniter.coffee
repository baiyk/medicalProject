define(['doT!../views/main/doctorInfo', 'doT!../views/log/login', 'doT!../views/log/register', 'mpContaniterModel', 'aboutUsCtrl', 'desPartnersCtrl', 'USAExpertsCtrl', 'ui.dialog'], (doctorInfo, loginTmp, registerTmp, mpContaniterModel, aboutUsCtrl, desPartnersCtrl, USAExpertsCtrl)->
  class mpContaniter
    mainPanel = null
    mainHeader = null
    mainBody = null
    doctorUrlPanel = null
    menuListPanel = null
    documentPanel = null
    currentClass = ""
    table_head = null
    constructor: ->
      mainPanel = $('.mainPanel')
      mainBody = mainPanel.find('.mainBody')
      table_head = mainBody.find(".table_head")
      currentClass = table_head.find("span:eq(0)").data("id") || "XXG"
      mainHeader = mainPanel.find('.headerPanel')
      doctorUrlPanel = mainBody.find('.doctorListPanel')
      documentPanel = mainBody.find(".document_context")
      menuListPanel = mainPanel.find('.menuList')
      @mpContaniterModel = new mpContaniterModel();
      doctorUrlList = @mpContaniterModel.getDoctorUrlList();

      urlPanel = ''
      for doctorData in doctorUrlList
        urlPanel += """<div id=""" + doctorData.id + """ class="doctorPic">
                          <img src=""" + IMG_BASEPATH + doctorData.url + """>
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

      ).on('click', '.register', (event)=>
        registerPanel = $(registerTmp('')).dialog(
          title: '注册'
          modal: true;
          width: 400;
          height: 400;
          resizable: false
        ).on('click', '.register', (event)=>
          registerObj = {}
          registerObj = @mpContaniterModel.register(registerPanel, registerObj)

        )
      ).on('click', '.aboutUs', (event)=>
        new aboutUsCtrl(mainBody)
      ).on('click', '.DesPartners', (event)=>
        new desPartnersCtrl(mainBody)
      ).on('click', '.USAExperts', (event)=>
        new USAExpertsCtrl(mainBody)
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


      mainBody.on("click",".courseware",(event)=>
        ##点击课件
        doctorUrlPanel.hide();
        documentPanel.show();
        ##获取分类的文件列表
        @mpContaniterModel.getDocumentList($(".file_classification").val(),(responseMsg)->
          console.log(responseMsg)
        )
      ).on("click",".change_classification",(event)=>
        ##更换分类  心血管 ， 牙科。。。
        _this = $(event.currentTarget)
        $(".file_classification").val(_this.data("id"))
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