<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
include_once("models/m_brand.php");
include_once("models/m_cates.php");
/**
* 
*/
class C_brand
{
  
  public function insert_brand(){
    $m_brand = new M_brand();
    $m_user = new M_user();
    $m_cate = new M_cates();
     $list_cate_0 = $m_cate->get_cate_parent(1);
    // $list_brand = $m_brand->get_all_brand();
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
      include("views/brand/v_insert.php");
    } else {
      header("location:login.php");
    }
  }
  public function edit_brand(){
    $m_brand = new M_brand();
    $m_user = new M_user();

    // $list_brand = $m_brand->get_all_brand();
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
        $current_brand = $m_brand->get_brand_id($_GET["id"]);
        if ($current_brand!=false){
          include("views/brand/v_edit.php");
        } else {
          header("location: 404.php");
        }
      } else {
        header("location: listbrand.php");
      } 
    } else {
      header("location:login.php");
    }
  }
  public function index(){
    $m_brand = new M_brand();
    $m_user = new M_user();
    $list_brand = $m_brand->get_all_brand();
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
      include("views/brand/v_listbrand.php");
    } else {
      header("location:login.php");
    }
  }
}
?>