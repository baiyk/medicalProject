<?php
/**

* Author: admin

* Create Time: 12/6/15 11:33 下午

* Document_model.php

*/
class Document_model extends CI_Model{

    /**
     * 根据classification来获取相关的课件
     * @param $classification
     */
    public function getDocumentList($classification){
        $sql = "SELECT GUID,name,owner,path FROM DOCUMENT WHERE classification = ?";
        $userQuery = $this->db->query($sql, array($classification));
        $userResult = $userQuery->result();
        return $userResult;
    }

    /**
     * 保存文件的信息
     * @param $document
     */
    public function saveDocument($document){
        $this->load->model("User_model",'',true);
        $userInfo = $this->User_model->getUserInfo();
        $document["guid"] = $this->get_guid();
        $document["owner"] = $userInfo->userId;
        $this->db->insert('document', $document);
    }
}

 