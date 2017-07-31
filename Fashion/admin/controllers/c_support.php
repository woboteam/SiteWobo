<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
include_once("models/m_sliders.php");
include_once("models/m_support.php");
/**
* Xử lý các trang Page
*/
class C_support
{

	public function __contruct(){

    }
	public function index(){
        $m_support = new M_support();
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
	      include("views/support/v_index.php");
	    } else {
	      header("location:login.php");
	    }
	}
	public function edit_support(){
		$m_user = new M_user();
		$m_support = new m_support();
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
	        $current_support = $m_support->get_support_id($_GET["id"]);
	        if ($current_support!=false){
	          include("views/support/v_edit.php");
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
}