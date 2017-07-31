<?php
if (isset($_POST["event_name"], $_POST["event_slug"], $_POST["cate_id"])){
	include_once("models/m_timer.php");
	include_once("library/SimpleImage.php");
	$m_timers = new M_timer();
	$event_name = trim($_POST["event_name"]);
	$event_slug = trim($_POST["event_slug"]);
	$timer_desc = trim($_POST["timer_desc"]);
	$date_temp = str_replace('/', '-', $_POST["event_create"]);
	$event_create = date("Y-m-d",strtotime($date_temp));
	// echo $event_create;
	$timer_detail = trim($_POST["timer_detail"]);
	$timer_img = "";
	$cate_id = $_POST["cate_id"];
	$timer_status = 0;
	$check_insert = $m_timers->check_insert($event_name, $event_slug);
	if ($check_insert==false){
		if ($_FILES["timer_img"]["error"]==0){
			$extension = array("JPEG","JPG","PNG","GIF","BMP");
			$filename = $_FILES['timer_img']['name'];
			$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
			if (in_array($ext, $extension) && filesize($_FILES['timer_img']['tmp_name'])<=3*1024*1024){
				$image = new SimpleImage();
				if(!file_exists("../public/events/".$filename)){
					$image->load($_FILES['timer_img']['tmp_name'])->resize(500, 325)->save('../public/events/'.$filename);
					$image->load($_FILES['timer_img']['tmp_name'])->thumbnail(100,100)->save('../public/_thumbs/Images/events/'.$filename);
					$timer_img = $filename;
				} else {
					$filename = basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
					$newFileName = $filename.time().".".$ext;
					$image->load($_FILES['timer_img']['tmp_name'])->resize(500, 325)->save('../public/events/'.$newFileName);
					$image->load($_FILES['timer_img']['tmp_name'])->thumbnail(100,100)->save('../public/_thumbs/Images/events/'.$newFileName);
					$timer_img = $newFileName;
				}
			}
		}
		
		$add_timers = $m_timers->insert_timer($event_name, $event_slug, $cate_id, $event_create, $timer_img, $timer_desc, $timer_detail, $timer_status);
		if ($add_timers){
			echo "success";
		} else {
			echo "error";
		}
		
	} else {
		echo "duplicate";
	}
}
?>