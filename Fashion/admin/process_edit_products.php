<?php
if (isset($_POST['pro_id'],$_POST['pro_slug'],$_POST['pro_price'])){
	include_once("models/m_products.php");
	include_once("models/m_photos.php");
	include_once("library/SimpleImage.php");
	$m_products 		= new M_product();
	$m_photos			= new M_photo();

	$pro_id 			= trim($_POST["pro_id"]);
	$pro_name 			= trim($_POST['pro_name']);
	$pro_slug_src 		= trim($_POST["pro_slug_src"]);
	$pro_slug 			= trim($_POST['pro_slug']);
	$pro_price 			= trim($_POST['pro_price']);
	$pro_desc			= trim($_POST['pro_desc']);
	$pro_detail			= trim($_POST['pro_detail']);
	$pro_spec			= trim($_POST['pro_spec']);
	$photo_id			= $_POST["photo_id"];
	$cate_id			= $_POST["cate_id"];
	$pro_year 			= trim($_POST['pro_year']);
	$pro_kind 			= trim($_POST['pro_kind']);
	$pro_color			= trim($_POST['pro_color']);
	$pro_typerend 		= trim($_POST['pro_typerend']);
	$str_photo_key_del 	= $_POST["photo_key"];

	$flag_update = false;
	$flag_pro_img = false;
	$exist_product = $m_products->get_pro_id($pro_id);
	if ($exist_product!=false){
		$flag_update = true;
		$pro_img = $exist_product->pro_img;
	}
	if ($flag_update){
		if ($pro_slug!=$pro_slug_src){
			$check_product = $m_products->check_insert($pro_name, $pro_slug);
			if ($check_product==false){
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
		if ($str_photo_key_del!==""){
			$list_photo_key_del = explode("|", $str_photo_key_del);
			$str_photo = implode(",", $list_photo_key_del)."0";
			$list_photo = $m_photos->list_photo_by_key($str_photo);
			foreach ($list_photo as $val_photo) {
				$file_name1 = "../public/products/".$val_photo->photo_name;
				$file_name2 = "../public/_thumbs/Images/products/".$val_photo->photo_name;
				if (file_exists($file_name1)){
					unlink($file_name1);
				}
				if (file_exists($file_name2)){
					unlink($file_name2);
				}
			}
			$delete_list_photo = $m_photos->delete_img($str_photo);
		}
		foreach ($_FILES["photo_key"]["name"] as $key => $value) {
			if ($_FILES['photo_key']['error'][$key]==0){
				$extension = array("JPEG","JPG","PNG","GIF","BMP");
				$filename = $_FILES['photo_key']['name'][$key];
				$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
				$photo_size = filesize($_FILES['photo_key']['tmp_name'][$key]);
				if (in_array($ext, $extension) && $photo_size<=3*1024*1024){
					$image = new SimpleImage();
					$photo_name = "";
					$m_images = new M_photo();
					if(!file_exists("../public/products/".$filename)){
						$image->load($_FILES['photo_key']['tmp_name'][$key])->save('../public/products/'.$filename);
						$image->load($_FILES['photo_key']['tmp_name'][$key])->thumbnail(100, 70)->save('../public/_thumbs/Images/products/'.$filename);
						$photo_name = $filename;
					} else {
						$filename=basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
						$newFileName = $filename.time().".".$ext;
						$image->load($_FILES['photo_key']['tmp_name'][$key])->save('../public/products/'.$newFileName);
						$image->load($_FILES['photo_key']['tmp_name'][$key])->thumbnail(100, 70)->save('../public/_thumbs/Images/products/'.$newFileName);
						$photo_name = $newFileName;
					}
					//echo $photo_key.' | '. $photo_name .' | '. $photo_size;
					$rs_upload = $m_photos->insert_img($photo_id, $photo_name, $photo_size);
				}
			}
		}
		if ($_FILES["pro_img"]["error"]==0){
			$extension = array("JPEG","JPG","PNG","GIF","BMP");
			$filename = $_FILES['pro_img']['name'];
			$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
			if (in_array($ext, $extension) && filesize($_FILES['pro_img']['tmp_name'])<=3*1024*1024){
				$image = new SimpleImage();

				// Gõ bỏ file ảnh hình đại diện sản phẩm ra khỏi đĩa cứng
				$file_pro_img1 = "../public/products/".$pro_img;
				$file_pro_img2 = "../public/_thumbs/Images/products/".$pro_img;
				if (file_exists($file_pro_img1)){
					unlink($file_pro_img1);
				}
				if (file_exists($file_pro_img2)){
					unlink($file_pro_img2);
				}
				// Kiểm tra xem hình chi tiết sản phẩm để tiến hành Upload lên server
				if(!file_exists("../public/products/".$filename)){
					// $image->load($_FILES['pro_img']['tmp_name'])->resize(280, 280)->save('../public/products/'.$filename);
					$image->load($_FILES['pro_img']['tmp_name'])->save('../public/products/'.$filename);
					$image->load($_FILES['pro_img']['tmp_name'])->thumbnail(100,70)->save('../public/_thumbs/Images/products/'.$filename);
					$pro_img = $filename;
				} else {
					$filename = basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
					$newFileName = $filename.time().".".$ext;
					// $image->load($_FILES['pro_img']['tmp_name'])->resize(280, 280)->save('../public/products/'.$newFileName);
					$image->load($_FILES['pro_img']['tmp_name'])->save('../public/products/'.$newFileName);
					$image->load($_FILES['pro_img']['tmp_name'])->thumbnail(100,70)->save('../public/_thumbs/Images/products/'.$newFileName);
					$pro_img = $newFileName;
				}
				$flag_pro_img = true;
			}
		}
		$edit = $m_products->update_product($pro_id, $pro_name, $pro_slug, $pro_year, $pro_color, $pro_kind, $pro_desc, $pro_detail, $pro_spec, $pro_price, $pro_typerend, $pro_img, $cate_id);
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