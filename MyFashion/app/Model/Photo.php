<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Photo
 *
 * @author apple
 */
class Photo extends AppModel {
    public $hasMany = array(
        'Comment'=>array(
            'className'=>'Comment',
            'foreignKey'=>'pid'
        ),
        'Like'=>array(
            'className'=>'Like',
            'foreignKey'=>'pid'
        )
    );
    
    public function upload_photo_fashion ($photo) {
        if ($this->save($photo)) {
            if (move_uploaded_file($photo["pname_tmp"], WWW_ROOT."Uploaded_Photos/".$photo["pname"])) {
                return true;
            } else return false;
        } else return false;
    }
}

?>
