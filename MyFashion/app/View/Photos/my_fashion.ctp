<?php $myUser = $this->Session->read('User');
foreach ($my_fashions as $my_fashion) { ?>
    <div style="border:1px blue solid;margin-bottom:10px;padding:10px;">
        <table>
            <tr>
                <td colspan="2">
                    <?php
                        $comment_count = 0;
                        $comment_id = array();
                        foreach ($my_fashion["Comment"] as $comment) {
                            if ($comment["isdelete"]==0 && ($comment["isenable"]==1 || $comment["uid"]==$myUser['User']['id'])) {
                                $comment_count++;
                                $comment_id[] = $comment["id"];
                            }
                        }
                        echo "Photo posted by: ".$my_fashion["User"]["uname"]." at ".$my_fashion["Photo"]["postdate"];
                        $like_uid = array();
                        $count_like = 0;
                        foreach ($my_fashion["Like"] as $like) {
                            if ($like["status"]==1) {
                                $count_like++;
                                $like_uid[] = $like["uid"];
                            }
                        }
                        if (in_array($myUser['User']['id'], $like_uid)) echo "<br/>[ ".$this->Html->link('Unlike', array('controller'=>'Photos', 'action'=>'unlike_photo', $my_fashion["Photo"]["id"], "photos", "my_fashion"))."&nbsp;:&nbsp;".$count_like." - Comments : ".$comment_count." ]";
                        else echo "<br/>[ ".$this->Html->link('Like', array('controller'=>'Photos', 'action'=>'like_photo', $my_fashion["Photo"]["id"], "photos", "my_fashion"))."&nbsp;:&nbsp;".$count_like." - Comments : ".$comment_count." ]";

                        echo "<br/>".$this->Html->link("Delete this Photo", array("controller"=>"photos", "action"=>"delete_photo", $my_fashion["Photo"]["id"], "photos", "my_fashion"))."&nbsp;&nbsp;:&nbsp;&nbsp;";
                        if ($my_fashion["Photo"]["isenable"]==0) {
                            echo $this->Html->link("Enable this Photo", array("controller"=>"photos", "action"=>"enable_photo", $my_fashion["Photo"]["id"], "photos", "my_fashion"));
                        } else {
                            echo $this->Html->link("Disable this Photo", array("controller"=>"photos", "action"=>"disable_photo", $my_fashion["Photo"]["id"], "photos", "my_fashion"));
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <img height="150px;" alt="<?php echo "thumbnail_".$my_fashion["Photo"]["pname"]; ?>" src="<?php echo '/app/webroot/uploaded_photos/thumbnail/thumbnail_'.$my_fashion["Photo"]["pname"]; ?>" />
                    <?php echo "<br/>".$my_fashion["Photo"]["pdes"]; ?>
                </td>
            </tr>
            <?php foreach ($my_fashion["Comment"] as $comment) {
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
                                echo "<br/>".$this->Html->link("X", array("controller"=>"comments", "action"=>"delete_comment", $comment["id"], "photos", "my_fashion"))."&nbsp;&nbsp;:&nbsp;&nbsp;";
                                if ($comment["isenable"]==0) {
                                    echo $this->Html->link("Enable this Comment", array("controller"=>"comments", "action"=>"enable_comment", $comment["id"], "photos", "my_fashion"));
                                } else {
                                    echo $this->Html->link("Disable this Comment", array("controller"=>"comments", "action"=>"disable_comment", $comment["id"], "photos", "my_fashion"));
                                }
                            } echo "&nbsp;".$comment["cmt"];
                        ?>
                    </td>
                </tr>
                <?php } ?>
            <?php } ?>
        </table>
        <?php
            echo $this->Form->create("Photo", array("controller"=>"photos", "action"=>"insert_comment"));
            echo $this->Form->input('redirect', array('type'=>'hidden', 'value'=>'/photos/my_fashion'));
            echo $this->Form->input('pid', array('type'=>'hidden', 'value'=>$my_fashion["Photo"]["id"]));
            echo $this->Form->input('cmt', array('label'=>'Comment: '));
            echo $this->Form->end("Post");
        ?>
    </div>
<?php } ?>