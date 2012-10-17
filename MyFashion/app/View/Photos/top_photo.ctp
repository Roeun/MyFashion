<?php $myUser = $this->Session->read('User');
foreach ($top_photos as $top_photo) { ?>
    <div style="border:1px blue solid;margin-bottom:10px;padding:10px;">
        <table>
            <?php if ($top_photo["Photo"]["isdelete"]==0 && ($top_photo["Photo"]["isenable"]==1 || $top_photo["Photo"]["uid"]==$myUser['User']['id'])) { ?>
                <tr>
                    <td colspan="2">
                        <?php
                            $comment_count = 0;
                            $comment_id = array();
                            foreach ($top_photo["Comment"] as $comment) {
                                if ($comment["isdelete"]==0 && ($comment["isenable"]==1 || $comment["uid"]==$myUser['User']['id'])) {
                                    $comment_count++;
                                    $comment_id[] = $comment["id"];
                                }
                            }
                            echo $top_photo["Photo"]["postdate"]."&nbsp;[";
                            $like_uid = array();
                            $count_like = 0;
                            foreach ($top_photo["Like"] as $like) {
                                if ($like["status"]==1) {
                                    $count_like++;
                                    $like_uid[] = $like["uid"];
                                }
                            }
                            if (in_array($myUser['User']['id'], $like_uid)) echo $this->Html->link('Unlike', array('controller'=>'Photos', 'action'=>'unlike_photo', $top_photo["Photo"]["id"], "photos", "index"))."&nbsp;:&nbsp;".$count_like.", Comments : ".$comment_count."]";
                            else echo $this->Html->link('Like', array('controller'=>'Photos', 'action'=>'like_photo', $top_photo["Photo"]["id"], "photos", "index"))."&nbsp;:&nbsp;".$count_like.", Comments : ".$comment_count."]";

                            if ($top_photo["Photo"]["isdelete"]==0 && $myUser['User']['id']==$top_photo["Photo"]["uid"]) {
                                echo "<br/>".$this->Html->link("Delete this Photo", array("controller"=>"photos", "action"=>"delete_photo", $top_photo["Photo"]["id"], "photos", "index"))."&nbsp;&nbsp;:&nbsp;&nbsp;";
                                if ($top_photo["Photo"]["isenable"]==0) {
                                    echo $this->Html->link("Enable this Photo", array("controller"=>"photos", "action"=>"enable_photo", $top_photo["Photo"]["id"], "photos", "index"));
                                } else {
                                    echo $this->Html->link("Disable this Photo", array("controller"=>"photos", "action"=>"disable_photo", $top_photo["Photo"]["id"], "photos", "index"));
                                }
                            }
                        ?>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2">
                    <?php
                        echo $this->Html->image(WWW_ROOT.'/img/uploaded_photos/thumbnail/thumbnail_'.$top_photo["Photo"]["pname"]);
                        echo "<br/>".$top_photo["Photo"]["pdes"];
//                        if ($myUser['User']['id'] == $top_photo["Photo"]["uid"]) {
//                            echo "&nbsp;:&nbsp;edit";
//                        }
                    ?>
                </td>
            </tr>
            <?php foreach ($top_photo["Comment"] as $comment) {
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
                                echo "<br/>".$this->Html->link("X", array("controller"=>"comments", "action"=>"delete_comment", $comment["id"], "photos", "index"))."&nbsp;&nbsp;:&nbsp;&nbsp;";
                                if ($comment["isenable"]==0) {
                                    echo $this->Html->link("Enable this Comment", array("controller"=>"comments", "action"=>"enable_comment", $comment["id"], "photos", "index"));
                                } else {
                                    echo $this->Html->link("Disable this Comment", array("controller"=>"comments", "action"=>"disable_comment", $comment["id"], "photos", "index"));
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
            echo $this->Form->input('pid', array('type'=>'hidden', 'value'=>$top_photo["Photo"]["id"]));
            echo $this->Form->input('cmt', array('label'=>'Comment: '));
            echo $this->Form->end("Post");
        ?>
    </div>
<?php } ?>