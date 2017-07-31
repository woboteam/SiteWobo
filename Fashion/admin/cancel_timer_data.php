<?php
if (isset($_POST["id"])){
	include_once("models/m_timer.php");
	$m_timer = new M_timer();
	$timer_id = $_POST["id"];
	$timer_current = $m_timer->get_timer_id($timer_id);
	//echo $pro_id;
	if ($timer_current){
		// Xử lý xóa hình đại diện tin tức ra khỏi ổ cứng
		$timer_img  = $timer_current->timer_img;
		$file_timer_img1 = "../public/events/".$timer_img;
		$file_timer_img2 = "../public/_thumbs/Images/events/".$timer_img;
		if (file_exists($file_timer_img1)){
			unlink($file_timer_img1);
		}
		if (file_exists($file_timer_img2)){
			unlink($file_timer_img2);
		}
		
		$delete_timer = $m_timer->delete_timer($timer_id);
		if ($delete_timer){
			echo "success";
		}
	}
}
?>