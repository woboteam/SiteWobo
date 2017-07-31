<?php
include_once("models/m_brand.php");
$m_brand = new M_brand();
echo count($m_brand->get_all_brand());
?>