<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhotosController
 *
 * @author apple
 */
include 'resize_class.php';
class PhotosController extends AppController {
    public $helpers = array('Form','Html');
    public $components = array('Session');
    public $uses = array('Photo','Comment', 'Like');

    public function index ($pid = null, $act = null) {
        if (!empty($this->data)) {
            $cmt["uid"] = 1;
            $cmt["pid"] = $this->data["Photo"]["pid"];
            $cmt["cmt"] = $this->data["Photo"]["cmt"];
            $cmt["cmtdate"] = date('Y-m-d H:i:s');

            if ($this->Comment->insert_comment($cmt)) {
                $this->Session->setFlash("Comment posted.");
            } else {
                $this->Session->setFlash("Unable to post comment.");
            }
        }
        $this->Session->write("uid", 1);
        $photos = $this->Photo->find('all', array("conditions"=>array("isdelete=0 AND (uid=".$this->Session->read("uid")." OR isenable=1)")));
        $this->set('photos', $photos);
    }
    
    public function like_photo ($pid) {
        $old_like = $this->Like->find('all', array('conditions'=>array('Like.uid'=>$this->Session->read("uid"), 'Like.pid'=>$pid)));
        if ($old_like[0]["Like"]["uid"] != "") {
            $like["id"] = $old_like[0]["Like"]["id"];
            $like["status"] = 1;
        }
        $like["uid"] = $this->Session->read("uid");
        $like["pid"] = $pid;
        $like["likedate"] = date('Y-m-d H:i:s');
        $this->Like->save($like);
        $this->redirect(array("controller"=>"photos", "action"=>"index"));
    }
    
    public function unlike_photo ($pid) {
        $old_like = $this->Like->find('all', array('conditions'=>array('Like.uid'=>$this->Session->read("uid"), 'Like.pid'=>$pid)));
        $like["id"] = $old_like[0]["Like"]["id"];
        $like["uid"] = $this->Session->read("uid");
        $like["pid"] = $pid;
        $like["status"] = 0;
        $this->Like->Save($like);
        $this->redirect(array("controller"=>"photos", "action"=>"index"));
    }

    public function upload () {
        if (!empty($this->data)) {
            $photo["pname"] = $this->data["Photo"]["pname"]["name"];
            $photo["pname_tmp"] = $this->data["Photo"]["pname"]["tmp_name"];
            $photo["pdes"] = $this->data["Photo"]["pdes"];
            $photo["postdate"] = date("Y-m-d H:i:s");
            $photo["uid"] = $this->Session->read("uid");
            $photo["isenable"] = 1;
            $photo["isdelete"] = 0;
            if (!$this->Photo->upload_photo_fashion($photo)) {
                $this->Session->setFlash ("Unable to save photo.");
            } else {
                $this->Session->setFlash ("Photo saved.");
            } $this->redirect("upload/");
        }
    }
    
    public function enable_photo ($pid) {
        $photo["id"] = $pid;
        $photo["isenable"] = 1;
        $this->Photo->save($photo);
        $this->redirect("index/");
    }

    public function disable_photo ($pid) {
        $photo["id"] = $pid;
        $photo["isenable"] = 0;
        $this->Photo->save($photo);
        $this->redirect("index/");
    }

    public function delete_photo ($pid) {
        $photo["id"] = $pid;
        $photo["isdelete"] = 1;
        $photo["isenable"] = 0;
        $this->Photo->save($photo);
        $this->redirect("index/");
    }

    public function update_description ($pid, $pdes) {
        $photo["id"] = $pid;
        $photo["pdes"] = $pdes;
        $this->Photo->save($photo);
    }

    public function resize_photo ($photo) {
        
    }

    public function top_photo ($top_photo_amount) {
//        $this->set("top_photos", $this->Photo->get_top_photo($top_photo_amount));

        $top_photos = $this->Photo->find('all', array('limit'=>$top_photo_amount, 'order'=>array('Photo.postdate DESC, Photo.id DESC')));
        $this->set("top_photos", $top_photos);
    }

    public function lastest_photo ($photo_amount) {
        $lastest_photos = $this->Photo->find('all', array('limit'=>$photo_amount, 'order'=>array('Photo.postdate DESC, Photo.id DESC')));
        $this->set("lastest_photos", $lastest_photos);
    }

    public function capture_photo () {
        
    }

    public function photo_list () {
        $photos = $this->Photo->find('all', array('order'=>array('Photo.postdate DESC, Photo.id DESC')));
        $this->set("photos", $photos);
    }
}

?>
