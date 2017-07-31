<?php
if (isset($_POST["id"])){
	include_once("models/m_contact.php");
	$m_contact = new M_contact();
	$contact_id = $_POST["id"];
	$current_contact = $m_contact->get_contact_id($contact_id);
	//echo $pro_id;
	if ($current_contact){
		$delete_contact = $m_contact->delete_contact($contact_id);
		if ($delete_contact){
			echo "success";
		}
	}
}
?>