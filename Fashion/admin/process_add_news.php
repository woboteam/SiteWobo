<?php
if (isset($_POST["news_title"], $_POST["news_slug"], $_POST["cate_id"])){
	include_once("models/m_news.php");
	include_once("library/SimpleImage.php");
	$m_news = new M_news();
	$new_title = trim($_POST["news_title"]);
	$new_slug = trim($_POST["news_slug"]);
	$new_desc = trim($_POST["news_desc"]);
	$new_detail = trim($_POST["news_detail"]);
	$new_img = "";
	$cate_id = $_POST["cate_id"];
	$new_status = 0;
	$check_insert = $m_news->check_insert($new_title, $new_slug);
	if ($check_insert==false){
		if ($_FILES["news_img"]["error"]==0){
			$extension = array("JPEG","JPG","PNG","GIF","BMP");
			$filename = $_FILES['news_img']['name'];
			$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
			if (in_array($ext, $extension) && filesize($_FILES['news_img']['tmp_name'])<=3*1024*1024){
				$image = new SimpleImage();
				if(!file_exists("../public/news/".$filename)){
					$image->load($_FILES['news_img']['tmp_name'])->resize(500, 325)->save('../public/news/'.$filename);
					$image->load($_FILES['news_img']['tmp_name'])->thumbnail(200,110)->save('../public/_thumbs/Images/news/'.$filename);
					$new_img = $filename;
				} else {
					$filename = basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
					$newFileName = $filename.time().".".$ext;
					$image->load($_FILES['news_img']['tmp_name'])->resize(500, 325)->save('../public/news/'.$newFileName);
					$image->load($_FILES['news_img']['tmp_name'])->thumbnail(200,110)->save('../public/_thumbs/Images/news/'.$newFileName);
					$new_img = $newFileName;
				}
			}
		}
		
		$add_news = $m_news->insert_news($new_title, $new_slug, $new_desc, $new_detail, $new_img, $cate_id, $new_status);
		if ($add_news){
			echo "success";
		} else {
			echo "error";
		}
		
	} else {
		echo "duplicate";
	}
}
?>