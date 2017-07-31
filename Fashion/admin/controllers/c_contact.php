<?php
ob_start();
session_start();
include_once("models/m_users.php");
include_once("library/url_hour_mail.php");
include_once("models/m_contact.php");
include_once("models/m_cates.php");
/**
* Sản phẩm (news): pro_id, pro_name, pro_slug, pro_desc, pro_detail, pro_spec, pro_price, pro_img, photo_id, cate_id, pro_create, pro_modify, pro_status
*/
class C_contact
{
	public function index(){
	    $m_user = new M_user();
	    if (isset($_SESSION['se-ford-user-lg']) || isset($_COOKIE["coo-ford-user-us"])){ 
			if (isset($_COOKIE["coo-ford-user-us"])){
				$m_current_user = $m_user->login_admin($_COOKIE["coo-ford-user-us"],$_COOKIE["coo-ford-user-ps"]);
				if ($m_current_user){
				  $_SESSION['se-ford-user-lg'] = $m_current_user;
				} else {
				  header("location: signout.php");
				}
			} else if (isset($_SESSION['se-ford-user-lg'])) {
				$m_current_user = $_SESSION['se-ford-user-lg'];
			}
			include("views/contact/v_list_contact.php");
	    } else {
	      header("location:login.php");
	    }
	}
}