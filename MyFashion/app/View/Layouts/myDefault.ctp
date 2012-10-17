<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');
                echo $this->Html->css('cake.generic_1');
                echo $this->Html->css('style');
                

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
    <center>
	<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="780" height="100%" align="center" valign="middle" bgcolor="#666666" style="padding:11px; "><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="214" valign="top" bgcolor="#FFFFFF">
            <table width="100%" border="0" cellpadding="0" cellspacing="9">
                <tr>
                  <td><?php echo $this->Html->image('logo.png', array('alt' => ''))?></td>
                </tr>
                <tr>
                  <td valign="top">
                      <ul class="menu">
<<<<<<< HEAD
			  <li><?php echo $this->Html->link('Where is your Fashion?',array('controller' => 'users', 'action' => 'register'), array('id'=>'pjax'));?></li>
			  <li><?php echo $this->Html->link('My Fashion',array('controller' => 'users', 'action' => 'register'), array('id'=>'pjax'));?></li>
                          <li><?php echo $this->Html->link('Lastest Photo',array('controller' => 'users', 'action' => 'register'), array('id'=>'pjax'));?></li>
                          <li><?php echo $this->Html->link('Top 10 Photo',array('controller' => 'users', 'action' => 'register'), array('id'=>'pjax'));?></li>
                          <li><?php echo $this->Html->link('Profile Photo',array('controller' => 'users', 'action' => 'register'), array('id'=>'pjax'));?></li>
                          <li><?php echo $this->Html->link('My Profile',array('controller' => 'users', 'action' => 'my_profile'), array('id'=>'pjax'));?></li>
=======
                          <li><?php echo $this->Html->link('Where is your Fashion?',array('controller' => 'photos', 'action' => 'upload'));?></li>
                          <li><?php echo $this->Html->link('My Fashion',array('controller' => 'photos', 'action' => 'my_fashion'));?></li>
                          <li><?php echo $this->Html->link('Lastest Photo',array('controller' => 'photos', 'action' => 'lastest_photo/20'));?></li>
                          <li><?php echo $this->Html->link('Top Photo',array('controller' => 'photos', 'action' => 'top_photo', 20));?></li>
                          <li><?php echo $this->Html->link('Profile Photo',array('controller' => 'users', 'action' => 'register'));?></li>
                          <li><?php echo $this->Html->link('My Profile',array('controller' => 'users', 'action' => 'my_profile'));?></li>
>>>>>>> Update link of menu and mvc of photo
                          <li><?php echo $this->Html->link('Logout',array('controller' => 'users', 'action' => 'logout'));?></li>
			
                      </ul>
                  </td>
                </tr>
            </table>
        </td>
		<td width="11" rowspan="2"><?php echo $this->Html->image('spacer.gif', array('alt' => ''))?></td>
        <td valign="top" bgcolor="#FFFFFF">
            <table width="100%" border="0" cellpadding="0" cellspacing="9">
                <tr>
                  <td>
                      <?php echo $this->Html->image('advertisement.jpeg', array('alt' => ''))?>
                  </td>
                </tr>
                <tr>
                  <td style="padding:10px;">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>    
                  </td>
                </tr>
            </table>
        </td>
      </tr>
      <tr>
        <td valign="bottom" bgcolor="#FFFFFF" style="padding:9px;" width="214" height="56">
            <div class="greeting">
                <ul>
                    <li><?php
                        $myUser = $this->Session->read('User');
                        if(isset($myUser)){
                            echo "Hello ".$myUser['User']['uname'];
                        }else{
                            echo "Hi";
                        }
                    ?></li>
                    <li><?php echo $this->Html->link('Logout',array('controller' => 'users', 'action' => 'logout'));?></li>
                </ul>
            </div>
        </td>
        <td valign="bottom" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="9" cellpadding="0">
          <tr>
            <td height="56" valign="top" bgcolor="#3A8356"><table width="100%" border="0" cellspacing="9" cellpadding="0">
              <tr>
                <td class="footer"> Copyright &copy; myfashion.com.kh. All rights reserved. Design by Roeun</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
    </center>
</body>
</html>
