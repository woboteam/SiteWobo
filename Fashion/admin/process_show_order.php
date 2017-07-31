<?php
if (isset($_POST["id"])){
	include_once("models/m_ordercar.php");
	$m_order = new M_ordercar();
	$order_id = $_POST["id"];
	$order_hide = $m_order->set_order_status($order_id, 0);
	if ($order_hide){
		echo "success";
	}
}
?>