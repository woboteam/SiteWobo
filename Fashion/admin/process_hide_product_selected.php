<?php
include_once("models/m_products.php");
if (isset($_POST["id"])){
	$str_product_id = implode(',',$_POST["id"]);
	$m_product = new M_product();
	$product_list_hide = $m_product->set_product_array_status_hide($str_product_id, 1);
	if ($product_list_hide){
		echo "success";
	}
}
?>