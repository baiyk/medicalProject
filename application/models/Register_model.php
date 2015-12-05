<?php
/**

 * Author: admin

 * Create Time: 11/23/15 11:51 下午

 * RegisterModel.php

 */

class Register_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function registerUser($user = array()){
        $guid = $this->get_guid();
        if(!$user){
            //添加假数据
            $user = array(
                "guid" => $guid,
                "name" => "白永科",
                "userId" => "18724231982",
                "password" => "123456",
                "userType" => "1",
            );
            $this->db->insert('user', $user);

        }
        return $guid;
    }

}
 