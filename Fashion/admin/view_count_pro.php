<?php
include_once("models/m_products.php");
$m_products = new M_product();
echo count($m_products->get_all_product());
?>