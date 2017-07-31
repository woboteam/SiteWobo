<?php
include_once("models/m_timer.php");
if (isset($_POST["id"])){
	$str_timer_id = implode(',',$_POST["id"]);
	$m_timer = new M_timer();
	$timer_list_hide = $m_timer->set_timer_array_status_hide($str_timer_id, 0);
	if ($timer_list_hide){
		echo "success";
	}
}
?>