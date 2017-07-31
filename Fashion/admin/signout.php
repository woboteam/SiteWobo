<?php
ob_start();
session_start();
include_once("library/url_hour_mail.php");
unset($_SESSION['se-car-user-lg']);
setcookie("coo-car-user-us","",time()-3600*24*30,'/');
setcookie("coo-car-user-ps","",time()-3600*24*30,'/');
if(isset($_GET['redirect'])) {
	header('Location: '.base64_decode($_GET['redirect']));  
} else {
	header('Location: index.php');  
}
?>