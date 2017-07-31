<?php
include_once("models/m_menu.php");
include_once("models/m_cate.php");
include_once("models/m_slider.php");
include_once("models/m_product.php");
include_once("models/m_infor.php");
include_once("models/m_page.php");

class C_index {
	public function displayIndex(){
		$m_menu=new M_menu();
		$m_cate=new M_cate();
		$m_slider = new M_slider();
		$m_product = new M_product();
		$m_page = new M_pages();

		$getAllMenu=$m_menu->get_all_menu();
		$cate_cap_0=$m_cate->get_cate_parent(0);
		$list_slider = $m_slider->get_all_slider();

		$list_pro_random = $m_product->get_random(0,8,-1);

		include_once("views/vf_index/v_index.php");
		}
}
?>