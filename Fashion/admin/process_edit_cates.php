<?php
if (isset($_POST['cate_id'],$_POST['cate_slug'])){
	include_once("models/m_cates.php");
	include_once("library/SimpleImage.php");
	$m_cates = new M_cates();
	$cate_id = $_POST["cate_id"];
	$cate_name = trim($_POST["cate_name"]);
	$cate_slug_src = $_POST["cate_slug_src"];
	$cate_slug = trim($_POST["cate_slug"]);
	$cate_img = "";
	$cate_parent = $_POST["cate_parent"];
	
	$cate_order = $_POST["cate_order"];
	$cate_status = 0;

	$flag_update = false;
	$exist_cates = $m_cates->get_cate_id($cate_id);
	if ($exist_cates!=false){
		$flag_update = true;
		$cate_img = $exist_cates->cate_img;
	}
	if ($flag_update){
		if ($cate_slug!=$cate_slug_src){
			$check_cates = $m_cates->check_insert($cate_slug);
			if ($check_cates==false){
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
		
		if ($_FILES["cate_img"]["error"]==0){
			$extension = array("JPEG","JPG","PNG","GIF","BMP");
			$filename = $_FILES['cate_img']['name'];
			$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
			if (in_array($ext, $extension) && filesize($_FILES['cate_img']['tmp_name'])<=3*1024*1024){
				$image = new SimpleImage();

				// Gõ bỏ file ảnh hình đại diện sản phẩm ra khỏi đĩa cứng
				$file_cate_img1 = "../public/navmain/".$cate_img;
				$file_cate_img2 = "../public/_thumbs/Images/navmain/".$cate_img;
				if (file_exists($file_cate_img1)){
					unlink($file_cate_img1);
				}
				if (file_exists($file_cate_img2)){
					unlink($file_cate_img2);
				}
				// Kiểm tra xem hình chi tiết sản phẩm để tiến hành Upload lên server
				if(!file_exists("../public/navmain/".$filename)){
					$image->load($_FILES['cate_img']['tmp_name'])->resize(280, 280)->save('../public/navmain/'.$filename);
					$image->load($_FILES['cate_img']['tmp_name'])->thumbnail(100,100)->save('../public/_thumbs/Images/navmain/'.$filename);
					$cate_img = $filename;
				} else {
					$filename = basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
					$cateFileName = $filename.time().".".$ext;
					$image->load($_FILES['cate_img']['tmp_name'])->resize(280, 280)->save('../public/navmain/'.$cateFileName);
					$image->load($_FILES['cate_img']['tmp_name'])->thumbnail(100,100)->save('../public/_thumbs/Images/navmain/'.$cateFileName);
					$cate_img = $cateFileName;
				}
			}
		}
		$edit = $m_cates->update_cates($cate_id, $cate_name, $cate_slug, $cate_parent, $cate_img, $cate_order);
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