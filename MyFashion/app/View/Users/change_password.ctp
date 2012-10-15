<?php
    echo "<h3>Change Password</h3>";
    echo $this->Form->create('User', array('action'=>'change_password'));
    echo $this->Form->input('email', array('label'=>'Email'));
    echo $this->Form->input('pwd', array('type'=>'password','label'=>'Old Password'));
    echo $this->Form->input('pwd', array('type'=>'password','label'=>'New Password'));
    echo $this->Form->end('Change Password');
?>