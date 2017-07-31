<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
include_once("models/m_kind.php");
include_once("models/m_brand.php");

/**
* 
*/
class C_kind
{
  
  public function insert_kind(){
    $m_kind = new M_kind();
    $m_user = new M_user();
    $m_brand = new M_brand();
    $list_brand = $m_brand->get_all_brand();
    // $list_kind = $m_kind->get_all_kind();
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
      include("views/kind/v_addkind.php");
    } else {
      header("location:login.php");
    }
  }
  public function edit_kind(){
    $m_kind = new M_kind();
    $m_user = new M_user();
    $m_brand = new M_brand();
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
      if (isset($_GET["id"])){
        $kind_current = $m_kind->get_kind_id($_GET["id"]);
        if ($kind_current!=false){
          include("views/kind/v_editkind.php");
        } else {
          header("location: 404.php");
        }
      } else {
        header("location: listkind.php");
      } 
    } else {
      header("location:login.php");
    }
  }
  public function index(){
    $m_kind = new M_kind();
    $m_user = new M_user();
    $m_brand = new M_brand();

    $list_brand = $m_brand->get_all_brand();
    // print_r($list_brand);
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
      include("views/kind/v_listkind.php");
    } else {
      header("location:login.php");
    }
  }
}
?>