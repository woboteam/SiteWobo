<?php
if (isset($_POST['new_id'],$_POST['new_slug'])){
	include_once("models/m_news.php");
	include_once("library/SimpleImage.php");
	$m_news 		= new M_news();

	$new_id 			= trim($_POST["new_id"]);
	$new_title 			= trim($_POST['new_title']);
	$new_slug_src 		= trim($_POST["new_slug_src"]);
	$new_slug 			= trim($_POST['new_slug']);
	$new_desc			= trim($_POST['new_desc']);
	$new_detail			= trim($_POST['new_detail']);
	$cate_id			= $_POST["cate_id"];

	$flag_update = false;
	$exist_news = $m_news->get_new_id($new_id);
	if ($exist_news!=false){
		$flag_update = true;
		$new_img = $exist_news->new_img;
	}
	if ($flag_update){
		if ($new_slug!=$new_slug_src){
			$check_news = $m_news->check_insert($new_title, $new_slug);
			if ($check_news==false){
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
		
		if ($_FILES["new_img"]["error"]==0){
			$extension = array("JPEG","JPG","PNG","GIF","BMP");
			$filename = $_FILES['new_img']['name'];
			$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
			if (in_array($ext, $extension) && filesize($_FILES['new_img']['tmp_name'])<=3*1024*1024){
				$image = new SimpleImage();

				// Gõ bỏ file ảnh hình đại diện sản phẩm ra khỏi đĩa cứng
				$file_new_img1 = "../public/news/".$new_img;
				$file_new_img2 = "../public/_thumbs/Images/news/".$new_img;
				if (file_exists($file_new_img1)){
					unlink($file_new_img1);
				}
				if (file_exists($file_new_img2)){
					unlink($file_new_img2);
				}
				// Kiểm tra xem hình chi tiết sản phẩm để tiến hành Upload lên server
				if(!file_exists("../public/news/".$filename)){
					$image->load($_FILES['new_img']['tmp_name'])->resize(500, 325)->save('../public/news/'.$filename);
					$image->load($_FILES['new_img']['tmp_name'])->thumbnail(200,110)->save('../public/_thumbs/Images/news/'.$filename);
					$new_img = $filename;
				} else {
					$filename = basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
					$newFileName = $filename.time().".".$ext;
					$image->load($_FILES['new_img']['tmp_name'])->resize(500, 325)->save('../public/news/'.$newFileName);
					$image->load($_FILES['new_img']['tmp_name'])->thumbnail(200,110)->save('../public/_thumbs/Images/news/'.$newFileName);
					$new_img = $newFileName;
				}
			}
		}
		$edit = $m_news->update_news($new_id, $new_title, $new_slug, $new_desc, $new_detail, $new_img, $cate_id);
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