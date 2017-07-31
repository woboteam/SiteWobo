<?php
include_once("models/m_products.php");
$m_product = new M_product();
$result = $m_product->get_all_product();
$data = array("data" => array());
foreach ($result as $val_result) {
   $id = $val_result->pro_id;
   if ($val_result->pro_status==0){
      $str_active = "<a class='btn btn-social-icon btn-bitbucket m-t-2 m-r-1' title='Hiển thị' data-id='".$id."'><i class='fa fa-eye'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết sản phẩm' data-toggle='modal' data-target='#model_products_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin sản phẩm' href='edit_product.php?id=".$id."'><i class='fa fa-pencil'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa sản phẩm' data-id='".$id."'><i class='fa fa-trash-o'></i></a>";
   } else {
      $str_active = "<a class='btn btn-social-icon btn-github m-t-2 m-r-1' title='Không hiển thị' data-id='".$id."'><i class='fa fa-eye-slash'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết sản phẩm' data-toggle='modal' data-target='#model_products_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin sản phẩm' href='edit_product.php?id=".$id."'><i class='fa fa-pencil'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa sản phẩm' data-id='".$id."'><i class='fa fa-trash-o'></i></a>";
   }
   $data["data"][] = array($val_result->pro_id, "<img height='50' width='50' src='../public/_thumbs/Images/products/".$val_result->pro_img."'></img>", $val_result->pro_name , $val_result->pro_price, $str_active);
}
echo json_encode($data);
?>