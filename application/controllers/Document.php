<?php
/**

* Author: admin

* Create Time: 12/6/15 6:56 下午

* Document.php

*/

require_once(APPPATH.'controllers/BaseController.php');
class Document extends BaseController{

     public function getDocumentList(){
         $classification = $this->input->post("classification");
         $this->load->model("Document_model",'',true);
         $documentList = $this->Document_model->getDocumentList($classification);
         $this->output->set_output(json_encode(array("list"=>$documentList)));
     }

}

 