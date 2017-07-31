<?php
if (isset($_POST["id"])){
	include_once("models/m_sliders.php");
	$m_sliders = new m_sliders();
	$slider_id = $_POST["id"];
	$current_slider = $m_sliders->get_slider_id($slider_id);
	//echo $pro_id;
	if ($current_slider){
		// Xử lý xóa hình đại diện tin tức ra khỏi ổ cứng
		$slider_img  = $current_slider->slider_img;
		$file_slider_img1 = "../public/sliders/".$slider_img;
		$file_slider_img2 = "../public/_thumbs/Images/sliders/".$slider_img;
		if (file_exists($file_slider_img1)){
			unlink($file_slider_img1);
		}
		if (file_exists($file_slider_img2)){
			unlink($file_slider_img2);
		}
		
		$delete_news = $m_sliders->delete_slider($slider_id);
		if ($delete_news){
			echo "success";
		}
	}
}
?>