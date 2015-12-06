<?php
/**

* Author: admin

* Create Time: 12/6/15 11:54 上午

* Verify_model.php

*/
class Verify_model extends CI_Model{
    /**
     * @throws Exception
     * 生成验证码 ， 存放到token相对应的session里面
     */
    public function  createCaptcha(){
        $token = $_COOKIE["token"];
        if(empty($token)){
            throw new Exception("无法生产验证码，请稍后在试");
        }
        $string = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str = "";
        for($i=0;$i<4;$i++){
            $pos = rand(0,35);
            $str .= $string{$pos};
        }
        $this->load->library('session');
        $flag = $this->session->set_userdata($token."_captcha",$str);
        $img_handle = Imagecreate(80, 20);  //图片大小80X20
        $back_color = ImageColorAllocate($img_handle, 255, 255, 255); //背景颜色（白色）
        $txt_color = ImageColorAllocate($img_handle, 0,0, 0);  //文本颜色（黑色）

        //加入干扰线
        for($i=0;$i<3;$i++)
        {
            $line = ImageColorAllocate($img_handle,rand(0,255),rand(0,255),rand(0,255));
            Imageline($img_handle, rand(0,15), rand(0,15), rand(100,150),rand(10,50), $line);
        }
        //加入干扰象素
        for($i=0;$i<200;$i++)
        {
            $randcolor = ImageColorallocate($img_handle,rand(0,255),rand(0,255),rand(0,255));
            Imagesetpixel($img_handle, rand()%100 , rand()%50 , $randcolor);
        }
        Imagefill($img_handle, 0, 0, $back_color);             //填充图片背景色
        ImageString($img_handle, 28, 20, 0, $str, $txt_color);//水平填充一行字符串
        ob_clean();   // ob_clean()清空输出缓存区
        header("Content-type: image/png"); //生成验证码图片
        Imagepng($img_handle);//显示图片

    }

    public function verifyImgCaptcha($captcha){
        $token = $_COOKIE["token"];
        if(empty($token)){
            throw new Exception("系统繁忙,请刷新该页面",1000);
        }
        $key = $token.'_captcha';
        $this->load->library('session');
        if(empty($_SESSION[$key])){
            throw new Exception("验证码已失效，请刷新验证码",1004);
        }
        if($_SESSION[$key] != $captcha){
            throw new Exception("输入的验证码有误",1003);
        }

        $this->session->set_userdata($key);
        return true;
    }
}

 