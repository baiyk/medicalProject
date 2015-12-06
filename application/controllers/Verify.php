<?php
/**

* Author: admin

* Create Time: 12/6/15 11:19 上午

* Verify.php

*/

require_once(APPPATH.'controllers/BaseController.php');
class Verify extends BaseController {

    /**
     * 生成验证码
     * yongke.bai
     * 2015120611
     */
    public function getImgCaptcha(){
        $this->load->model("Verify_model",'',true);
        $this->Verify_model->createCaptcha();
    }

}

 