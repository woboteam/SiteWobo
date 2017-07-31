<?php
include_once("models/m_contact.php");
$m_contacts = new M_contact();
echo count($m_contacts->get_all_contact_not_check()) . " new";
?>