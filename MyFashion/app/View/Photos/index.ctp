View Top <select onchange="viewTopPhoto(this.value)"><option value="">---</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="100">100</option></select> Photos
<br/><?php echo $this->Html->link("View all", array('controller'=>'photos', 'action'=>'index')); ?>
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
                        echo $this->Html->link('Like', array('controller'=>'Photos', 'action'=>'like_photo', $photo["Photo"]["id"]))."&nbsp;:&nbsp;".count($photo["Like"]).", Comments : ".count($photo["Comment"])."]";
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <img height="150px;" alt="<?php echo $photo["Photo"]["pname"]; ?>" src="<?php echo WWW_ROOT.'Uploaded_Photos/'.$photo["Photo"]["pname"]; ?>" />
                </td>
            </tr>
            <?php foreach ($photo["Comment"] as $comment) { ?>
                <tr>
                    <td width="160px"><?php echo $comment["cmtdate"]; ?></td>
                    <td><?php echo $comment["cmt"]; ?></td>
                </tr>
            <?php } ?>
        </table>
        <?php
            echo $this->Form->create('Photo');
            echo $this->Form->input('pid', array('type'=>'hidden', 'value'=>$photo["Photo"]["id"]));
            echo $this->Form->input('cmt', array('label'=>'Comment: '));
            echo $this->Form->end("Post");
        ?>
    </div>
<?php } ?>