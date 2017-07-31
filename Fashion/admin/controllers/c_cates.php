<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
include_once("models/m_cates.php");
/**
* Sản phẩm (news): pro_id, pro_name, pro_slug, pro_desc, pro_detail, pro_spec, pro_price, pro_img, photo_id, cate_id, pro_create, pro_modify, pro_status
*/
class C_cates
{
  
  public function insert_cates(){
    $m_cates = new M_cates();
    $m_user = new M_user();
    // $list_news = $m_news->get_all_news();
    if (isset($_SESSION['se-car-user-lg']) || isset($_COOKIE["coo-car-user-us"])){ 
      if (isset($_COOKIE["coo-car-user-us"])){
        $m_current_user = $m_user->login_admin($_COOKIE["coo-car-user-us"],$_COOKIE["coo-ford-user-ps"]);
        if ($m_current_user){
          $_SESSION['se-car-user-lg'] = $m_current_user;
        } else {
          header("location: signout.php");
        }
      } else if (isset($_SESSION['se-car-user-lg'])) {
        $m_current_user = $_SESSION['se-car-user-lg'];
      }
      $list_cate_parent = $m_cates->get_cate_parent(0);
      include("views/cates/v_insert.php");
    } else {
      header("location:login.php");
    }
  }
  public function edit_cates(){
    $m_cates = new M_cates();
    $m_user = new M_user();

    // $list_news = $m_news->get_all_news();
    if (isset($_SESSION['se-car-user-lg']) || isset($_COOKIE["coo-car-user-us"])){ 
      if (isset($_COOKIE["coo-car-user-us"])){
        $m_current_user = $m_user->login_admin($_COOKIE["coo-car-user-us"],$_COOKIE["coo-ford-user-ps"]);
        if ($m_current_user){
          $_SESSION['se-car-user-lg'] = $m_current_user;
        } else {
          header("location: signout.php");
        }
      } else if (isset($_SESSION['se-car-user-lg'])) {
        $m_current_user = $_SESSION['se-car-user-lg'];
      }
      if (isset($_GET["id"])){
        $list_cate_parent = $m_cates->get_cate_parent(0);
        $cate_current = $m_cates->get_cate_id($_GET["id"]);
        if ($cate_current!=false){
          include("views/cates/v_edit.php");
        } else {
          header("location: 404.php");
        }
      } else {
        header("location: listcates.php");
      } 
    } else {
      header("location:login.php");
    }
  }
  public function index(){
    $m_cates = new M_cates();
    $m_user = new M_user();
    $list_cates_1 = $m_cates->get_cate_parent(0);
    if (isset($_SESSION['se-car-user-lg']) || isset($_COOKIE["coo-car-user-us"])){ 
      if (isset($_COOKIE["coo-car-user-us"])){
        $m_current_user = $m_user->login_admin($_COOKIE["coo-car-user-us"],$_COOKIE["coo-ford-user-ps"]);
        if ($m_current_user){
          $_SESSION['se-car-user-lg'] = $m_current_user;
        } else {
          header("location: signout.php");
        }
      } else if (isset($_SESSION['se-car-user-lg'])) {
        $m_current_user = $_SESSION['se-car-user-lg'];
      }
      include("views/cates/v_index.php");
    } else {
      header("location:login.php");
    }
  }
}
?>