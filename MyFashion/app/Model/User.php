<?php
	class User extends AppModel {
		public $name = 'User';
                public $primaryKey = 'id';
                
              /*  public $validate = array(
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
                'password' => array(
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
                function equaltofield($check,$otherfield)
                {
                    //get name of field
                    $fname = '';
                    foreach ($check as $key => $value){
                        $fname = $key;
                        break;
                    }
                    return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname];
                } */
	}

?>
