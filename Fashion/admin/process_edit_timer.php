<?php
if (isset($_POST['timer_id'],$_POST['event_slug'])){
	include_once("models/m_timer.php");
	include_once("library/SimpleImage.php");
	$m_timer 		= new M_timer();

	$timer_id 			= trim($_POST["timer_id"]);
	$event_name 		= trim($_POST['event_name']);
	$event_slug_src 	= trim($_POST["event_slug_src"]);
	$event_slug 		= trim($_POST['event_slug']);
	$date_temp 			= str_replace('/', '-', $_POST["event_create"]);
	$event_create 		= date("Y-m-d",strtotime($date_temp));
	$timer_desc			= trim($_POST['timer_desc']);
	$timer_detail		= trim($_POST['timer_detail']);
	$cate_id			= $_POST["cate_id"];

	$flag_update = false;
	$exist_timer = $m_timer->get_timer_id($timer_id);
	if ($exist_timer!=false){
		$flag_update = true;
		$timer_img = $exist_timer->timer_img;
	}
	if ($flag_update){
		if ($event_slug!=$event_slug_src){
			$check_timer = $m_timer->check_insert($event_name, $event_slug);
			if ($check_timer==false){
				$flag_update = true;
			} else {
				echo "duplicate";
				exit;
			}
		} else {
			$flag_update = true;
		}
	}
	if ($flag_update){
		if ($_FILES["timer_img"]["error"]==0){
			$extension = array("JPEG","JPG","PNG","GIF","BMP");
			$filename = $_FILES['timer_img']['name'];
			$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
			if (in_array($ext, $extension) && filesize($_FILES['timer_img']['tmp_name'])<=3*1024*1024){
				$image = new SimpleImage();

				// Gõ bỏ file ảnh hình đại diện sản phẩm ra khỏi đĩa cứng
				$file_timer_img1 = "../public/events/".$timer_img;
				$file_timer_img2 = "../public/_thumbs/Images/events/".$timer_img;
				if (file_exists($file_timer_img1)){
					unlink($file_timer_img1);
				}
				if (file_exists($file_timer_img2)){
					unlink($file_timer_img2);
				}
				// Kiểm tra xem hình chi tiết sản phẩm để tiến hành Upload lên server
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
		$edit = $m_timer->update_timer($timer_id, $event_name, $event_slug, $cate_id, $event_create, $timer_img, $timer_desc, $timer_detail);
		if ($edit!=false){
			// Trả kết quả thành công
			echo "success";
		} else {
			echo "error";
		}
	}
} else {
	echo "valid";
}
?>