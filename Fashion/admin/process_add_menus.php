<?php
 // print_r($_POST);
if (isset($_POST["menu_name"], $_POST["menu_slug"])){
	include_once("models/m_menus.php");
	include_once("library/SimpleImage.php");
	$m_menus = new M_menu();
	$menu_name = trim($_POST["menu_name"]);
	$menu_slug = trim($_POST["menu_slug"]);
	$menu_parent = $_POST["menu_parent"];
	$menu_order = $_POST["menu_order"];
	// $check_insert = $m_menus->check_insert($menu_slug);
	// if ($check_insert==false){
		$add_menus = $m_menus->insert_menus($menu_name, $menu_slug, $menu_parent, $menu_order);
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