<?php
$myUser = $this->Session->read('User');    
echo $this->Html->link("Upload Photo", "/photos/upload");
?>
<br/><br/>
View Top <select onchange="viewTopPhoto(this.value)"><option value="">---</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="100">100</option></select> Photos
<br/><br/>View last <select onchange="viewLastPhoto(this.value)"><option value="">---</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="100">100</option></select> Photos
<br/><br/><?php echo $this->Html->link("View all", array('controller'=>'photos', 'action'=>'index')); ?>
<script type="text/javascript">
    function viewTopPhoto (top_photo_amount) {
        window.location = "photos/top_photo/"+top_photo_amount;
    }
    function viewLastPhoto (last_photo_amount) {
        window.location = "photos/lastest_photo"+last_photo_amount;
    }
</script>

<?php foreach ($photos as $photo) { ?>
    <div style="border:1px;">
        <table>
            <?php if ($photo["Photo"]["isdelete"]==0 && ($photo["Photo"]["isenable"]==1 || $photo["Photo"]["uid"]==$myUser['User']['id'])) { ?>
                <tr>
                    <td colspan="2">
                        <?php
                            $comment_count = 0;
                            $comment_id = array();
                            foreach ($photo["Comment"] as $comment) {
                                if ($comment["isdelete"]==0 && ($comment["isenable"]==1 || $comment["uid"]==$myUser['User']['id'])) {
                                    $comment_count++;
                                    $comment_id[] = $comment["id"];
                                }
                            }
                            echo $photo["Photo"]["postdate"]."&nbsp;[";
                            $like_uid = array();
                            $count_like = 0;
                            foreach ($photo["Like"] as $like) {
                                if ($like["status"]==1) {
                                    $count_like++;
                                    $like_uid[] = $like["uid"];
                                }
                            }
                            if (in_array($myUser['User']['id'], $like_uid)) echo $this->Html->link('Unlike', array('controller'=>'Photos', 'action'=>'unlike_photo', $photo["Photo"]["id"]))."&nbsp;:&nbsp;".$count_like.", Comments : ".$comment_count."]";
                            else echo $this->Html->link('Like', array('controller'=>'Photos', 'action'=>'like_photo', $photo["Photo"]["id"]))."&nbsp;:&nbsp;".$count_like.", Comments : ".$comment_count."]";

                            if ($photo["Photo"]["isdelete"]==0 && $myUser['User']['id']==$photo["Photo"]["uid"]) {
                                echo "<br/>".$this->Html->link("Delete this Photo", array("controller"=>"photos", "action"=>"delete_photo", $photo["Photo"]["id"]))."&nbsp;&nbsp;:&nbsp;&nbsp;";
                                if ($photo["Photo"]["isenable"]==0) {
                                    echo $this->Html->link("Enable this Photo", array("controller"=>"photos", "action"=>"enable_photo", $photo["Photo"]["id"]));
                                } else {
                                    echo $this->Html->link("Disable this Photo", array("controller"=>"photos", "action"=>"disable_photo", $photo["Photo"]["id"]));
                                }
                            }
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2">
                    <?php
                        echo $this->Html->image(WWW_ROOT.'/img/uploaded_photos/thumbnail/thumbnail_'.$photo["Photo"]["pname"]);
                        echo "<br/>".$photo["Photo"]["pdes"];
                        if ($myUser['User']['id'] == $photo["Photo"]["uid"]) {
                            echo "&nbsp;:&nbsp;edit";
                        }
                    ?>
                </td>
            </tr>
            <?php foreach ($photo["Comment"] as $comment) {
                if (in_array($comment["id"], $comment_id)) { ?>
                <tr>
                    <td width="160px">
                        <?php
                            echo $comment["cmtdate"];
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($comment["isdelete"]==0 && $myUser['User']['id']==$comment["uid"]) {
                                echo "<br/>".$this->Html->link("X", array("controller"=>"comments", "action"=>"delete_comment", $comment["id"]))."&nbsp;&nbsp;:&nbsp;&nbsp;";
                                if ($comment["isenable"]==0) {
                                    echo $this->Html->link("Enable this Comment", array("controller"=>"comments", "action"=>"enable_comment", $comment["id"]));
                                } else {
                                    echo $this->Html->link("Disable this Comment", array("controller"=>"comments", "action"=>"disable_comment", $comment["id"]));
                                }
                            } echo "&nbsp;".$comment["cmt"];
                        ?>
                    </td>
                </tr>
                <?php } ?>
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