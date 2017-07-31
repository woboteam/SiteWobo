<?php
if (isset($_POST["id"])){
	include_once("models/m_brand.php");
	$m_brand = new M_brand();
	$brand_id = $_POST["id"];
	$brand_current = $m_brand->get_brand_id($brand_id);
	//echo $pro_id;
	if ($brand_current){
		// Xử lý xóa hình đại diện tin tức ra khỏi ổ cứng
		
		$delete_brand = $m_brand->delete_brand($brand_id);
		if ($delete_brand){
			echo "success";
		}
	}
}
?>