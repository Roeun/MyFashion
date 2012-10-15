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
class Comment extends AppModel {
    public $validate = array(
        'cmt'=>array(
            'please enter'=>array(
                'rule'=>'notEmpty',
                'message'=>'Please enter comment'
            )
        )
    );
    
    public $belongTo = array(
        'Photo'=>array(
            'className'=>'Photo',
            'foreignKey'=>'pid'
        )
    );
    
    public function insert_comment ($cmt_object) {
        if ($this->Comment->Save($cmt_object)) {
            return true;
        } else return false;
    }
    
    public function count_comment ($pid) {
        return $this->Comment->find('ocunt', array('conditions'=>array('Comment.pid'=>$pid)));
    }
}

?>
