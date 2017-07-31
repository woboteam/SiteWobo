<?php
if (isset($_POST["brand_name"], $_POST["brand_slug"])){
	include_once("models/m_brand.php");
	$m_brand = new M_brand();
	$brand_name = trim($_POST["brand_name"]);
	$brand_slug = trim($_POST["brand_slug"]);
	
	$check_insert = $m_brand->check_insert($brand_name, $brand_slug);
	if ($check_insert==false){		
		$add_brand = $m_brand->insert_brand($brand_name, $brand_slug);
		if ($add_brand){
			echo "success";
		} else {
			echo "error";
		}
		
	} else {
		echo "duplicate";
	}
}
?>