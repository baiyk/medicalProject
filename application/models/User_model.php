<?php
/**

* Author: admin

* Create Time: 12/6/15 3:51 下午

* User_model.php

*/
class User_model extends CI_Model{

    /**
     * 用户是否存在
     * @param $userId
     * @return bool
     */
    public function isExitUser($userId){
        $sql = "SELECT GUID FROM USER WHERE USERID = ?";
        $userQuery = $this->db->query($sql, array($userId));
        $userResult = $userQuery->result();
        if(count($userResult) <= 0){
            return false;
        }
        return true;
    }

    /**
     * 获取用户的信息
     */
    public function getUserInfo(){
        $ip = $_SERVER["REMOTE_ADDR"];
        $token = $_COOKIE["token"];
        $key = md5($ip.$token);
        $this->load->library('session');
        if(!empty($_SESSION[$key])){
            return $_SESSION[$key];
        }
        throw new Exception("请先登录或登录超时");
    }

    /**
     * 获取用户是否用上传的权限
     */
    public function getUploadPermission(){
        $userInfo = $this->getUserInfo();
        if($userInfo->isAdmin == "1"){
            return true;
        }
        return false;
    }

}

 