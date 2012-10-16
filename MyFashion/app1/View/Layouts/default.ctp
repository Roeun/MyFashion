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

		
                echo $this->Html->css('cake.generic');
                echo $this->Html->css('bootstrap');
                echo $this->Html->css('jquery-ui-1.8.4.custom');
                echo $this->Html->css('jquery.fancybox-1.3.4');
                
                echo $this->Html->script('jquery-1.4.2.min.js');
                echo $this->Html->script('jquery.fancybox-1.3.4.pack.js');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <script type="text/javascript">
    		$(document).ready(function() {
			
			$("#popup").fancybox({
				'titlePosition'		: 'outside',
				'overlayColor'		: '#000',
				'overlayOpacity'	: 0.9
			});

			
			$("#iframe_register").fancybox({
				'width'				: '55%',
				'height'			: '98%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
                        $("#iframe_login").fancybox({
				'width'				: '55%',
				'height'			: '65%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
                        
		});
	
    </script>
</head>
<body>
	<div id="container">
		<div id="header">
                    <center>
                        <div id="inner_top">
                            <div id="top_left">
                                <h4><?php echo $this->Html->link('My Fashion',array('controller' => 'pages', 'action' => 'display'));?></h4>
                            </div>
                            <div id="top_right">
                                <?php 
                                    echo $this->Html->link('Login',array('controller' => 'users', 'action' => 'login'), array('id'=>'iframe_login')); 
                                    echo " | "; 
                                    echo $this->Html->link('Register',array('controller' => 'users', 'action' => 'register'), array('id'=>'iframe_register'));
                                 ?>
                            </div>
                        </div>
                    </center>
		</div>
		<div id="content">
                    <center>
                        <div class="inner">
                            <center>
                                <?php echo $this->Session->flash(); ?>

                                <?php echo $this->fetch('content'); ?>
                            </center>
                        </div>
                    </center>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
