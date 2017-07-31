<?php
include_once("models/m_news.php");
if (isset($_POST["id"])){
	$str_new_id = implode(',',$_POST["id"]);
	$m_news = new M_news();
	$news_list_hide = $m_news->set_news_array_status_hide($str_new_id, 1);
	if ($news_list_hide){
		echo "success";
	}
}
?>