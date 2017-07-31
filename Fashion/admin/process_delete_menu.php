<?php
if (isset($_POST["id"])){
	include_once("models/m_menus.php");
	$m_menu = new M_menu();
	$menu_id = $_POST["id"];
	$menu_current = $m_menu->get_menu_id($menu_id);
	if ($menu_current!=false){
		$delete_menu = $m_menu->delete_menus($menu_id);
		if ($delete_menu){
			echo "success";
		}
	}
}
?>