<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
include_once("models/m_menus.php");
/**
* Sản phẩm (news): pro_id, pro_name, pro_slug, pro_desc, pro_detail, pro_spec, pro_price, pro_img, photo_id, menu_id, pro_create, pro_modify, pro_status
*/
class C_menu
{
  
  public function insert_menus(){
    $m_menu = new M_menu();
    $m_user = new M_user();
    // $list_news = $m_news->get_all_news();
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
      $list_menu_parent = $m_menu->get_menu_parent(0);
      include("views/menus/v_insert.php");
    } else {
      header("location:login.php");
    }
  }
  public function edit_menus(){
    $m_menu = new M_menu();
    $m_user = new M_user();

    // $list_news = $m_news->get_all_news();
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
        $list_menu_parent = $m_menu->get_menu_parent(0);
        $menu_current = $m_menu->get_menu_id($_GET["id"]);
        if ($menu_current!=false){
          include("views/menus/v_edit.php");
        } else {
          header("location: 404.php");
        }
      } else {
        header("location: listmenus.php");
      } 
    } else {
      header("location:login.php");
    }
  }
  public function index(){
    $m_menu = new M_menu();
    $m_user = new M_user();
    $list_menus_1 = $m_menu->get_menu_parent(0);
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
      include("views/menus/v_index.php");
    } else {
      header("location:login.php");
    }
  }
}
?>