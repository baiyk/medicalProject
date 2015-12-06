<?php

require_once(APPPATH.'controllers/BaseController.php');
class Register extends BaseController {

    public function registerUser()
    {
        $user = $this->input->post("user");
        if(empty($user)){
            throw new Exception("注册信息不完善，请填写正确",1000);
        }
        if(empty($user["captcha"])){
            throw new Exception("验证码不能为空",1000);
        }
        if(empty($user["userId"])){
            throw new Exception("注册信息不完善，请填写正确",1000);
        }
        $this->load->model("Register_model",'',true);
        $isExit = $this->Register_model->isExitUser($user["userId"]);
        if($isExit){
            throw new Exception("该账号已存在，请更换用户名",1000);
        }
        $this->load->model("Verify_model",'',true);
        $this->Verify_model->verifyImgCaptcha($user["captcha"]);
        $user_guid = $this->Register_model->registerUser($user);
        $this->output->set_output(json_encode(array("guid"=>$user_guid)));
    }

}
