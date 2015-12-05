define(['doT!../views/USAExperts/USAExperts', 'doT!../views/USAExperts/MedicalSubjects', 'doT!../views/USAExperts/allSubjectsDoc','USAExpertsModel', 'ui.dialog'], (USAExpertsTmp, MedicalSubjectsTmp, allSubjectsDocTmp, USAExpertsModel)->
  class USAExpertsContaniter
    usaExpertsContaniter = null
    chinaSubjectsContaniter = null
    constructor: (mainBody)->
      mainBody.html(USAExpertsTmp)
      usaExpertsContaniter = mainBody.find('.USAExpertsContaniter')
      chinaSubjectsContaniter = usaExpertsContaniter.find('.chinaSubjects')
      @expertsModule = new USAExpertsModel()
      @bindEvent()

    bindEvent: =>
      usaExpertsContaniter.on('click', '.allSubjectsTitle', (event)=>
        msData = @expertsModule.getMedicalSubjectsData()
        chinaSubjectsContaniter.replaceWith($(MedicalSubjectsTmp(msData)))
      ).on('click', '.doctorName', (event)=>
        doctorNameDom = $(event.currentTarget)
        $(allSubjectsDocTmp()).dialog(
          title: doctorNameDom.text()
          modal: true
          width: 500
          height: 500
          resizable: false
        )
      )


)