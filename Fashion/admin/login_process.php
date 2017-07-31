<?php
ob_start();
session_start();
if(isset($_POST["user_name"])){
	$user_name = $_POST["user_name"];
	$password = MD5($_POST["password"]);
	$login_remember = $_POST["login_remember"];
	include_once("models/m_users.php");
	$m_user = new M_user();
	$check_login = $m_user->login_admin($user_name, $password);
	//echo $login_remember;
	if ($check_login){
		if ($login_remember==="true"){
			setcookie('coo-car-user-us',$user_name,time()+3600*24*30,'/');
			setcookie('coo-car-user-ps',$password,time()+3600*24*30,'/');
		}
		$_SESSION['se-car-user-lg'] = $check_login;
		echo "success";
	}
}
?>