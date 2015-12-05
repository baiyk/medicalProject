<?php

require_once(APPPATH.'controllers/BaseController.php');
class Register extends BaseController {

    public function registerUser()
    {
         $user = $this->input->post("user");
         $this->load->model("Register_model",'',true);
         $user_guid = $this->Register_model->registerUser();
         var_dump($user_guid);
    }

}
