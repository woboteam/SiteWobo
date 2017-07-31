<?php
if (isset($_POST["slider_name"])){
	include_once("models/m_sliders.php");
	include_once("library/SimpleImage.php");
	$m_sliders = new M_sliders();
	$slider_name = trim($_POST["slider_name"]);
	$slider_desc = trim($_POST["slider_desc"]);
	$slider_img = "";
	if ($_FILES["slider_img"]["error"]==0){
		$extension = array("JPEG","JPG","PNG","GIF","BMP");
		$filename = $_FILES['slider_img']['name'];
		$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
		$slider_size = filesize($_FILES['slider_img']['tmp_name']);
		if (in_array($ext, $extension) && $slider_size<=3*1024*1024){
			$image = new SimpleImage();
			if(!file_exists("../public/sliders/".$filename)){
				$image->load($_FILES['slider_img']['tmp_name'])->resize(1900, 1060)->save('../public/sliders/'.$filename);
				$image->load($_FILES['slider_img']['tmp_name'])->thumbnail(200,100)->save('../public/_thumbs/Images/sliders/'.$filename);
				$slider_img = $filename;
			} else {
				$filename = basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
				$newFileName = $filename.time().".".$ext;
				$image->load($_FILES['slider_img']['tmp_name'])->resize(1900, 1060)->save('../public/sliders/'.$newFileName);
				$image->load($_FILES['slider_img']['tmp_name'])->thumbnail(200,100)->save('../public/_thumbs/Images/sliders/'.$newFileName);
				$slider_img = $newFileName;
			}
		}
	}
	
	$add_sliders = $m_sliders->insert_slider($slider_name, $slider_img, $slider_desc, $slider_size);
	if ($add_sliders){
		echo "success";
	} else {
		echo "error";
	}
}
?>