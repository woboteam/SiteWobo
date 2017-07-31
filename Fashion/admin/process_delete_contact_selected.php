<?php
if (isset($_POST["id"])){
	$arr_contact_id = $_POST["id"];
	$str_contact_id = implode(",",$_POST["id"]);// Trả về chuổi các pro_id
	include_once("models/m_contact.php");
	$m_contact = new M_contact();
	foreach ($arr_contact_id as $contact_id) {
		$contact_current = $m_contact->get_contact_id($contact_id);
		if ($contact_current){
			$delete_contact = $m_contact->delete_contact($contact_id);
		}
	}
	$list_contact = $m_contact->get_contact_array_id($str_contact_id);
	if (count($list_contact)==0){
		echo "success";
	}
}
?>