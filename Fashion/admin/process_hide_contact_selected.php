<?php
include_once("models/m_contact.php");
if (isset($_POST["id"])){
	$str_contact_id = implode(',',$_POST["id"]);
	$m_contact = new M_contact();
	$contact_list_hide = $m_contact->set_contact_array_status_hide($str_contact_id, 1);
	if ($contact_list_hide){
		echo "success";
	}
}
?>