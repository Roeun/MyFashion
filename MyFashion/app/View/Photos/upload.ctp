<?php
    echo $this->Form->create(array('enctype'=>'multipart/form-data'));
    echo $this->Form->file("pname");
    echo $this->Form->input("pdes", array("label"=>"Description"));
    echo $this->Form->end("Upload");
?>