<?php
class Security extends AppModel {
    
    public $name = 'Security';    
      
    function encrypt_userdata($data) {
        return $data;
    }
    
    function decrypt_userdata($data) {
        return $data;
    }
    
    function encrypt_session($data) {
        return $data;
    }
    
    function decrypt_session($data) {
        return $data;
    }
    
    function block_ip($ip, $session_id) {
        return false;
    }
    
    function user_limitation($email, $ip) {
        return false;
    }
    
    function sql_injection_input($data) {
        return $data;
    }
    
    function sql_injection_output($data) {
        return $data;
    }
        
}

?>
