<?php
if (isset($_POST["id"])){
	include_once("models/m_support.php");
	$m_support = new m_support();
	$support_id = $_POST["id"];
	$support_hide = $m_support->set_support_status($support_id, 0);
	if ($support_hide){
		echo "success";
	}
}
?>