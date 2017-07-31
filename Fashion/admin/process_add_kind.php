<?php
 // print_r($_POST);
if (isset($_POST["kind_name"], $_POST["kind_slug"])){
	include_once("models/m_kind.php");
	
	$m_kind = new M_kind();
	$kind_name = trim($_POST["kind_name"]);
	$kind_slug = trim($_POST["kind_slug"]);
	$brand_id = $_POST["brand_id"];
	
	$check_insert = $m_kind->check_insert($kind_name,$kind_slug);
	// if ($check_insert==false){
		$add_menus = $m_kind->insert_kind($kind_name, $kind_slug, $brand_id);
		if ($add_menus){
			echo "success";
		} else {
			echo "error";
		}	
	// } else {
	// 	echo "duplicate";
	// }
}
?>