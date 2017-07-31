<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
/**
* Xử lý các trang info
*/
class C_user
{
	public function edit(){
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
	      // print_r($m_current_user);
	      include("views/user/v_index.php");
	    } else {
	      header("location:login.php");
	    }
	}
}
?>