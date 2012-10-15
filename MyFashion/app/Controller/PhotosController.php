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
class PhotosController extends AppController {
    public $helpers = array('Form','Html');

    public function index () {
        $this->Session->write("uid", 1);
    }
    
    public function upload_photo () {
        if (!empty($this->data)) {
            $photo["pname"] = $this->data["Photo"]["pname"]["name"];
            $photo["pname_tmp"] = $this->data["Photo"]["pname"]["tmp_name"];
            $photo["pdes"] = $this->data["Photo"]["pdes"];
            $photo["postdate"] = date("Y-m-d");
            $photo["uid"] = $this->Session->read("uid");
            $photo["isenable"] = 1;
            $photo["isdelete"] = 0;
            if (!$this->upload_photo_fashion($photo)) {
                $this->Session->setFlash ("Unable to save photo.");
            } else {
                $this->Session->setFlash ("Photo saved.");
            } $this->redirect("index/");
        }
    }

    public function upload_photo_fashion ($photo) {
        if ($this->Photo->save($photo)) {
            if (move_uploaded_file($photo["pname_tmp"], WWW_ROOT."Uploaded_Photos/".$photo["pname"])) {
                return true;
            } else return false;
        } else return false;
    }
    
    public function abc () {
        $this->disable_photo(1);
        exit();
    }

    public function disable_photo ($pid) {
        $photo["id"] = $pid;
        $photo["isenable"] = 0;
        $this->Photo->save($photo);
    }

    public function delete_photo () {
        
    }
    
    public function update_description () {
        
    }
    
    public function resize_photo () {
        
    }
    
    public function top_ten_photo () {
        
    }
    
    public function lastest_photo () {
        
    }
    
    public function capture_photo () {
        
    }
}

?>
