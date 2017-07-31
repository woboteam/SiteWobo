<?php
if (isset($_POST['support_id'],$_POST['support_name'],$_POST['support_fb'])){
	include_once("models/m_support.php");
	include_once("models/m_photos.php");
	include_once("library/SimpleImage.php");
	$m_support 		= new M_support();
	$m_photos			= new M_photo();

	$support_id 			= trim($_POST["support_id"]);
	$support_name 			= trim($_POST['support_name']);
	$support_fb 			= trim($_POST['support_fb']);
	$support_phone			= trim($_POST['support_phone']);

	$exist_product = $m_support->get_support_id($support_id);
	if ($exist_product!=false){
		
		$support_img = $exist_product->support_img;
		
		if ($_FILES["support_img"]["error"]==0){
			$extension = array("JPEG","JPG","PNG","GIF","BMP");
			$filename = $_FILES['support_img']['name'];
			$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
			if (in_array($ext, $extension) && filesize($_FILES['support_img']['tmp_name'])<=3*1024*1024){
				$image = new SimpleImage();

				// Gõ bỏ file ảnh hình đại diện sản phẩm ra khỏi đĩa cứng
				$file_support_img1 = "../public/support/".$support_img;
				$file_support_img2 = "../public/_thumbs/Images/support/".$support_img;
				if (file_exists($file_support_img1)){
					unlink($file_support_img1);
				}
				if (file_exists($file_support_img2)){
					unlink($file_support_img2);
				}
				// Kiểm tra xem hình chi tiết sản phẩm để tiến hành Upload lên server
				if(!file_exists("../public/support/".$filename)){
					// $image->load($_FILES['support_img']['tmp_name'])->resize(280, 280)->save('../public/support/'.$filename);
					$image->load($_FILES['support_img']['tmp_name'])->save('../public/support/'.$filename);
					$image->load($_FILES['support_img']['tmp_name'])->thumbnail(100,100)->save('../public/_thumbs/Images/support/'.$filename);
					$support_img = $filename;
				} else {
					$filename = basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
					$newFileName = $filename.time().".".$ext;
					// $image->load($_FILES['support_img']['tmp_name'])->resize(280, 280)->save('../public/support/'.$newFileName);
					$image->load($_FILES['support_img']['tmp_name'])->save('../public/support/'.$newFileName);
					$image->load($_FILES['support_img']['tmp_name'])->thumbnail(100,100)->save('../public/_thumbs/Images/support/'.$newFileName);
					$support_img = $newFileName;
				}
				$flag_support_img = true;
			}
		}
		$edit = $m_support->update_support($support_id, $support_name, $support_img, $support_phone, $support_fb);
		if ($edit!=false){
			// Trả kết quả thành công
			echo "success";
		} else {
			echo "error";
		}
	} else {
		echo "valid";
	}
} else {
	echo "valid";
}
?>