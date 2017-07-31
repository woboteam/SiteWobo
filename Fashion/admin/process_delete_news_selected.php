<?php
if (isset($_POST["id"])){
	$arr_new_id = $_POST["id"];
	$str_new_id = implode(",",$_POST["id"]);// Trả về chuổi các pro_id
	include_once("models/m_news.php");
	$m_news = new M_news();
	foreach ($arr_new_id as $new_id) {
		$current_product = $m_news->get_new_id($new_id);
		if ($current_product){
			$new_img  = $current_product->new_img;
			$file_new_img1 = "../public/news/".$new_img;
			$file_new_img2 = "../public/_thumbs/Images/news/".$new_img;
			if (file_exists($file_new_img1)){
				unlink($file_new_img1);
			}
			if (file_exists($file_new_img2)){
				unlink($file_new_img2);
			}
			$delete_news = $m_news->delete_news($new_id);
		}
	}
	$list_new = $m_news->get_news_array_id($str_new_id);
	if (count($list_new)==0){
		echo "success";
	}
}
?>