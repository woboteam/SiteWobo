<?php
if (isset($_POST["id"])){
	include_once("models/m_pages.php");
	$m_pages = new M_pages();
	$pages_id = $_POST["id"];
	$pages_hide = $m_pages->set_pages_status($pages_id, 1);
	if ($pages_hide){
		echo "success";
	}
}
?>