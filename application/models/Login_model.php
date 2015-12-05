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
            throw new Exception("用户不存在",1002);
        }
        return $userResult[0];
    }
}
 