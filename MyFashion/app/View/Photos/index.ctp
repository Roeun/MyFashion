<?php echo $this->Html->link("Upload Photo", "/photos/upload"); ?>
<br/><br/>
View Top <select onchange="viewTopPhoto(this.value)"><option value="">---</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="100">100</option></select> Photos
<br/><br/><?php echo $this->Html->link("View all", array('controller'=>'photos', 'action'=>'index')); ?>
<script type="text/javascript">
    function viewTopPhoto (top_photo_amount) {
        window.location = "photos/top_photo/"+top_photo_amount;
    }
</script>

<?php foreach ($photos as $photo) { ?>
    <div style="border:1px;">
        <table>
            <tr>
                <td colspan="2">
                    <?php
                        echo $photo["Photo"]["postdate"]."&nbsp;[";
                        $like_uid = array();
                        $count_like = 0;
                        foreach ($photo["Like"] as $like) {
                            if ($like["status"]==1) {
                                $count_like++;
                                $like_uid[] = $like["uid"];
                            }
                        }
                        if (in_array(1, $like_uid)) echo $this->Html->link('Unlike', array('controller'=>'Photos', 'action'=>'unlike_photo', $photo["Photo"]["id"], 1))."&nbsp;:&nbsp;".$count_like.", Comments : ".count($photo["Comment"])."]";
                        else echo $this->Html->link('Like', array('controller'=>'Photos', 'action'=>'like_photo', $photo["Photo"]["id"], 1))."&nbsp;:&nbsp;".$count_like.", Comments : ".count($photo["Comment"])."]";
                        
                        if ($photo["Photo"]["isdelete"]==0) {
                            echo "<br/>".$this->Html->link("Delete Photo", array("controller"=>"photos", "action"=>"delete_photo", $photo["Photo"]["id"]))."&nbsp;&nbsp;:&nbsp;&nbsp;";
                            if ($photo["Photo"]["isenable"]==0) {
                                echo $this->Html->link("Enable Photo", array("controller"=>"photos", "action"=>"enable_photo", $photo["Photo"]["id"]));
                            } else {
                                echo $this->Html->link("Disable Photo", array("controller"=>"photos", "action"=>"disable_photo", $photo["Photo"]["id"]));
                            }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <img height="150px;" alt="<?php echo $photo["Photo"]["pname"]; ?>" src="<?php echo WWW_ROOT.'uploaded_photos/'.$photo["Photo"]["pname"]; ?>" />
                </td>
            </tr>
            <?php foreach ($photo["Comment"] as $comment) { ?>
                <tr>
                    <td width="160px">
                        <?php
                            
                            echo $comment["cmtdate"];
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $this->Html->link("X", array("controller"=>"comments", "action"=>"delete_comment", $comment["id"]));
                            echo "&nbsp;".$comment["cmt"];
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <?php
            echo $this->Form->create();
            echo $this->Form->input('pid', array('type'=>'hidden', 'value'=>$photo["Photo"]["id"]));
            echo $this->Form->input('cmt', array('label'=>'Comment: '));
            echo $this->Form->end("Post");
        ?>
    </div>
<?php } ?>