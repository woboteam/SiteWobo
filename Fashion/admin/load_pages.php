<?php
include_once("models/m_pages.php");
$m_pages = new M_pages();
$result = $m_pages->get_all_pages();
$data = array("data" => array());
foreach ($result as $val_result) {
   $id = $val_result->pages_id;
   if ($val_result->pages_status==0){
      $str_active = "<a class='btn btn-social-icon btn-bitbucket m-t-2 m-r-1' title='Hiển thị' data-id='".$id."'><i class='fa fa-eye'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết trang' data-toggle='modal' data-target='#model_pages_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin trang' href='edit_pages.php?id=".$id."'><i class='fa fa-pencil'></i></a> <!--<a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa trang' data-id='".$id."'><i class='fa fa-trash-o'></i></a>-->";
   } else {
      $str_active = "<a class='btn btn-social-icon btn-github m-t-2 m-r-1' title='Không hiển thị' data-id='".$id."'><i class='fa fa-eye-slash'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết trang' data-toggle='modal' data-target='#model_pages_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin trang' href='edit_pages.php?id=".$id."'><i class='fa fa-pencil'></i></a> <!--<a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa trang' data-id='".$id."'><i class='fa fa-trash-o'></i></a>-->";
   }
   $data["data"][] = array($val_result->pages_id, $val_result->pages_name , date("H:i:s d-m-Y", strtotime($val_result->pages_create)), $str_active);
}
echo json_encode($data);
?>