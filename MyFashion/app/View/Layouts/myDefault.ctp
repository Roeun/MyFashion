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
                
                echo $this->Html->css('jquery-ui-1.8.4.custom');
                echo $this->Html->css('jquery.fancybox-1.3.4');
                
                echo $this->Html->script('jquery-1.4.2.min.js');
                echo $this->Html->script('jquery.fancybox-1.3.4.pack.js');
                echo $this->Html->script('jquery.cookie.js');
                echo $this->Html->script('jquery.pjax.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        <script type="text/javascript">
    		    $(function(){
    		      $('a#pjax').pjax('#content')
    		    });
                    $(document).ready(function() {
			
			$("#popup").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			
			$("#iframe").fancybox({
				'width'				: '55%',
				'height'			: '98%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
                        
                        $("#capture").fancybox({
				'width'				: '55%',
				'height'			: '50%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		});
        </script>
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
                          <li><?php echo $this->Html->link('My Fashion',array('controller' => 'users', 'action' => 'register'), array('id'=>'pjax'));?></li>
                          <li><?php echo $this->Html->link('Lastest Photo',array('controller' => 'users', 'action' => 'register'), array('id'=>'pjax'));?></li>
                          <li><?php echo $this->Html->link('Top 10 Photo',array('controller' => 'users', 'action' => 'register'), array('id'=>'pjax'));?></li>
                          <li><?php echo $this->Html->link('Profile Photo',array('controller' => 'users', 'action' => 'register'), array('id'=>'pjax'));?></li>
                          <li><?php echo $this->Html->link('My Profile',array('controller' => 'users', 'action' => 'my_profile'), array('id'=>'pjax'));?></li>
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
                  <td style="padding:10px;" id="content">
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
