<?php
if (isset($_POST["id"])){
	include_once("models/m_news.php");
	$m_news = new M_news();
	$new_id = $_POST["id"];
	$current_news = $m_news->get_new_id($new_id);
	//echo $pro_id;
	if ($current_news){
		// Xử lý xóa hình đại diện tin tức ra khỏi ổ cứng
		$new_img  = $current_news->new_img;
		$file_new_img1 = "../public/news/".$new_img;
		$file_new_img2 = "../public/_thumbs/Images/news/".$new_img;
		if (file_exists($file_new_img1)){
			unlink($file_new_img1);
		}
		if (file_exists($file_new_img2)){
			unlink($file_new_img2);
		}
		
		$delete_news = $m_news->delete_news($new_id);
		if ($delete_news){
			echo "success";
		}
	}
}
?>