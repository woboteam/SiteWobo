<?php
if (isset($_POST['menu_id'],$_POST['menu_slug'])){
	include_once("models/m_menus.php");
	$m_menus = new M_menu();
	$menu_id = $_POST["menu_id"];
	$menu_name = trim($_POST["menu_name"]);
	$menu_slug = trim($_POST["menu_slug"]);
	$menu_parent = $_POST["menu_parent"];
	$menu_order = $_POST["menu_order"];

	$flag_update = false;
	$exist_menus = $m_menus->get_menu_id($menu_id);
	if ($exist_menus!=false){
		$flag_update = true;
	}
	if ($flag_update){
		$edit = $m_menus->update_menus($menu_id, $menu_name, $menu_slug, $menu_parent, $menu_order);
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