<?php
/*
 * Author: Khat Bunchheang
 * Date: 12-Oct-2012
 * User Controller
 * 
 */

App::uses('AppController', 'Controller');

class UsersController extends AppController {

        public $helpers = array('Html','Form');
        public $uses = array('User');
        
        
        /////////////////// function used to create an account for use website ///////
        public function register(){
            
            //AppController::checkAdminSession();
            $title_for_layout = 'Create an Account';
            $this->set(compact('title_for_layout'));
                    
            // if the form was submitted
            if(!empty($this->data)) {     
                $my_date = date('Y-m-d');
                $arr = array (
                    'uname' => $this->request->data('User.uname'),
                    'pwd' => $this->request->data('User.pwd'),
                    'email' => $this->request->data('User.email'),
                    'gender' => $this->request->data('User.gender'),
                    'phone' => $this->request->data('User.phone'),
                    'dob' => $my_date
                ); 

                if($this->User->save($arr)){
                    $this->Session->setFlash('User has been saved.');
                    $this->redirect(array('action' => 'upload_photo_profile'));
                }
            }
        }
        
        
        //////////////// Users login to use the system or Webservice
        public function login($email, $password) {
            $status = false;
            
            return $status;
        }
        
        ///////////// function reset password when user forgot password ///////////
        public function reset_password($email){
            $status = false;
            
            return $status;
        }
        
        //////////////////  function update profile information ///////////////////
        public function update_profile($username, $password, $dob, $gender, $phone=''){
            $status = false;
            
            return $status;
        }
        
        ///////////  Function change password of user /////////
        public function change_password($password){
            $status = false;
            
            return $status;
        }
        
        ///////////// function upload your profile picture ///////////////////////
        public function upload_photo_profile($tmp_image_name){
            $status = false;
            
            return $status;
        }
        
        ////////////////  function disactivate account /////////////
        public function disactivate_account($user_id){
            $status = false;
            
            return $status;
        }
        
        
        ////////   function remove user account //////////
        public function remove_account($user_id){
            $status = false;
            
            return $status;
        }
}