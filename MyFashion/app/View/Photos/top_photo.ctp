<?php echo $this->Html->link("View all", array('controller'=>'photos', 'action'=>'index')); ?><br/>
Top Photo
<?php
    foreach ($top_photos as $top_photo) {
        echo $top_photo["Photo"]["pname"]."<br/>";
    }
    print_r($top_photos);
?>