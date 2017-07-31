<?php
if (isset($_POST["id"])){
	$arr_pro_id = $_POST["id"];
	$str_pro_id = implode(",",$_POST["id"]);// Trả về chuổi các pro_id
	include_once("models/m_products.php");
	include_once("models/m_photos.php");
	$m_products = new M_product();
	foreach ($arr_pro_id as $pro_id) {
		$current_product = $m_products->get_pro_id($pro_id);
		if ($current_product){
			$pro_img  = $current_product->pro_img;
			$file_pro_img1 = "../public/products/".$pro_img;
			$file_pro_img2 = "../public/_thumbs/Images/products/".$pro_img;
			if (file_exists($file_pro_img1)){
				unlink($file_pro_img1);
			}
			if (file_exists($file_pro_img2)){
				unlink($file_pro_img2);
			}
			// Xử lý xóa hình chi tiết sản phẩm ra khỏi ổ cứng
			$photo_id = $current_product->photo_id;
			$m_photos = new M_photo();
			$select_photo = $m_photos->list_photo($photo_id);
			//print_r($select_photo);
			$delete_photo = $m_photos->delete_photo($photo_id);
			$delete_product = $m_products->delete_product($pro_id);
			if ($delete_product){
				if ($select_photo!=false){
					foreach ($select_photo as $val_photo) {
						$file_name1 = "../public/products/".$val_photo->photo_name;
						$file_name2 = "../public/_thumbs/Images/products/".$val_photo->photo_name;
						if (file_exists($file_name1)){
							unlink($file_name1);
						}
						if (file_exists($file_name2)){
							unlink($file_name2);
						}
					}
				}
			}
		}
	}
	$list_pro = $m_products->get_product_array_id($str_pro_id);
	if (count($list_pro)==0){
		echo "success";
	}
}
?>