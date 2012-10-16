<?php
/*
 * Author: Khat Bunchheang
 * Date: 12-Oct-2012
 * User Controller
 * 
 */

App::uses('AppController', 'Controller');

class LikesController extends AppController {

	public $name = 'Likes';
        
        
        /////////////////////  function like photo /////////
        public function like($user_id, $photo_id){
            $arr_data = array (
                'uid'=>$user_id,
                'pid'=>$photo_id,
                'likedate'=>date('Y/m/d H:i:s', time())
            );
            if ($this->Like->save($arr_data)) {
                return true;
            }
            return false;
        }

        //////////////////// function unlike photo delete one record ///////// 
        public function unlike($like_id){
            if ($this->Like->delete($like_id)) {
                return true;
            }
            return false;
        }

        ///////// function count like will be count all number of likes on each photo /////////
        public function count_like($photo_id){
            $number_of_like = 0;
            
            return $number_of_like;
        }
}