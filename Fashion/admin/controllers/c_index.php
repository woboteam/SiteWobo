<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
include_once("models/m_products.php");
include_once("models/m_news.php");
/**
* 
*/
class C_index
{
	
	function __construct()
	{
		# code...
	}
	public function index(){
		$m_products = new M_product();
	    $m_news = new M_news();
	    $m_user = new M_user();

	    // $list_product = $m_products->get_all_product();
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
	      include("views/index/v_index.php");
	    } else {
	      header("location:login.php");
	    }
	}
}
?>