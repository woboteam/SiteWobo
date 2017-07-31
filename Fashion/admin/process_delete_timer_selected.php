<?php
if (isset($_POST["id"])){
	$arr_timer_id = $_POST["id"];
	$str_timer_id = implode(",",$_POST["id"]);// Trả về chuổi các pro_id
	include_once("models/m_timer.php");
	$m_timer = new M_timer();
	foreach ($arr_timer_id as $timer_id) {
		$timer_current = $m_timer->get_timer_id($timer_id);
		if ($timer_current){
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
		}
	}
	$list_timer = $m_timer->get_timer_array_id($str_timer_id);
	if (count($list_timer)==0){
		echo "success";
	}
}
?>