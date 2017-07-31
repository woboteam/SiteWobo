<?php
if (isset($_POST['pages_id'],$_POST['pages_slug'])){
	include_once("models/m_pages.php");
	$m_pages 		= new M_pages();

	$pages_id 			= trim($_POST["pages_id"]);
	$pages_name 		= trim($_POST['pages_name']);
	$pages_slug_src 	= trim($_POST["pages_slug_src"]);
	$pages_slug 		= trim($_POST['pages_slug']);
	$pages_content			= trim($_POST['pages_content']);

	$flag_update = false;
	$exist_news = $m_pages->get_page_id($pages_id);
	if ($exist_news!=false){
		$flag_update = true;
	}
	if ($flag_update){
		if ($pages_slug!=$pages_slug_src){
			$check_news = $m_pages->check_insert($pages_name, $pages_slug);
			if ($check_news==false){
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
		$edit = $m_pages->update_pages($pages_id, $pages_name, $pages_slug, $pages_content);
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