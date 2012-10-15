<div id="home_holder">

    <div id="create_account_right">
         <h4>Free sign up your account.</h4>
         <div class="inner_right_home">
             <?php
                echo $this->Form->create('User', array('action'=>'register'));
                echo $this->Form->input('uname', array('label'=>'Username'));
                echo $this->Form->input('email', array('label'=>'Email'));
                echo $this->Form->input('pwd', array('type'=>'password','label'=>'Password'));
                echo $this->Form->input('phone', array('label'=>'Phone Number'));
                echo $this->Form->input('dob', array('label'=>'Date of Birth', 'class'=>'width_dob'));
                echo $this->Form->input('gender', array('label'=>'Gender', 'type'=>'select', 'options'=> array('1'=>'Male', '2'=> 'Female')));
                echo "<center>".$this->Form->input('Create Account',array('type'=> 'submit', 'class'=>'btn','label'=>''))."</center>";
                echo $this->Form->end();
            ?>
         </div>
    </div>
 </div>