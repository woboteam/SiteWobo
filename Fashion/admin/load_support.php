<?php
include_once("models/m_support.php");
$m_support = new M_support();
$result = $m_support->get_all_support();
$data = array("data" => array());
foreach ($result as $val_result) {
   $id = $val_result->support_id;
   if ($val_result->support_status==0){
      $str_active = "<a class='btn btn-social-icon btn-bitbucket m-t-2 m-r-1' title='Hiển thị' data-id='".$id."'><i class='fa fa-eye'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết sản phẩm' data-toggle='modal' data-target='#model_slider_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin sản phẩm' href='edit_support.php?id=".$id."'><i class='fa fa-pencil'></i></a>";
   } else {
      $str_active = "<a class='btn btn-social-icon btn-github m-t-2 m-r-1' title='Không hiển thị' data-id='".$id."'><i class='fa fa-eye-slash'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết sản phẩm' data-toggle='modal' data-target='#model_slider_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin sản phẩm' href='edit_support.php?id=".$id."'><i class='fa fa-pencil'></i></a>";
   }
   $data["data"][] = array($val_result->support_id, "<img height='100' width='200' src='../public/support/".$val_result->support_img."'></img>", $val_result->support_name, $val_result->support_phone, $str_active);
}
echo json_encode($data);
?>