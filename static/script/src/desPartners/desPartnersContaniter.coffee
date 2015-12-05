define(['doT!../views/desPartners/desPartners'], (desPartnersTmp)->
  class desPartnersContaniter
    constructor: (mainBody)->
      mainBody.html(desPartnersTmp)
)