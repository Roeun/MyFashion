<?php include 'resize_class.php';
class PhotosController extends AppController {
    public $helpers = array('Form','Html');
    public $uses = array('Photo','Comment', 'Like', 'Security', 'User', 'AppModel');

    public function beforeFilter() {
        parent::beforeFilter();
        AppController::myCheckSession();
    }

    public function index ($pid = null, $act = null) {
        $myUser = $this->Session->read('User');
        $photos = $this->Photo->find('all', array("conditions"=>array("Photo.isdelete=0 AND (Photo.uid=".$myUser['User']['id']." OR Photo.isenable=1)"), 'order'=>array('Photo.postdate DESC')));
        $this->set('photos', $photos);
    }
    
    public function insert_comment () {
        if (!empty($this->data)) {
            $myUser = $this->Session->read('User');
            $cmt["uid"] = $myUser['User']['id'];
            $cmt["pid"] = $this->data["Photo"]["pid"];
            $cmt["cmt"] = $this->Security->sql_injection_input($this->data["Photo"]["cmt"]);
            $cmt["cmtdate"] = date('Y-m-d H:i:s');

            if ($this->Comment->insert_comment($cmt)) {
                $this->Session->setFlash("Comment posted.");
            } else {
                $this->Session->setFlash("Unable to post comment.");
            }
            $this->redirect($this->data["Photo"]["redirect"]);
        }
    }

    public function like_photo ($pid, $con, $act, $p=null) {
        $myUser = $this->Session->read('User');
        $old_like = $this->Like->find('all', array('conditions'=>array('Like.uid'=>$myUser['User']['id'], 'Like.pid'=>$pid)));
        if (count($old_like) > 0) {
            $like["id"] = $old_like[0]["Like"]["id"];
            $like["status"] = 1;
        }
        $like["uid"] = $myUser['User']['id'];
        $like["pid"] = $pid;
        $like["likedate"] = date('Y-m-d H:i:s');
        $this->Like->save($like);
        $this->redirect(array("controller"=>$con, "action"=>$act, $p));
    }
    
    public function unlike_photo ($pid, $con, $act, $p=null) {
        $myUser = $this->Session->read('User');
        $old_like = $this->Like->find('all', array('conditions'=>array('Like.uid'=>$myUser['User']['id'], 'Like.pid'=>$pid)));
        $like["id"] = $old_like[0]["Like"]["id"];
        $like["uid"] = $myUser['User']['id'];
        $like["pid"] = $pid;
        $like["status"] = 0;
        $this->Like->Save($like);
        $this->redirect(array("controller"=>$con, "action"=>$act, $p));
    }

    public function upload () {
        if (!empty($this->data)) {
            $myUser = $this->Session->read('User');
            $photo["pname"] = $this->Security->sql_injection_input($this->data["Photo"]["pname"]["name"]);
            $photo["pname_tmp"] = $this->data["Photo"]["pname"]["tmp_name"];
            $photo["pdes"] = $this->Security->sql_injection_input($this->data["Photo"]["pdes"]);
            $photo["postdate"] = date("Y-m-d H:i:s");
            $photo["uid"] = $myUser['User']['id'];
            $photo["isenable"] = 1;
            $photo["isdelete"] = 0;
            if (!$this->Photo->upload_photo_fashion($photo)) {
                $this->Session->setFlash ("Unable to save photo.");
            } else {
                $this->Session->setFlash ("Photo saved.");
            } $this->redirect("upload/");
        }
    }
    
    public function enable_photo ($pid, $con, $act, $p=null) {
        $photo["id"] = $pid;
        $photo["isenable"] = 1;
        $this->Photo->save($photo);
        $this->redirect(array("controller"=>$con, "action"=>$act, $p));
    }

    public function disable_photo ($pid, $con, $act, $p=null) {
        $photo["id"] = $pid;
        $photo["isenable"] = 0;
        $this->Photo->save($photo);
        $this->redirect(array("controller"=>$con, "action"=>$act, $p));
    }

    public function delete_photo ($pid, $con, $act, $p=null) {
        $photo["id"] = $pid;
        $photo["isdelete"] = 1;
        $photo["isenable"] = 0;
        $this->Photo->save($photo);
        $this->redirect(array("controller"=>$con, "action"=>$act, $p));
    }

    public function update_description ($pid, $pdes) {
        $photo["id"] = $pid;
        $photo["pdes"] = $pdes;
        $this->Photo->save($photo);
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
    
    public function my_fashion () {
        $myUser = $this->Session->read('User');
        $my_fashions = $this->Photo->find('all', array('conditions'=>array('Photo.isdelete=0 AND Photo.uid='.$myUser['User']['id']), 'order'=>array('Photo.postdate DESC')));
        $this->set('my_fashions', $my_fashions);
    }
}

?>
