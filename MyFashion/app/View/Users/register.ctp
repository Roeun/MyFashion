<?php
    echo "<h3>Register</h3>";
    $this->Form->create('User', array('action'=>'register'));
    $this->Form->input('uname', array('label'=>'Username'));
    $this->Form->input('email', array('label'=>'Email'));
    $this->Form->input('pws', array('label'=>'Password'));
    $this->Form->end('Create Account');
?>