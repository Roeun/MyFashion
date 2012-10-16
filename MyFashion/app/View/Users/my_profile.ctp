<h4>Profile Information</h4>
<?php
        foreach($myInfo as $detailInfo){
?>
<div class="detail_holder">
        <?php //echo $this->Html->image("../files/uploads/".$phone_list['Phone']['image'],array('escape' => false));?>
        <?php echo "<h5>".$detailInfo['User']['uname']."</h5>"; ?>

    <span>
        <?php print"Email: \t\t". $detailInfo['User']['email'];  ?>
    </span>
    <p>
        <?php echo $detailInfo['User']['gender'];  ?>
    </p>
</div>

 <?php } ?>
