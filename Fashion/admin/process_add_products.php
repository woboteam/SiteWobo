<?php
if (isset($_POST['pro_name'],$_POST['pro_slug'],$_POST['pro_price'])){
	include_once("models/m_products.php");
	include_once("models/m_photos.php");
	include_once("library/SimpleImage.php");
	$m_products = new M_product();
	$pro_name 	= trim($_POST['pro_name']);
	$pro_slug 	= trim($_POST['pro_slug']);
	$pro_price 	= trim($_POST['pro_price']);
	$pro_year 	= trim($_POST['pro_year']);
	$pro_kind 	= trim($_POST['pro_kind']);
	$pro_color	= trim($_POST['pro_color']);
	$pro_typerend 	= trim($_POST['pro_typerend']);
	$pro_desc	= trim($_POST['pro_desc']);
	$pro_detail	= trim($_POST['pro_detail']);
	$pro_spec	= trim($_POST['pro_spec']);
	$pro_img	= "";
	$photo_id	= time();
	$cate_id	= $_POST["cate_id"];
	$pro_status	= 0;

	$check_product = $m_products->check_insert($pro_name, $pro_slug);
	if($check_product==false){
		foreach ($_FILES["photo_id"]["name"] as $key => $value) {
			if ($_FILES['photo_id']['error'][$key]==0){
				$extension = array("JPEG","JPG","PNG","GIF","BMP");
				$filename = $_FILES['photo_id']['name'][$key];
				$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
				$photo_size = filesize($_FILES['photo_id']['tmp_name'][$key]);
				if (in_array($ext, $extension) && $photo_size<=3*1024*1024){
					$image = new SimpleImage();
					$photo_name = "";
					$m_images = new M_photo();
					if(!file_exists("../public/products/".$filename)){
						//$str .= $filename . '|';
						$image->load($_FILES['photo_id']['tmp_name'][$key])->save('../public/products/'.$filename);
						$image->load($_FILES['photo_id']['tmp_name'][$key])->thumbnail(100, 70)->save('../public/_thumbs/Images/products/'.$filename);
						$photo_name = $filename;
					} else {
						$filename=basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
						$newFileName = $filename.time().".".$ext;
						$image->load($_FILES['photo_id']['tmp_name'][$key])->save('../public/products/'.$newFileName);
						$image->load($_FILES['photo_id']['tmp_name'][$key])->thumbnail(100, 70)->save('../public/_thumbs/Images/products/'.$newFileName);
						$photo_name = $newFileName;
					}
					//echo $photo_id.' | '. $photo_name .' | '. $photo_size;
					$rs_upload = $m_images->insert_img($photo_id, $photo_name, $photo_size);
				}
			}
		}
		if ($_FILES["pro_img"]["error"]==0){
			$extension = array("JPEG","JPG","PNG","GIF","BMP");
			$filename = $_FILES['pro_img']['name'];
			$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
			if (in_array($ext, $extension) && filesize($_FILES['pro_img']['tmp_name'])<=3*1024*1024){
				$image = new SimpleImage();
				if(!file_exists("../public/products/".$filename)){
					// $image->load($_FILES['pro_img']['tmp_name'])->resize(280, 180)->save('../public/products/'.$filename);
					$image->load($_FILES['pro_img']['tmp_name'])->save('../public/products/'.$filename);
					$image->load($_FILES['pro_img']['tmp_name'])->thumbnail(100,70)->save('../public/_thumbs/Images/products/'.$filename);
					$pro_img = $filename;
				} else {
					$filename = basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
					$newFileName = $filename.time().".".$ext;
					// $image->load($_FILES['pro_img']['tmp_name'])->resize(280, 180)->save('../public/products/'.$newFileName);
					$image->load($_FILES['pro_img']['tmp_name'])->save('../public/products/'.$newFileName);
					$image->load($_FILES['pro_img']['tmp_name'])->thumbnail(100,70)->save('../public/_thumbs/Images/products/'.$newFileName);
					$pro_img = $newFileName;
				}
			}
		}
		
		$add = $m_products->insert_product($pro_name, $pro_slug, $pro_year, $pro_color, $pro_kind, $pro_desc, $pro_detail, $pro_spec, $pro_price, $pro_typerend, $pro_img, $photo_id, $cate_id, $pro_status);
		if ($add){
			echo "success";
		} else {
			echo "error";
		}
	} else {
		echo "duplicate";
	}
} else {
	echo "valid";
}
?>