<?php
class User extends AppModel {
    public $name = 'User';
    public $primaryKey = 'id';

    public $validate = array(
        'uname' => array(
            'required' => array(
            'rule' => 'notEmpty',
            'message' => 'Please Enter your username.'
            ),
            'unique' => array(
              'rule' => 'isUnique',
              'message' => 'An account with that email already exists.'
            )
        ),
        'email' => array(
            'required' => array(
            'rule' => 'notEmpty',
            'message' => 'Please Enter your email.'
            ),
            'kosher' => array(
              'rule' => 'email',
              'message' => 'Please make sure your email is entered correctly.'
            ),
            'unique' => array(
              'rule' => 'isUnique',
              'message' => 'An account with that email already exists.'
            )
        ),
        'pwd' => array(
            'required' => array(
            'rule' => 'notEmpty',
            'message'=>'Please enter a password.'
            ),
              'min' => array(
              'rule' => array('minLength', 6),
              'message' => 'Password must be at least 6 characters.'
            )
         )
    );
    
    public $hasMany = array(
        'Photo'=>array(
            'className'=>"Photo",
            'foreignKey'=>'uid'
        ),
        'Comment'=>array(
            'className'=>'Comment',
            'foreignKey'=>'uid'
        ),
        'Like'=>array(
            'className'=>'Like',
            'foreignKey'=>'pid'
        )
    );
}

?>
