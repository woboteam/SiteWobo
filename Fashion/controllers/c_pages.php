<?php
// include_once("models/m_user.php");
include_once("models/m_cate.php");
include_once("models/m_slider.php");
include_once("models/m_product.php");
include_once("models/m_menu.php");
include_once("models/m_infor.php");
include_once("models/m_page.php");
class C_pages{

    public function __contruct(){

    }
    public function lienhe(){
    	$m_cate = new M_cate();
        $m_menu = new M_menu();
        $m_slider = new M_slider();
        $m_product = new M_product();
        $m_page = new M_pages();

        $menu_cap_0 = $m_cate->get_cate_parent(0);
        $menu_footer_0 = $m_menu->get_menu_parent(0);
        
        $getAllMenu=$m_menu->get_all_menu();
        $cate_cap_0=$m_cate->get_cate_parent(0);

        $list_pro_random = $m_product->get_random(0,8,-1);
        include_once('views/vf_lienhe/v_index.php');
    }
    public function gioithieu(){
        $m_cate = new M_cate();
        $m_menu = new M_menu();
        $m_slider = new M_slider();
        $m_product = new M_product();

        $menu_cap_0 = $m_cate->get_cate_parent(0);
        $menu_footer_0 = $m_menu->get_menu_parent(0);
        $getAllMenu=$m_menu->get_all_menu();
        $cate_cap_0=$m_cate->get_cate_parent(0);
        $m_page = new M_pages();
        $list_pro_random = $m_product->get_random(0,8,-1);
        include_once('views/vf_gioithieu/v_index.php');
    }
    public function detail(){
    	include_once('views/vf_lienhe/v_index.php');
    }
    public function quitrinhthuexe(){
        $m_cate = new M_cate();
        $m_menu = new M_menu();
        $m_slider = new M_slider();
        $m_product = new M_product();
        $m_page = new M_pages();
        $menu_cap_0 = $m_cate->get_cate_parent(0);
        $menu_footer_0 = $m_menu->get_menu_parent(0);
        
        include_once('views/vf_quitrinh/v_index.php');
    }
    public function hinhthucthanhtoan(){
        $m_cate = new M_cate();
        $m_menu = new M_menu();
        $m_slider = new M_slider();
        $m_product = new M_product();
        $m_page = new M_pages();
        $menu_cap_0 = $m_cate->get_cate_parent(0);
        $menu_footer_0 = $m_menu->get_menu_parent(0);
        
        include_once('views/vf_hinhthucthanhtoan/v_index.php');
    }
}
