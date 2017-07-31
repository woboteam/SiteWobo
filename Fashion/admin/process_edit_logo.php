<?php
	include_once("models/m_info.php");
	include_once("library/SimpleImage.php");
	$m_info 		= new M_info();
	

	if ($_FILES["info_img"]["error"]==0){
		$extension = array("JPEG","JPG","PNG","GIF","BMP");
		$filename = $_FILES['info_img']['name'];
		$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
		if (in_array($ext, $extension) && filesize($_FILES['info_img']['tmp_name'])<=3*1024*1024){
			$image = new SimpleImage();
			$info_img = $m_info->get_info_id(6)->infor_detail;
			// Gõ bỏ file ảnh hình đại diện sản phẩm ra khỏi đĩa cứng
			$file_info_img1 = "../public/logo/".$info_img;
			$file_info_img2 = "../public/_thumbs/Images/logo/".$info_img;
			if (file_exists($file_info_img1)){
				unlink($file_info_img1);
			}
			if (file_exists($file_info_img2)){
				unlink($file_info_img2);
			}
			// Kiểm tra xem hình chi tiết sản phẩm để tiến hành Upload lên server
			if(!file_exists("../public/logo/".$filename)){
				// $image->load($_FILES['info_img']['tmp_name'])->resize(280, 280)->save('../public/logo/'.$filename);
				$image->load($_FILES['info_img']['tmp_name'])->save('../public/logo/'.$filename);
				$image->load($_FILES['info_img']['tmp_name'])->thumbnail(100,70)->save('../public/_thumbs/Images/logo/'.$filename);
				$info_img = $filename;
			} else {
				$filename = basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
				$newFileName = $filename.time().".".$ext;
				// $image->load($_FILES['info_img']['tmp_name'])->resize(280, 280)->save('../public/logo/'.$newFileName);
				$image->load($_FILES['info_img']['tmp_name'])->save('../public/logo/'.$newFileName);
				$image->load($_FILES['info_img']['tmp_name'])->thumbnail(100,70)->save('../public/_thumbs/Images/logo/'.$newFileName);
				$info_img = $newFileName;
			}
			$flag_info_img = true;
		}
		$edit = $m_info->update_infor(6, "Ảnh Logo", $info_img);
		if ($edit!=false){
			// Trả kết quả thành công
			echo "success";
		} else {
			echo "error";
		}
	} else {
		echo "valid";
	}
?>