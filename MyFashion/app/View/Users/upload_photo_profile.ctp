<?php
    echo "<h4>Upload your profile picture</h4>";
    echo $this->Form->create('User', array('action'=>'login'));
    echo $this->Form->file('picture', array('label'=>'Email'));
    echo $this->Form->end('Upload Profile');
?>