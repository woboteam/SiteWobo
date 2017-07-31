<?php
include_once("models/m_news.php");
$m_news = new M_news();
echo count($m_news->get_all_news());
?>