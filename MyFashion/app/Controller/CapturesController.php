<?php

class CapturesController extends AppController {
    
    public $use = array('User', 'Photo');
    
    public function index() {
        $this->layout = "myDefault";
    }
    
    public function saveprofilephoto($photo_name){
        $this->User->id = $this->Session->read("uid");
        $this->User->set('picture', $photo_name);
        $this->User->save();
    }
    
    public function savefashionphoto($photo_name){
        $arr_data = array(
            'pname'=>$photo_name,
            'pdes'=>$this->data["Photo"]["pdes"],
            'postdate'=>date("Y-m-d H:i:s"),
            'uid'=>$this->Session->read("uid")
        );
        $this->Photo->save($arr_data);
    }
    
    
    
}

?>
