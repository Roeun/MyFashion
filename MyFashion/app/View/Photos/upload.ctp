<?php
    echo $this->Html->link("View all", array('controller'=>'photos', 'action'=>'index'));
    echo "<br/><br/>";
    echo $this->Form->create(array('enctype'=>'multipart/form-data'));
    echo $this->Form->file("pname");
    echo $this->Form->input("pdes", array("label"=>"Description"));
    echo $this->Form->end("Upload");
?>