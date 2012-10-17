<?php
//This project is done by vamapaull: http://blog.vamapaull.com/

if(isset($GLOBALS["HTTP_RAW_POST_DATA"])){
	$jpg = $GLOBALS["HTTP_RAW_POST_DATA"];
	$img = $_GET["img"];
	$filename = "capture_". mktime(). ".jpg";
	$filename = "../uploaded_photos/".$filename;
	file_put_contents($filename, $jpg);
} else{
	echo "Encoded JPEG information not received.";
}
?>