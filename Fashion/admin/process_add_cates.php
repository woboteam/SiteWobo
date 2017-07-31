<?php
// print_r($_POST);
if (isset($_POST["cate_name"], $_POST["cate_slug"])){
	include_once("models/m_cates.php");
	include_once("library/SimpleImage.php");
	$m_cates = new M_cates();
	$cate_name = trim($_POST["cate_name"]);
	$cate_slug = trim($_POST["cate_slug"]);
	// $cate_desc = trim($_POST["cate_desc"]);
	$cate_img = "";
	$cate_parent = $_POST["cate_parent"];
	$cate_order = $_POST["cate_order"];
	$cate_status = 0;
	$check_insert = $m_cates->check_insert($cate_slug);
	if ($check_insert==false){
		if ($_FILES["cate_img"]["error"]==0){
			$extension = array("JPEG","JPG","PNG","GIF","BMP");
			$filename = $_FILES['cate_img']['name'];
			$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
			if (in_array($ext, $extension) && filesize($_FILES['cate_img']['tmp_name'])<=3*1024*1024){
				$image = new SimpleImage();
				if(!file_exists("../public/navmain/".$filename)){
					$image->load($_FILES['cate_img']['tmp_name'])->resize(280, 180)->save('../public/navmain/'.$filename);
					$image->load($_FILES['cate_img']['tmp_name'])->thumbnail(100,70)->save('../public/_thumbs/Images/navmain/'.$filename);
					$cate_img = $filename;
				} else {
					$filename = basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
					$newFileName = $filename.time().".".$ext;
					$image->load($_FILES['cate_img']['tmp_name'])->resize(280, 180)->save('../public/navmain/'.$newFileName);
					$image->load($_FILES['cate_img']['tmp_name'])->thumbnail(100,70)->save('../public/_thumbs/Images/navmain/'.$newFileName);
					$cate_img = $newFileName;
				}
			}
		}
		
		$add_cates = $m_cates->insert_cates($cate_name, $cate_slug, $cate_parent, $cate_img, $cate_order, $cate_status);
		// print_r($add_cates);
		if ($add_cates){
			echo "success";
		} else {
			echo "error";
		}
		
	} else {
		echo "duplicate";
	}
}
?>