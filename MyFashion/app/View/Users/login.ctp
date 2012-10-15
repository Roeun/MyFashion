<?php
    echo "<h3>Login</h3>";
    echo $this->Form->create('User', array('action'=>'login'));
    echo $this->Form->input('email', array('label'=>'Email'));
    echo $this->Form->input('pwd', array('label'=>'Password', 'type'=> 'password'));
    echo $this->Form->end('Login');
?>