Lastest photo
<?php
    $myUser = $this->Session->read('User');
    foreach ($lastest_photos as $lastest_photo) { ?>
        <div style="border:1px;">
            <table>
                <?php if ($lastest_photo["Photo"]["isdelete"]==0 && ($lastest_photo["Photo"]["isenable"]==1 || $lastest_photo["Photo"]["uid"]==$myUser['User']['id'])) { ?>
                    <tr>
                        <td colspan="2">
                            <?php
                                $comment_count = 0;
                                $comment_id = array();
                                foreach ($lastest_photo["Comment"] as $comment) {
                                    if ($comment["isdelete"]==0 && ($comment["isenable"]==1 || $comment["uid"]==$myUser['User']['id'])) {
                                        $comment_count++;
                                        $comment_id[] = $comment["id"];
                                    }
                                }
                                echo $lastest_photo["Photo"]["postdate"]."&nbsp;[";
                                $like_uid = array();
                                $count_like = 0;
                                foreach ($lastest_photo["Like"] as $like) {
                                    if ($like["status"]==1) {
                                        $count_like++;
                                        $like_uid[] = $like["uid"];
                                    }
                                }
                                if (in_array($myUser['User']['id'], $like_uid)) echo $this->Html->link('Unlike', array('controller'=>'Photos', 'action'=>'unlike_photo', $lastest_photo["Photo"]["id"]))."&nbsp;:&nbsp;".$count_like.", Comments : ".$comment_count."]";
                                else echo $this->Html->link('Like', array('controller'=>'Photos', 'action'=>'like_photo', $lastest_photo["Photo"]["id"]))."&nbsp;:&nbsp;".$count_like.", Comments : ".$comment_count."]";

                                if ($lastest_photo["Photo"]["isdelete"]==0 && $myUser['User']['id']==$lastest_photo["Photo"]["uid"]) {
                                    echo "<br/>".$this->Html->link("Delete this Photo", array("controller"=>"photos", "action"=>"delete_photo", $lastest_photo["Photo"]["id"]))."&nbsp;&nbsp;:&nbsp;&nbsp;";
                                    if ($lastest_photo["Photo"]["isenable"]==0) {
                                        echo $this->Html->link("Enable this Photo", array("controller"=>"photos", "action"=>"enable_photo", $lastest_photo["Photo"]["id"]));
                                    } else {
                                        echo $this->Html->link("Disable this Photo", array("controller"=>"photos", "action"=>"disable_photo", $lastest_photo["Photo"]["id"]));
                                    }
                                }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2">
                        <img height="150px;" alt="<?php echo "thumbnail_".$lastest_photo["Photo"]["pname"]; ?>" src="<?php echo '/app/webroot/uploaded_photos/thumbnail/thumbnail_'.$lastest_photo["Photo"]["pname"]; ?>" />
                        <?php
                            echo "<br/>".$lastest_photo["Photo"]["pdes"];
                            if ($myUser['User']['id'] == $lastest_photo["Photo"]["uid"]) {
                                echo "&nbsp;:&nbsp;edit";
                            }
                        ?>
                    </td>
                </tr>
                <?php foreach ($lastest_photo["Comment"] as $comment) {
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
                echo $this->Form->input('pid', array('type'=>'hidden', 'value'=>$lastest_photo["Photo"]["id"]));
                echo $this->Form->input('cmt', array('label'=>'Comment: '));
                echo $this->Form->end("Post");
            ?>
        </div>
<?php } ?>