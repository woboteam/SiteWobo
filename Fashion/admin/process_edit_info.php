<?php
if (isset($_POST['infor_id'],$_POST['infor_detail'])){
	include_once("models/m_info.php");
	$m_info 		= new M_info();

	$infor_id 			= trim($_POST["infor_id"]);
	$infor_name			= trim($_POST["infor_name"]);
	$infor_detail 		= trim($_POST['infor_detail']);
	
	
	$exist_news = $m_info->get_info_id($infor_id);
	// var_dump($exist_news);
	if ($exist_news!=false){
		$edit = $m_info->update_infor($infor_id, $infor_name, $infor_detail);
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