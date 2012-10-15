<?php
    echo "<h3>Reset Password</h3>";
    echo $this->Form->create('User', array('action'=>'reset_password'));
    echo $this->Form->input('email', array('label'=>'Email'));
    echo $this->Form->input('uname', array('type'=>'text','label'=>'Username'));
    echo $this->Form->end('Reset Password');
?>