<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
include_once("models/m_sliders.php");
include_once("models/m_pages.php");
/**
* Xử lý các trang Page
*/
class C_page
{
	public function page_404(){
		// $m_products = slider M_product();
	    $m_user = new M_user();
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
	      include_once("views/pages/404.php");
	    } else {
	      header("location:login.php");
	    }
	}
	public function list_pages(){
		$m_pages = new M_pages();
	    $m_user = new M_user();
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
	      include("views/pages/v_index.php");
	    } else {
	      header("location:login.php");
	    }
	}
	public function insert_pages(){
	    $m_user = new M_user();
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
	      include("views/pages/v_insert.php");
	    } else {
	      header("location:login.php");
	    }
	}
	public function edit_pages(){
		$m_user = new M_user();
		$m_pages = new M_pages();
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
	        $current_pages = $m_pages->get_page_id($_GET["id"]);
	        if ($current_pages!=false){
	          include("views/pages/v_edit.php");
	        } else {
	          header("location: 404.php");
	        }
	      } else {
	        header("location: about.php");
	      }
	    } else {
	      header("location:login.php");
	    }
	}
	public function slider(){
		$m_sliders = new M_sliders();
	    $m_user = new M_user();
	    // $list_sliders = $m_sliders->get_all_sliders();
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
	      include("views/sliders/v_index.php");
	    } else {
	      header("location:login.php");
	    }
	}
	public function insert_slider(){
	    $m_user = new M_user();
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
	      include("views/sliders/v_insert.php");
	    } else {
	      header("location:login.php");
	    }
	}
	public function edit_slider(){
		$m_slider = new M_sliders();
	    $m_user = new M_user();

	    // $list_news = $m_slider->get_all_news();
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
	        $current_slider = $m_slider->get_slider_id($_GET["id"]);
	        if ($current_slider!=false){
	          include("views/sliders/v_edit.php");
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
}
?>