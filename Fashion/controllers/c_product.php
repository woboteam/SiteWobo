<?php
include_once("models/m_menu.php");
include_once("models/m_cate.php");
include_once("models/m_slider.php");
include_once("models/m_product.php");
include_once("models/m_infor.php");
include_once("models/m_page.php");
include_once("c_pager.php");


class C_product {
	
    public function __contruct(){
    }
    public function index(){
        $m_cate = new M_cate();
        $m_menu = new M_menu();
        $m_slider = new M_slider();
        $m_product = new M_product();
        $m_page = new M_pages();
        $pager = new pager();

        $getAllMenu=$m_menu->get_all_menu();
		$cate_cap_0=$m_cate->get_cate_parent(0);
        $menu_cap_0 = $m_cate->get_cate_parent(0);
        $menu_footer_0 = $m_menu->get_menu_parent(0);
        $list_slider = $m_slider->get_all_slider();
        $list_pro_random = $m_product->get_random(0,8,-1);
        // $list_support = $m_support->get_all_support();
        
        if (isset($_GET["cate_slug"])){
            $cate_slug = $_GET["cate_slug"];
            // echo $cate_slug;
            $cate_info = $m_cate->get_cate_slug($cate_slug);
            // print_r($cate_info) ;
            if ($cate_info!=false){
                $cate_id = $cate_info->cate_id; // Lấy cate_id ngoài cùng
                $cate_name = $cate_info->cate_name;
                $cate_slug = $cate_info->cate_slug;

                $cate_view = $m_cate->get_cate_parent($cate_id); // Lấy danh sách cate_id con bên trong
                $array_cate = array();
                foreach ($cate_view as $val_cate) {
                    array_push($array_cate, $val_cate->cate_id);
                }
                $list_cate_id = implode(",", $array_cate);

                $list_product = $m_product->get_all_product_by_list_cate_id(0,6,$list_cate_id); 
				 // echo "<pre>";
     //            print_r($list_product) ;
     //            echo "</pre>";
                // $list_pro_view = $m_product->get_all_product_by_list_cate_id_order_date(0,12,$list_cate_id);
            } else {
                $cursor = "location:".$pathweb."notfound.php";
                header($cursor);
            }
        } else {
            $cursor = "location:".$pathweb."notfound.php";
            header($cursor);
        }

        include_once("views/vf_product/v_index.php");
    }
     public function product_cate_cap1(){
        $m_cate = new M_cate();
        $m_menu = new M_menu();
        $m_slider = new M_slider();
        $m_product = new M_product();
        // $m_brand = new M_brand();
        // $m_kind = new M_kind();
        // $m_province = new M_province();
        // $m_support = new M_support();
        $m_page = new M_pages();
        $pager = new pager();

        $getAllMenu=$m_menu->get_all_menu();
        $cate_cap_0=$m_cate->get_cate_parent(0);
        $menu_cap_0 = $m_cate->get_cate_parent(0);
        $menu_footer_0 = $m_menu->get_menu_parent(0);
        $list_slider = $m_slider->get_all_slider();
        // $list_support = $m_support->get_all_support();
        $list_pro_random = $m_product->get_random(0,8,-1);
        
        if (isset($_GET["cate_slug"])){
            $cate_slug = $_GET["cate_slug"];
            // echo $cate_slug;
            $cate_info = $m_cate->get_cate_slug($cate_slug);             
            if ($cate_info!=false){
                //$cate_id = $cate_info->cate_id; // Lấy cate_id ngoài cùng
               // print_r($cate_id) ;
                $cate_name = $cate_info->cate_name;
                $cate_slug = $cate_info->cate_slug;

                // $cate_view = $m_cate->get_cate_parent($cate_id); // Lấy danh sách cate_id con bên trong
                 // $array_cate = array();
                 // foreach ($cate_info as $val_cate) {
                 //    array_push($array_cate, $val_cate->cate_id);
                 // }
                 // $list_cate_id = implode(",", $array_cate);
                
                $list_product = $m_product->get_all_product(0,6,$cate_info->cate_id); 
                 // echo "<pre>";
                // print_r($list_product) ;
     //            echo "</pre>";
                // $list_pro_view = $m_product->get_all_product_by_list_cate_id_order_date(0,12,$list_cate_id);
            } else {
                $cursor = "location:".$pathweb."notfound.php";
                header($cursor);
            }
        } else {
            $cursor = "location:".$pathweb."notfound.php";
            header($cursor);
        }

        include_once("views/vf_product_cate_cap1/v_index.php");
    }
    public function detail(){
        $m_cate = new M_cate();
        $m_menu = new M_menu();
        $m_slider = new M_slider();
        $m_product = new M_product();

        $m_page = new M_pages();

        $getAllMenu=$m_menu->get_all_menu();
        $cate_cap_0=$m_cate->get_cate_parent(0);
    
        // $m_photo = new M_photo();

        $menu_cap_0 = $m_cate->get_cate_parent(0);
        $list_pro_random = $m_product->get_random(0,8,-1);
        // $menu_footer_0 = $m_menu->get_menu_parent(0);
        
        if (isset($_GET["pro_slug"],$_GET["pro_id"])){
            $pro_id = $_GET["pro_id"];
            $pro_current = $m_product->get_product_by_id($pro_id);
            $cate_id = $pro_current->cate_id;
            if ($pro_current!=false){
                $cate_info = $m_cate->get_cate_id($cate_id);
                $update_view = $m_product->addview($pro_id);
                // $photo_current = $m_photo->get_photo_by_photo_id($pro_current->photo_id);
                $list_product_rand = $m_product->get_random(0,4,$cate_id);

                // thông tin share fb
                $ogTitle = "Vivu thuê xe";
                $ogUrl = $pro_current->pro_slug . '-'.$pro_current->pro_id;
                $ogDescription = $pro_current->pro_desc;
                $ogImage = 'public/products/'.$pro_current->pro_img;

                if ($cate_info!=false){
                    $cate_name = $cate_info->cate_name;
                    $list_cate = $m_cate->get_cate_parent($cate_id); // Lấy danh sách cate_id con bên trong
                    
                    if($list_cate!=false){
                        $array_cate = array();
                        foreach ($list_cate as $val_cate) {
                            array_push($array_cate, $val_cate->cate_id);
                        }
                        $cate_view = $m_cate->get_cate_parent($cate_id);
                        $cate_tree = $m_cate->get_cate_parent_not_cate_id(0,$cate_id);

                        $list_cate_id = implode(",", $array_cate);
                        $list_product = $m_product->get_all_product_by_list_cate_id(-1,-1,$list_cate_id);
                    } else {
                        $cate_view = false;
                        $cate_tree = $m_cate->get_cate_parent(0);
                        $list_product = $m_product->get_all_product(-1,-1,$cate_id);
                    }

                    $list_relation = $m_product->get_random(0, 5, $cate_id);
                } else {
                    $cursor = "location:".$pathweb."notfound.php";
                    header($cursor);    
                }
            } else {
                $cursor = "location:".$pathweb."notfound.php";
                header($cursor);
            }
        } else {
            $cursor = "location:".$pathweb."notfound.php";
            header($cursor);
        }

        include_once('views/vf_detail_product/v_index.php');
    }
}
?>