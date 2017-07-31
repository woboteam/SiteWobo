<?php
if (isset($_POST["id"])){
	include_once("models/m_brand.php");
	$m_brand = new M_brand();
	$brand_id = $_POST["id"];
	$brand_hide = $m_brand->set_brand_status($brand_id, 1);
	if ($brand_hide){
		echo "success";
	}
}
?>