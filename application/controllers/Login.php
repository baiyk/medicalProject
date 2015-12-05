<?php

require_once(APPPATH.'controllers/BaseController.php');
class Login extends BaseController {

    public function loginSystem()
    {
        $user = $this->input->post("user");
        $this->load->model("Login_model",'',true);
        $user_result = $this->Login_model->login_user(array(
            "userId" => "1874231982",
            "password" => "123456"
        ));
        var_dump($user_result);
    }

}
