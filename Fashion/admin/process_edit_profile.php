<?php
ob_start();
session_start();
$flag = "";
$edit = false;
$changepass=false;
if (isset($_POST['user_id'], $_POST["user_pass"])){
	include_once("models/m_users.php");
	include_once("library/SimpleImage.php");
	$m_users 		= new M_user();

	$user_id 			= trim($_POST["user_id"]);
	$user_name			= trim($_POST["user_name"]);
	$user_email 		= trim($_POST['user_email']);
	$user_pass 			= MD5(trim($_POST["user_pass"]));
	$user_pass_new 		= MD5(trim($_POST['user_pass_new']));
	$user_pass_re		= MD5(trim($_POST['user_pass_re']));
	$user_email_src     = trim($_POST['user_email_src']);

	$exist_avatar = $m_users->login_admin($user_name, $user_pass);
	if ($exist_avatar!=false){
		$user_img = $exist_avatar->user_img;
		
		if (strlen($user_email)!=0){
			$check_valid_email = $m_users->check_email_valid($user_email);
			if ($check_valid_email==false || $user_email_src===$user_email){
				if ($_FILES["user_img"]["error"]==0){
					$extension = array("JPEG","JPG","PNG","GIF","BMP");
					$filename = $_FILES['user_img']['name'];
					$ext = strtoupper(pathinfo($filename, PATHINFO_EXTENSION));
					if (in_array($ext, $extension) && filesize($_FILES['user_img']['tmp_name'])<=3*1024*1024){
						$image = new SimpleImage();

						// Gõ bỏ file ảnh hình đại diện sản phẩm ra khỏi đĩa cứng
						$file_user_img1 = "../public/avatar/".$user_img;
						$file_user_img2 = "../public/_thumbs/Images/avatar/".$user_img;
						if (file_exists($file_user_img1)){
							unlink($file_user_img1);
						}
						if (file_exists($file_user_img2)){
							unlink($file_user_img2);
						}
						// Kiểm tra xem hình chi tiết sản phẩm để tiến hành Upload lên server
						if(!file_exists("../public/avatar/".$filename)){
							$image->load($_FILES['user_img']['tmp_name'])->resize(300, 300)->save('../public/avatar/'.$filename);
							$image->load($_FILES['user_img']['tmp_name'])->thumbnail(200,200)->save('../public/_thumbs/Images/avatar/'.$filename);
							$user_img = $filename;
						} else {
							$filename = basename($filename,pathinfo($filename, PATHINFO_EXTENSION));
							$newFileName = $filename.time().".".$ext;
							$image->load($_FILES['user_img']['tmp_name'])->resize(300, 300)->save('../public/avatar/'.$newFileName);
							$image->load($_FILES['user_img']['tmp_name'])->thumbnail(200,200)->save('../public/_thumbs/Images/avatar/'.$newFileName);
							$user_img = $newFileName;
						}
					}
				}
				$edit = $m_users->update_info_user($user_id, $user_email, $user_img);
			} else { $flag="duplicate";}
		}
		// var_dump($user_pass);
		if (strlen(trim($_POST['user_pass_new']))>=8 && $user_pass_new===$user_pass_re){
			$changepass = $m_users->change_pass($user_id, $user_pass_new);
		}
		if ($edit!=false || $changepass!=false){ 
			$_SESSION['se-car-user-lg'] =  $m_users->login_admin($user_name, $user_pass);
			$flag="success";
		}

	} else {
		$flag= "pass";
	}
} else {
	$flag= "valid";
}
echo $flag;
?>