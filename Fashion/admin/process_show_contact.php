<?php
if (isset($_POST["id"])){
	include_once("models/m_contact.php");
	$m_contact = new M_contact();
	$contact_id = $_POST["id"];
	$contact_hide = $m_contact->set_contact_status($contact_id, 0);
	if ($contact_hide){
		echo "success";
	}
}
?>