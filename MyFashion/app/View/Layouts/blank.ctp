
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
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        <script type="text/javascript">
            function closeME() {
                event.preventDefault();
                parent.$.fancybox.close();
                $('#UserLoginForm').submit();
            }
            
        </script>
</head>
<body>
	<div id="container">
		<div id="content">
                    <center>
                        <div class="inner_popup">
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
    	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
