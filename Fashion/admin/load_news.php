<?php
include_once("models/m_news.php");
$m_news = new M_news();
$result = $m_news->get_all_news();
$data = array("data" => array());
foreach ($result as $val_result) {
   $id = $val_result->new_id;
   if ($val_result->new_status==0){
      $str_active = "<a class='btn btn-social-icon btn-bitbucket m-t-2 m-r-1' title='Hiển thị' data-id='".$id."'><i class='fa fa-eye'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết sản phẩm' data-toggle='modal' data-target='#model_news_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin sản phẩm' href='edit_news.php?id=".$id."'><i class='fa fa-pencil'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa sản phẩm' data-id='".$id."'><i class='fa fa-trash-o'></i></a>";
   } else {
      $str_active = "<a class='btn btn-social-icon btn-github m-t-2 m-r-1' title='Không hiển thị' data-id='".$id."'><i class='fa fa-eye-slash'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết sản phẩm' data-toggle='modal' data-target='#model_news_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-warning m-t-2 m-r-1' title='Sửa thông tin sản phẩm' href='edit_news.php?id=".$id."'><i class='fa fa-pencil'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa sản phẩm' data-id='".$id."'><i class='fa fa-trash-o'></i></a>";
   }
   $data["data"][] = array($val_result->new_id, "<img height='50' width='50' src='../public/_thumbs/Images/news/".$val_result->new_img."'></img>", $val_result->new_title , date("H:i:s d-m-Y", strtotime($val_result->new_create)), $str_active);
}
echo json_encode($data);
?>