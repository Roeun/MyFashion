<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Photo
 *
 * @author apple
 */
class Photo extends AppModel {
    public $belongTo = array(
        "User"=>array(
            'className'=>"User",
            'foreignKey'=>'uid'
        )
    );
    
    public $hasMany = array(
        'Comment'=>array(
            'className'=>'Comment',
            'foreignKey'=>'pid'
        ),
        'Like'=>array(
            'className'=>'Like',
            'foreignKey'=>'pid'
        )
    );
    
    public function upload_photo_fashion ($photo) {
        if ($this->save($photo)) {
            if (move_uploaded_file($photo["pname_tmp"], WWW_ROOT."/img/uploaded_photos/".$photo["pname"])) {
                $imgObj = new resize(WWW_ROOT."/img/uploaded_photos/".$photo["pname"]);
                $imgObj->customResizeImage(200);
                $imgObj->saveImage(WWW_ROOT."/img/uploaded_photos/thumbnail/thumbnail_".$photo["pname"], 100);
                return true;
            } else return false;
        } else return false;
    }

    public function get_top_photo ($photo_amount)
    {
        $sql = "SELECT *,(SELECT COUNT(id) FROM likes l WHERE l.pid=p.id) AS likecount,(SELECT COUNT(id) FROM comments c WHERE c.pid=p.id) AS commentcount,
                ((SELECT COUNT(id) FROM likes l WHERE l.pid=p.id) + ((SELECT COUNT(id) FROM comments c WHERE c.pid=p.id)*2)) AS totalscore
                FROM photos p ORDER BY totalscore DESC";
        return $this->query($sql);
    }
}

?>
