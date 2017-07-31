<?php
if (isset($_POST["id"])){
	include_once("models/m_sliders.php");
	$m_sliders = new M_sliders();
	$slider_id = $_POST["id"];
	$slider_hide = $m_sliders->set_news_status($slider_id, 1);
	if ($slider_hide){
		echo "success";
	}
}
?>