<?php
if (isset($_POST['slider_id'])){
	include_once("models/m_sliders.php");
	include_once("library/SimpleImage.php");
	$m_slider 		= new M_sliders();

	$slider_id 			= $_POST["slider_id"];
	$slider_name 		= trim($_POST['slider_name']);
	$slider_desc		= trim($_POST['slider_desc']);

	$flag_update = false;
	$exist_sliders = $m_slider->get_slider_id($slider_id);
	if ($exist_sliders!=false){
		$flag_update = true;
		$slider_img = $exist_sliders->slider_img;
		$slider_size = $exist_sliders->slider_size;
	}
	if ($flag_update){
		
		if ($_FILES["slider_img"]["error"]==0){
			$extension = array("JPEG","JPG","PNG","GIF","BMP");
			$filename = $_FILES['slider_img']['name'];
			$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
			$slider_size = filesize($_FILES['slider_img']['tmp_name']);
			if (in_array($ext, $extension) && $slider_size<=3*1024*1024){
				$image = new SimpleImage();

				// Gõ bỏ file ảnh hình đại diện sản phẩm ra khỏi đĩa cứng
				$file_slider_img1 = "../public/sliders/".$slider_img;
				$file_slider_img2 = "../public/_thumbs/Images/sliders/".$slider_img;
				if (file_exists($file_slider_img1)){
					unlink($file_slider_img1);
				}
				if (file_exists($file_slider_img2)){
					unlink($file_slider_img2);
				}
				// Kiểm tra xem hình chi tiết sản phẩm để tiến hành Upload lên server
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
		$edit = $m_slider->update_slider($slider_id, $slider_name, $slider_img, $slider_desc, $slider_size);
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