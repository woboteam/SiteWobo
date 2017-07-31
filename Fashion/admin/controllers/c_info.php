<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
include_once("models/m_info.php");
/**
* Xử lý các trang info
*/
class C_info
{
	
	public function list_info(){
		$m_info = new M_info();
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
	      include("views/info/v_index.php");
	    } else {
	      header("location:login.php");
	    }
	}

	public function insert_info(){
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
	      include("views/info/v_insert.php");
	    } else {
	      header("location:login.php");
	    }
	}
	public function edit_info(){
		$m_user = new M_user();
		$m_info = new M_info();
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
	        $current_info = $m_info->get_info_id($_GET["id"]);
	        if ($current_info!=false){
	          include("views/info/v_edit.php");
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
	public function logo(){
		$m_user = new M_user();
		$m_info = new M_info();
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
	     
	        $current_info = $m_info->get_info_id(6);
	        include("views/info/v_logo.php");
	    } else {
	      header("location:login.php");
	    }
	}
}
?>