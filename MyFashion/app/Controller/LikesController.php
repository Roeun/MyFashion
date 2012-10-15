<?php
/*
 * Author: Khat Bunchheang
 * Date: 12-Oct-2012
 * User Controller
 * 
 */

App::uses('AppController', 'Controller');

class LiksController extends AppController {

	public $name = 'Likes';
        
        
        /////////////////////  function like photo /////////
        public function like($user_id, $photo_id){
            $status = false;
            
            return $status;
        }

        //////////////////// function unlike photo delete one record ///////// 
        public function unlike($like_id){
            $status = false;
            
            return $status;
        }

        ///////// function count like will be count all number of likes on each photo /////////
        public function count_like($photo_id){
            $number_of_like = 0;
            
            return $number_of_like;
        }
}