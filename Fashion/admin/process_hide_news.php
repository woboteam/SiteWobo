<?php
if (isset($_POST["id"])){
	include_once("models/m_news.php");
	$m_news = new M_news();
	$new_id = $_POST["id"];
	$news_hide = $m_news->set_news_status($new_id, 1);
	if ($news_hide){
		echo "success";
	}
}
?>