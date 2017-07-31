<?php
if (isset($_POST["id"])){
	include_once("models/m_cates.php");
	$m_cate = new M_cates();
	$cate_id = $_POST["id"];
	$cate_current = $m_cate->get_cate_id($cate_id);
	if ($cate_current!=false){
		$check_product = $m_cate->check_cate_product($cate_id);
		$check_news = $m_cate->check_cate_news($cate_id);
		if ($check_product || $check_news){
			echo "exist";
		} else {
			// Xu lý xoa hình của cate
			$cate_img = $cate_current->cate_img;
			$file_cate_img1 = "../public/cates/".$cate_img;
			$file_cate_img2 = "../public/_thumbs/Images/cates/".$cate_img;
			if (file_exists($file_cate_img1)){
				unlink($file_cate_img1);
			}
			if (file_exists($file_cate_img2)){
				unlink($file_cate_img2);
			}
			$delete_cate = $m_cate->delete_cates($cate_id);
			if ($delete_cate){
				echo "success";
			}
		}
	}
}
?>