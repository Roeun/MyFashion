<?php

class Like extends AppModel {
    public $belongTo = array(
        'Photo'=>array(
            'className'=>'Photo',
            'foreignKey'=>'pid'
        ),
        'User'=>array(
            'className'=>'User',
            'foreignKey'=>'uid'
        )
    );
}

?>
