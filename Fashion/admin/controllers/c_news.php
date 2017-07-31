<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
include_once("models/m_news.php");
include_once("models/m_cates.php");
/**
* Sản phẩm (news): pro_id, pro_name, pro_slug, pro_desc, pro_detail, pro_spec, pro_price, pro_img, photo_id, cate_id, pro_create, pro_modify, pro_status
*/
class C_news
{
  
  public function insert_news(){
    $m_news = new M_news();
    $m_user = new M_user();
    $m_cate = new M_cates();
     $list_cate_0 = $m_cate->get_cate_parent(1);
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
      include("views/news/v_insert.php");
    } else {
      header("location:login.php");
    }
  }
  public function edit_news(){
    $m_news = new M_news();
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
        $current_news = $m_news->get_new_id($_GET["id"]);
        if ($current_news!=false){
          include("views/news/v_edit.php");
        } else {
          header("location: 404.php");
        }
      } else {
        header("location: listnews.php");
      } 
    } else {
      header("location:login.php");
    }
  }
  public function index(){
    $m_news = new M_news();
    $m_user = new M_user();
    $list_news = $m_news->get_all_news();
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
      include("views/news/v_list_news.php");
    } else {
      header("location:login.php");
    }
  }
}
?>