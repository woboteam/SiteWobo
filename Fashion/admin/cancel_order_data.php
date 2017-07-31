<?php
if (isset($_POST["id"])){
	include_once("models/m_ordercar.php");
	$m_order = new M_ordercar();
	$order_id = $_POST["id"];
	$current_order = $m_order->get_order_id($order_id);
	//echo $pro_id;
	if ($current_order){
		$delete = $m_order->delete_order($order_id);
		$delete = $m_order->delete_order_detail($order_id);
		if ($delete!=false){
			echo "success";
		} else {
			echo "valid";
		}
	}
}
?>