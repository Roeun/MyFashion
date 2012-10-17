<?php

class ExtensionAllow extends AppModel {
    
        public $useTable = 'extensionallows';
        public $name = 'ExtensionAllow';
    
    function isAllowExtention($extention_type) {
        $extention_type = strtolower($extention_type);
        $this->exname = $extention_type;
        if ($this->exists()) {
            return true;
        }
        return false;
    }
    
}

?>
