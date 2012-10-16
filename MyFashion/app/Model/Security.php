<?php
class Security extends AppModel {
    
    public $name = 'Security';    
      
    public $key = "scret key";
    
    function encrypt_userdata($string) {
        $result = '';
        for($i=0; $i<strlen($string); $i++) {
          $char = substr($string, $i, 1);
          $keychar = substr($this->key, ($i % strlen($this->key))-1, 1);
          $char = chr(ord($char)+ord($keychar));
          $result.=$char;
        }
        return base64_encode($result);
    }
    
    function decrypt_userdata($string) {
        $result = '';
        $string = base64_decode($string);
        for($i=0; $i<strlen($string); $i++) {
          $char = substr($string, $i, 1);
          $keychar = substr($this->key, ($i % strlen($this->key))-1, 1);
          $char = chr(ord($char)-ord($keychar));
          $result.=$char;
        }
        return $result;
    }
    
    function encrypt_session($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }
    
    function decrypt_session($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }
    
    function block_ip($ip, $session_id) {
        static $try;
        if ($_SESSION['ip']==$ip) {
            $try++;
            if ($try >= 5) {
                return true;
            }
        }
        return false;
    }
    
    function user_limitation($email, $ip) {
        static $limit;
        if ($_SESSION['ip']==$ip) {
            $limit++;
            if ($limit>3) {
                return true;
            }
        }
        return false;
    }
    
    function sql_injection_input($data) {
        return mysql_real_escape_string($data);
    }
    
    function sql_injection_output($data) {
        return htmlspecialchars($data);
    }
        
}

?>
