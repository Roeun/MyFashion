<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentsController
 *
 * @author apple
 */
class CommentsController extends AppController {
    public $helpers = array('Form','Html');
    
    public function index () {}
    
    public function delete_comment ($cmt_id) {
        $cmt["id"] = $cmt_id;
        $cmt["isdelete"] = 1;
        $cmt["isenable"] = 0;
        $this->Comment->save($cmt);
        $this->redirect(array("controller"=>"photos", "action"=>"index"));
    }
}

?>
