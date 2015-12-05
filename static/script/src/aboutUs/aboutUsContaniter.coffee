define(['doT!../views/aboutUs/aboutUs'], (aboutUs)->
  class aboutUsContaniter
    constructor: (mainBody)->
      mainBody.html(aboutUs)
)