<?php

class ExtensionAllow extends AppModel {
    
    public $useTable = "extensionallows";
    public $name = "ExtensionAllow";
    
    function isAllowExtention($extention_type) {
        $extention_type = strtolower($extention_type);
        $conditions = array(
            'exname'=>$extention_type
        );
        return $this->find('all', array('conditions'=>$conditions));
    }
    
}

?>
