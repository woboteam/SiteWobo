<?php
include_once("models/m_sliders.php");
$m_slider = new M_sliders();
$result = $m_slider->get_all_slider();
$data = array("data" => array());
foreach ($result as $val_result) {
   $id = $val_result->slider_id;
   if ($val_result->status==0){
      $str_active = "<a class='btn btn-social-icon btn-bitbucket m-t-2 m-r-1' title='Hiển thị' data-id='".$id."'><i class='fa fa-eye'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết sản phẩm' data-toggle='modal' data-target='#model_slider_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin sản phẩm' href='edit_slider.php?id=".$id."'><i class='fa fa-pencil'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa sản phẩm' data-id='".$id."'><i class='fa fa-trash-o'></i></a>";
   } else {
      $str_active = "<a class='btn btn-social-icon btn-github m-t-2 m-r-1' title='Không hiển thị' data-id='".$id."'><i class='fa fa-eye-slash'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết sản phẩm' data-toggle='modal' data-target='#model_slider_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin sản phẩm' href='edit_slider.php?id=".$id."'><i class='fa fa-pencil'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa sản phẩm' data-id='".$id."'><i class='fa fa-trash-o'></i></a>";
   }
   $data["data"][] = array($val_result->slider_id, "<img height='100' width='200' src='../public/_thumbs/Images/sliders/".$val_result->slider_img."'></img>", $val_result->slider_name , date("H:i:s d-m-Y", strtotime($val_result->slider_modify)), $str_active);
}
echo json_encode($data);
?>