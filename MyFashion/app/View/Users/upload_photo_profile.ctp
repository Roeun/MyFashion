<?php
    echo "<h3>Upload your profile picture</h3>";
    echo $this->Form->create('User', array('action'=>'login'));
    echo $this->Form->file('picture', array('label'=>'Email'));
    echo $this->Form->end('Login');
?>