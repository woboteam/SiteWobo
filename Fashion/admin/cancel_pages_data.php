<?php
if (isset($_POST["id"])){
	include_once("models/m_pages.php");
	$m_pages = new M_pages();
	$pages_id = $_POST["id"];
	$current_pages = $m_pages->get_page_id($pages_id);
	//echo $pro_id;
	if ($current_pages){
		$delete_page = $m_pages->delete_pages($pages_id);
		if ($delete_page){
			echo "success";
		}
	}
}
?>