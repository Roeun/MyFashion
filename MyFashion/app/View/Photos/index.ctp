<?php foreach ($photos as $photo) { ?>
    <div style="border:1px;background-color:gray;">
        <img alt="<?php echo $photo["Photo"]["pname"]; ?>" src="<?php echo WWW_ROOT.'Uploaded_Photos/'.$photo["Photo"]["pname"]; ?>" /><br/>
        <?php
            echo $photo["Photo"]["postdate"].", ".count($photo["Like"]).$this->Html->link('Like', array('controller'=>'Photos', 'action'=>'like_photo', $photo["Photo"]["id"]))."<br/>";

            foreach ($photo["Comment"] as $comment) {
                echo $comment["cmtdate"].":".$comment["cmt"]."<br/>";
            }
            echo $this->Form->create('Photo', array('controller'=>'Photos', 'action'=>'insert_comment'));
            echo $this->Form->input('pid', array('type'=>'hidden', 'value'=>$photo["Photo"]["id"]));
            echo $this->Form->input('cmt', array('label'=>'Comment: '));
            echo $this->Form->end("Post");
        ?>
    </div>
<?php } ?>