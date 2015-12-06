<?php
/**

 * Author: admin

 * Create Time: 11/24/15 11:13 下午

 * Login_model.php

 */
class Login_model extends CI_Model{

    public function login_user($userInfo){
        if(!$userInfo){
            throw new Exception("用户的数据不能为空",1000);
        }
        if(empty($userInfo["userId"])){
            throw new Exception("用户的编号不能空",1001);
        }
        if(empty($userInfo["pwd"])){
            throw new Exception("用户的密码不为空",1001);
        }
        $sql = "SELECT * FROM USER WHERE USERID = ? AND password = ?";
        $userQuery = $this->db->query($sql, array($userInfo["userId"], $userInfo["pwd"]));
        $userResult = $userQuery->result();
        if(count($userResult) <= 0){
            throw new Exception("您输入的账号或密码有误",1002);
        }
        $userInfo = $userResult[0];
        $ip = $_SERVER["REMOTE_ADDR"];
        $token = $this->get_guid();
        $key = md5($ip.$token);
        $this->load->library('session');
        if(!empty($_COOKIE["token"])){
            $old_token = $_COOKIE["token"];
            $old_key = md5($ip.$old_token);
            if(!empty($_SESSION[$old_key])){
                //删除已存在的值
                $this->session->unset_userdata($old_key);
            }
        }
        $flag = $this->session->set_userdata($key,$userInfo);
        $cookie = array(
            'name'   => 'token',
            'value'  => $token,
            'expire' => 60 * 60 * 24,
            'path'   => '/'
        );
        $this->input->set_cookie($cookie);
        return $userInfo;
    }
}
 