<?php
/*
 * Author: Khat Bunchheang
 * Date: 12-Oct-2012
 * User Controller
 * 
 */

App::uses('AppController', 'Controller');
include 'resize_class.php';
class UsersController extends AppController {
        public $helpers = array('Html','Form');
        public $uses = array('User', 'Security');

        
        /////////////////// function used to create an account for use website ///////
        public function register(){
            $title_for_layout = 'Create an Account';
            $this->set(compact('title_for_layout'));   
            $this->layout = "blank"; 
            // if the form was submitted
            if(!empty($this->data)) {     
                $my_date = date('Y-m-d');
                $myUname = $this->request->data('User.uname');
                $myPass = $this->Security->encrypt_userdata($this->request->data('User.pwd'));
                $myEmail = $this->request->data('User.email');
                $arr = array (
                    'uname' => $myUname,
                    'pwd' => $myPass,
                    'email' => $myEmail,
                    'gender' => $this->request->data('User.gender'),
                    'phone' => $this->request->data('User.phone'),
                    'dob' => $this->request->data('User.dob'),
                    'rdate' => $my_date
                ); 

                if($this->User->save($arr)){
                    //$this->Session->setFlash('User has been saved.');
                    $this->redirect(array('action' => 'upload_photo_profile'));
                }
            }
        }
        
        /////////////////// Show Detail information about user ///////////////
        public function my_profile(){
            AppController::myCheckSession();
            $myUser = $this->Session->read('User');
                       
            $myUserId = $myUser['User']['id'];
            
            $conditions = array("User.id" => $myUserId);
            
            $myInfo = $this->User->find('all',array('conditions' => $conditions));

            $this->set('myInfo', $myInfo);
        }
        
        
        //////////////// Users login to use the system or Webservice
        public function login() {
             if($this->Session->check('User')){
                $this->redirect(array('controller' => 'pages', 'action' => 'display'));
              }
            $title_for_layout = 'Welcome to MyFashion';
                    $this->set(compact('title_for_layout')); 
                    // if the form was submitted
                    if(!empty($this->data)) {
                                $myPass = $this->Security->encrypt_userdata($this->data['User']['pwd']);
                                $myEmail = $this->data['User']['email'];
                               // find the user in the database
                               $dbuser = $this->User->findByEmail($myEmail);
                               $userIp = $this->request->clientIp();
                               // if found and passwords match
                               if(!empty($dbuser) && ($dbuser['User']['pwd'] == $myPass) && ($dbuser['User']['isenable'] == '1')) {
                                       // write the username to a session
                                       $this->Session->write('User', $dbuser);
                                     //  $this->Session->write('User', $userIp);
                                       // save the login time
                                       $dbuser['User']['last_login'] = date("Y-m-d H:i:s");
                                       $this->User->save($dbuser);
                                      //  $this->User->save($userIp);
                                       // redirect the user
                                       //$this->Session->setFlash('You have successfully logged in.');
                                       $this->redirect('/photos/index');
                               } else {
                                       $this->Session->setFlash('Email and password does not match!');
                                       $this->set('error', 'Either your username or password is incorrect.');
                               }
                       }

        }
        
        ///////////////// Log Out //////////////////
        public function logout(){
            $this->Session->destroy();
            $this->redirect(array('controller' => 'pages', 'action' => 'display'));
        }
        
        ///////////// function reset password when user forgot password ///////////
        public function reset_password(){
             AppController::myCheckSession();
             if(!empty($this->data)){
                $this->Session->setFlash('Please check your email. Thank you!');
             }
        }
        
        //////////////////  function update profile information ///////////////////
        public function update_profile($id = null){
                AppController::myCheckSession();
                $title_for_layout = 'Update Profile';
                $this->set(compact('title_for_layout'));  


                $this->User->id  = $id;

                if(empty($this->data)){
                    $this->data= $this->User->read();
                }else{     
                    $myUname = $this->request->data('User.uname');
                    $myPass = $this->Security->encrypt_userdata($this->request->data('User.pwd'));
                    $myEmail = $this->request->data('User.email');
                    $arr = array (
                        'uname' => $myUname,
                        'pwd' => $myPass,
                        'email' => $myEmail,
                        'gender' => $this->request->data('User.gender'),
                        'phone' => $this->request->data('User.phone'),
                        'dob' => $this->request->data('User.dob')
                    ); 

                    if($this->User->save($arr)){
                        $this->Session->setFlash('Your profile have been update!');
                        $this->redirect(array('action' => 'my_profile'));
                    }
                }
        }
        
        ///////////  Function change password of user /////////
        public function change_password($id = null){
            AppController::myCheckSession();
            $title_for_layout = 'Change Password';
            $this->set(compact('title_for_layout'));  
            
            
            $this->User->id  = $id;
            
            if(empty($this->data)){
                $this->data= $this->User->read();
            }else{  
                $myPass = $this->Security->encrypt_userdata($this->request->data('User.pwd'));
                $arr = array (
                    'pwd' => $myPass
                ); 

                if($this->User->save($arr)){
                    $this->Session->setFlash('Password have been change!');
                    $this->redirect(array('action' => 'my_profile'));
                }
            }
        }
        
        ///////////// function upload your profile picture ///////////////////////
        public function upload_photo_profile($id = null){
            AppController::myCheckSession();
            if (!empty($this->data)) {
                $photo["pname"] = $this->data["User"]["picture"]["name"];
                $photo["pname_tmp"] = $this->data["User"]["picture"]["tmp_name"];
                if (!$this->User->upload_photo_function($photo)) {
                    $this->Session->setFlash ("Unable to save photo.");
                } else {
                    $this->User->id  = $id;
                    $arr = array (
                        'picture' => $this->data["User"]["picture"]["name"]
                    ); 
                    if($this->User->save($arr)){
                        $this->Session->setFlash ("Picture saved!");
                        $this->redirect(array('action' => 'my_profile'));
                    }
                    
                } 
            }
        }
        
        ////////////////  function disactivate account /////////////
        public function disactivate_account(){
             AppController::myCheckSession();
        }
        
        
        ////////   function remove user account //////////
        public function remove_account($user_id){
             AppController::myCheckSession();
        }
}