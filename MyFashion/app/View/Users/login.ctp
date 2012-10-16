<div id="home_holder">
    <div id="create_account_right">
         <h4>Login to your account</h4>
         <div class="inner_right_home">
             <?php
            echo $this->Form->create('User', array('action'=>'login'));
            echo $this->Form->input('email', array('label'=>'Email'));
            echo $this->Form->input('pwd', array('label'=>'Password', 'type'=> 'password'));
            echo "<center>".$this->Form->input('Login',array('type'=> 'submit', 'class'=>'btn','label'=>''))."<center>";
            echo $this->Form->end();
        ?>
         </div>
    </div>
 </div>