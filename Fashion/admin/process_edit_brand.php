<?php
if (isset($_POST['brand_id'],$_POST['brand_slug'])){
	include_once("models/m_brand.php");
	$m_brand 		= new M_brand();

	$brand_id 			= trim($_POST["brand_id"]);
	$brand_name 		= trim($_POST['brand_name']);
	$brand_slug_src 	= trim($_POST["brand_slug_src"]);
	$brand_slug 		= trim($_POST['brand_slug']);
	

	$flag_update = false;
	$exist_brand = $m_brand->get_brand_id($brand_id);
	if ($exist_brand!=false){
		$flag_update = true;
		
	}
	if ($flag_update){
		if ($brand_slug!=$brand_slug_src){
			$check_brand = $m_brand->check_insert($brand_name, $brand_slug);
			if ($check_brand==false){
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
		
		$edit = $m_brand->update_brand($brand_id, $brand_name, $brand_slug);
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