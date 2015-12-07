<?php
/**

* Author: admin

* Create Time: 12/6/15 3:40 下午

* File.php

*/
require_once(APPPATH.'controllers/BaseController.php');
class File extends BaseController{


    /**
     * 上传文件
     * @throws Exception
     */
    public function uploadFile(){
        $classification = $this->input->post("classification"); //获取上传文件的分类
        $this->load->model('User_model','',true);
        $uploadFlag = $this->User_model->getUploadPermission();
        if(!$uploadFlag){
            throw new Exception("您没有上传权限！");
        }
        $config['upload_path']      = "./file";
        $config['allowed_types']    = 'gif|jpg|txt|png|doc|pdf|mp4|rmvb|application/vnd.rn-realmedia|wvm|mkv|avi|mpeg';
        //限制50M
        $config['max_size']     = 1024 * 50;
        $config['max_width']        = 1024;
        $config['max_height']       = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            throw new Exception($error["error"],"1000");
        }
        else
        {
            $fileInfo = $this->upload;
            //生成document数据
            $this->load->model("Document_model",'',true);
            $document = array(
                "name" => $fileInfo->file_name,
                "type" => $fileInfo->file_ext,
                "size" => $fileInfo->file_size,
                "path" => $fileInfo->upload_path,
                "classification" => $classification,
            );
            $this->Document_model->saveDocument($document);

        }
    }

}

 