<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
include_once("models/m_products.php");
include_once("models/m_categories.php");
include_once("models/m_brand.php");
include_once("models/m_kind.php");
include_once("models/m_ordercar.php");
include_once("models/m_orderdetail.php");
/**
* Sản phẩm (products): pro_id, pro_name, pro_slug, pro_desc, pro_detail, pro_spec, pro_price, pro_img, photo_id, cate_id, pro_create, pro_modify, pro_status
*/
class C_order
{
  
  public function insert_product(){
    $m_products = new M_product();
    $m_user = new M_user();
    $m_cate = new M_cates();
    $m_brand = new M_brand();
    $m_kind = new M_kind();
    $m_color = new M_color();

    $list_cate_0 = $m_cate->get_cate_parent(0);
    $list_brand = $m_brand->get_all_brand();
    $list_color = $m_color->get_all_color();

    if (isset($_SESSION['se-car-user-lg']) || isset($_COOKIE["coo-car-user-us"])){ 
      if (isset($_COOKIE["coo-car-user-us"])){
        $m_current_user = $m_user->login_admin($_COOKIE["coo-car-user-us"],$_COOKIE["coo-car-user-ps"]);
        if ($m_current_user){
          $_SESSION['se-car-user-lg'] = $m_current_user;
        } else {
          header("location: signout.php");
        }
      } else if (isset($_SESSION['se-car-user-lg'])) {
        $m_current_user = $_SESSION['se-car-user-lg'];
      }
      include("views/products/v_insert.php");
    } else {
      header("location:login.php");
    }
  }
  public function edit_product(){
    $m_products = new M_product();
    $m_user = new M_user();
    $m_photos = new M_photo();
    $m_cate = new M_cates();
    $m_brand = new M_brand();
    $m_kind = new M_kind();
    $m_color = new M_color();

    $list_cate_0 = $m_cate->get_cate_parent(0);
    $list_brand = $m_brand->get_all_brand();
    $list_color = $m_color->get_all_color();

    // $list_product = $m_products->get_all_product();
    if (isset($_SESSION['se-car-user-lg']) || isset($_COOKIE["coo-car-user-us"])){ 
      if (isset($_COOKIE["coo-car-user-us"])){
        $m_current_user = $m_user->login_admin($_COOKIE["coo-car-user-us"],$_COOKIE["coo-car-user-ps"]);
        if ($m_current_user){
          $_SESSION['se-car-user-lg'] = $m_current_user;
        } else {
          header("location: signout.php");
        }
      } else if (isset($_SESSION['se-car-user-lg'])) {
        $m_current_user = $_SESSION['se-car-user-lg'];
      }
      if (isset($_GET["id"])){
        $current_product = $m_products->get_pro_id($_GET["id"]);
        $brand_id = $m_kind->get_kind_id($current_product->pro_kind)->brand_id;
        $list_kind = $m_kind->get_kind_by_brand($brand_id);
        if ($current_product!=false){
          $list_photo = $m_photos->list_photo($current_product->photo_id);
          include("views/products/v_edit.php");
        } else {
          header("location: 404.php");
        }
      } else {
        header("location: listproduct.php");
      } 
    } else {
      header("location:login.php");
    }
  }
  public function index(){
    $m_ordercar = new M_ordercar();
    $m_user = new M_user();
    $list_ordercar = $m_ordercar->get_all_order();
    if (isset($_SESSION['se-car-user-lg']) || isset($_COOKIE["coo-car-user-us"])){ 
      if (isset($_COOKIE["coo-car-user-us"])){
        $m_current_user = $m_user->login_admin($_COOKIE["coo-car-user-us"],$_COOKIE["coo-car-user-ps"]);
        if ($m_current_user){
          $_SESSION['se-car-user-lg'] = $m_current_user;
        } else {
          header("location: signout.php");
        }
      } else if (isset($_SESSION['se-car-user-lg'])) {
        $m_current_user = $_SESSION['se-car-user-lg'];
      }
      include("views/order/v_listorder.php");
    } else {
      header("location:login.php");
    }
  }
}
?>