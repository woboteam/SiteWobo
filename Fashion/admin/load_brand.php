<?php
include_once("models/m_brand.php");
$m_brand = new M_brand();
$result = $m_brand->get_all_brand();
$data = array("data" => array());
foreach ($result as $val_result) {
   $id = $val_result->brand_id;
   if ($val_result->brand_status==0){
      $str_active = "<a class='btn btn-social-icon btn-bitbucket m-t-2 m-r-1' title='Hiển thị' data-id='".$id."'><i class='fa fa-eye'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin sản phẩm' href='edit_brand.php?id=".$id."'><i class='fa fa-pencil'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa sản phẩm' data-id='".$id."'><i class='fa fa-trash-o'></i></a>";
   } else {
      $str_active = "<a class='btn btn-social-icon btn-github m-t-2 m-r-1' title='Không hiển thị' data-id='".$id."'><i class='fa fa-eye-slash'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin sản phẩm' href='edit_brand.php?id=".$id."'><i class='fa fa-pencil'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa sản phẩm' data-id='".$id."'><i class='fa fa-trash-o'></i></a>";
   }
   $data["data"][] = array($val_result->brand_id, $val_result->brand_name, $str_active);
}
echo json_encode($data);
?>