<?php
include_once("models/m_contact.php");
$m_contact = new M_contact();
$result = $m_contact->get_all_contact();
$data = array("data" => array());
foreach ($result as $val_result) {
   $id = $val_result->contact_id;
   if ($val_result->contact_status==0){
      $str_active = "<a class='btn btn-social-icon btn-bitbucket m-t-2 m-r-1' title='Xem' data-id='".$id."'><i class='fa fa-check-square-o'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết liên hệ' data-toggle='modal' data-target='#model_contact_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa liên hệ' data-id='".$id."'><i class='fa fa-trash-o'></i></a>";
   } else {
      $str_active = "<a class='btn btn-social-icon btn-github m-t-2 m-r-1' title='Chưa Xem' data-id='".$id."'><i class='fa fa-check-square'></i></a> <a class='btn btn-social-icon btn-linkedin m-t-2 m-r-1' title='Chi tiết liên hệ' data-toggle='modal' data-target='#model_contact_detail' data-id='".$id."'><i class='fa fa-pencil-square-o'></i></a> <a class='btn btn-social-icon btn-pinterest m-t-2 m-r-1' title='Xóa liên hệ' data-id='".$id."'><i class='fa fa-trash-o'></i></a>";
   }
   $data["data"][] = array($val_result->contact_id, $val_result->contact_name, $val_result->contact_subject , date("H:i:s d-m-Y", strtotime($val_result->contact_create)), $str_active);
}
echo json_encode($data);
?>