<?php
if (isset($_POST["id"])){
	include_once("models/m_products.php");
	$m_products = new M_product();
	$pro_id = $_POST["id"];
	$product_hide = $m_products->set_product_status($pro_id, 1);
	if ($product_hide){
		echo "success";
	}
}
?>