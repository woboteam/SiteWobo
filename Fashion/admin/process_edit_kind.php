<?php
if (isset($_POST['kind_id'],$_POST['kind_slug'])){
	include_once("models/m_kind.php");
	$m_kind = new M_kind();
	$kind_id = $_POST["kind_id"];
	$kind_name = trim($_POST["kind_name"]);
	$kind_slug = trim($_POST["kind_slug"]);
	$brand_id = $_POST["brand_id"];

	$flag_update = false;
	$exist_menus = $m_kind->get_kind_id($kind_id);
	if ($exist_menus!=false){
		$flag_update = true;
	}
	if ($flag_update){
		$edit = $m_kind->update_kind($kind_id, $kind_name, $kind_slug, $brand_id);
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