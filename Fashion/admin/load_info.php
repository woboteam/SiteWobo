<?php
include_once("models/m_info.php");
$m_infor = new M_info();
$result = $m_infor->get_all_infor();
$data = array("data" => array());
foreach ($result as $val_result) {
    $id = $val_result->infor_id;
   
    $str_active = "<a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết trang' data-toggle='modal' data-target='#model_pages_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin trang' href='edit_infor.php?id=".$id."'><i class='fa fa-pencil'></i></a> <!--<a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa trang' data-id='".$id."'><i class='fa fa-trash-o'></i></a>-->";
   $temp = $val_result->infor_detail;
   $array = explode(" ", $temp);
   
   if (count($array)>=20){
   		$detail = "";
	   	for ($i=0; $i<=10; $i++) {
	   		$detail .= $array[$i]." ";	
	   	}
	} else {
		$detail = $val_result->infor_detail;
	}
   $data["data"][] = array($val_result->infor_id, $val_result->infor_name , $detail , $str_active);
}
echo json_encode($data);
?>