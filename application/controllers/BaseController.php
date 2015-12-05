<?php
/**

* Author: admin

* Create Time: 11/22/15 11:35 下午

* BaseController.php

*/


class BaseController extends CI_Controller {

    /**
     * 重写调用方法的规则
     * @param $method
     * @param array $param
     */
    public function _remap($method,$param = array()){
        try{

            $this->before_call();
            if(method_exists($this,$method)){
                call_user_func_array(array($this,$method),$param);
            }
            $this->after_call();

        }catch (Exception $e){
            //假设有异常 将异常数据抛出给用户 前台界面展示
            echo json_encode(array(
               "errorCode" => $e->getCode(),
               "errorDesc" => $e->getMessage()
            ));
            exit;
        }

    }

    /**
     * 前置检查方法
     */
    private function before_call(){
        //获取检查公共的规则
        $route = $this->router;
        $routes = $route->routes;
        if(!empty($routes["check_login_controller"])){
            //如果当前控制器在规则中，则去检查用户是否登录状态
            if(in_array($route->class,$routes["check_login_controller"])){
                //检查登录态
                $ip = $_SERVER["REMOTE_ADDR"];
                $token = $_COOKIE["token"];
                $key = md5($ip.$token);
                $this->load->library('session');
                if(empty($_SESSION[$key])){
                    throw new Exception("您尚未登录或登录超时",1000);
                }
            }
        }

    }


    /**
     * 后置检查方法
     */
    private function after_call(){


    }
} 