// Generated by CoffeeScript 1.10.0
(function() {
  var bind = function(fn, me){ return function(){ return fn.apply(me, arguments); }; };

  define(['doT!../views/USAExperts/USAExperts', 'doT!../views/USAExperts/MedicalSubjects', 'doT!../views/USAExperts/allSubjectsDoc', 'USAExpertsModel', 'ui.dialog'], function(USAExpertsTmp, MedicalSubjectsTmp, allSubjectsDocTmp, USAExpertsModel) {
    var USAExpertsContaniter;
    return USAExpertsContaniter = (function() {
      var chinaSubjectsContaniter, usaExpertsContaniter;

      usaExpertsContaniter = null;

      chinaSubjectsContaniter = null;

      function USAExpertsContaniter(mainBody) {
        this.bindEvent = bind(this.bindEvent, this);
        mainBody.html(USAExpertsTmp);
        usaExpertsContaniter = mainBody.find('.USAExpertsContaniter');
        chinaSubjectsContaniter = usaExpertsContaniter.find('.chinaSubjects');
        this.expertsModule = new USAExpertsModel();
        this.bindEvent();
      }

      USAExpertsContaniter.prototype.bindEvent = function() {
        return usaExpertsContaniter.on('click', '.allSubjectsTitle', (function(_this) {
          return function(event) {
            var msData;
            msData = _this.expertsModule.getMedicalSubjectsData();
            return chinaSubjectsContaniter.replaceWith($(MedicalSubjectsTmp(msData)));
          };
        })(this)).on('click', '.doctorName', (function(_this) {
          return function(event) {
            var doctorNameDom;
            doctorNameDom = $(event.currentTarget);
            return $(allSubjectsDocTmp()).dialog({
              title: doctorNameDom.text(),
              modal: true,
              width: 500,
              height: 500,
              resizable: false
            });
          };
        })(this));
      };

      return USAExpertsContaniter;

    })();
  });

}).call(this);
