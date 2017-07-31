<?php
if (isset($_POST["pages_name"], $_POST["pages_slug"])){
	include_once("models/m_pages.php");
	include_once("library/SimpleImage.php");
	$m_pages = new M_pages();
	$pages_name = trim($_POST["pages_name"]);
	$pages_slug = trim($_POST["pages_slug"]);
	$pages_content = trim($_POST["pages_content"]);
	$pages_status = 0;
	$check_insert = $m_pages->check_insert($pages_name, $pages_slug);
	if ($check_insert==false){		
		$add_pages = $m_pages->insert_pages($pages_name, $pages_slug, $pages_content, $pages_status);
		if ($add_pages){
			echo "success";
		} else {
			echo "error";
		}
	} else {
		echo "duplicate";
	}
}
?>