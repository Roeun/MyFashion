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
    
    public function delete_comment ($cmt_id, $con, $act, $p=null) {
        $cmt["id"] = $cmt_id;
        $cmt["isdelete"] = 1;
        $cmt["isenable"] = 0;
        $this->Comment->save($cmt);
        $this->redirect(array("controller"=>$con, "action"=>$act, $p));
    }
    
    public function disable_comment ($cmt_id, $con, $act, $p=null) {
        $cmt["id"] = $cmt_id;
        $cmt["isenable"] = 0;
        $this->Comment->save($cmt);
        $this->redirect(array("controller"=>$con, "action"=>$act, $p));
    }
    
    public function enable_comment ($cmt_id, $con, $act, $p=null) {
        $cmt["id"] = $cmt_id;
        $cmt["isenable"] = 1;
        $this->Comment->save($cmt);
        $this->redirect(array("controller"=>$con, "action"=>$act, $p));
    }
}

?>
