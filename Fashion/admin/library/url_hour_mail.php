<?php
function curPageURL() {
	$pageURL = 'http';
	// if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	   $pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
	   $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
	   $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}
function time_elapsed_string_vn($ptime){
  $time = time_elapsed_string($ptime);
  $time = str_replace("ago","trước",$time);
  $time = str_replace("years","năm",$time);
  $time = str_replace("months","tháng",$time);
  $time = str_replace("days","ngày",$time);
  $time = str_replace("hours","giờ",$time);
  $time = str_replace("minutes","phút",$time);
  $time = str_replace("seconds","giây",$time);
  $time = str_replace("year","năm",$time);
  $time = str_replace("month","tháng",$time);
  $time = str_replace("day","ngày",$time);
  $time = str_replace("hour","giờ",$time);
  $time = str_replace("minute","phút",$time);
  $time = str_replace("second","giây",$time);
  return $time;
}
function send_email_text_reset_pass($email, $user_name, $text_reset_pass){
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  require '../lib/PHPMailer/PHPMailerAutoload.php';
  ini_set('default_charset', 'UTF-8');
  $mail = new PHPMailer();
  //Khai báo gửi mail bằng SMTP
  $mail->IsSMTP();
  // UTF-8
  $mail->CharSet = 'utf-8';
  //Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
  // 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
  // 1 = Thông báo lỗi ở client
  // 2 = Thông báo lỗi cả client và lỗi ở server
  $mail->SMTPDebug  = 0;
   
  $mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
  $mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
  $mail->Port       = 587; // cổng để gửi mail
  $mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
  $mail->SMTPAuth   = true; //Xác thực SMTP
  $mail->Username   = "tutsinc.com@gmail.com"; // Tên đăng nhập tài khoản Gmail
  $mail->Password   = "Abcd1234@@"; //Mật khẩu của gmail
  $mail->SetFrom("support@tutsinc.com", "Tutsinc.com"); // Thông tin người gửi
  $mail->AddReplyTo("support@tutsinc.com","Test Reply");// Ấn định email sẽ nhận khi người dùng reply lại.
  $mail->AddAddress($email, "John Doe");//Email của người nhận
  
  $mail->Subject = "Reset Password Tutsinc.com"; //Tiêu đề của thư
  $data_body = "<p>Dear " . $user_name . ",</p><p>Bạn đã quên mật khẩu tại trang tutsinc.com. Nhấp vào liên kết dưới đây, bạn sẽ được nhận được mật khẩu mới.</p><p>http://tutsinc.com/default/reset_password.php?key=" . $text_reset_pass . "&id=". $user_name."</p><p>Hoặc bạn có thể dán link lên thanh địa chỉ của trình duyệt</p><p>Nếu không phải là bạn, hãy bỏ qua thông báo này. Liên kết này sẽ bị hủy sau 24 giờ.</p><p>Team TutsInc, trân trọng cảm ơn.<p>";
  //$mail->Body = $data_body; //Nội dung của bức thư.
   // Mở định dạng HTML
  // $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
  // Gửi thư với tập tin html
  $mail->MsgHTML($data_body);
  $mail->AltBody = "Mật khẩu nhắc nhở truy cập trang Tutsinc.com";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
  // $mail->AddAttachment("files/fileattachment.txt");//Tập tin cần attach
  //Tiến hành gửi email và kiểm tra lỗi
  //$mail->isHTML(true);
  if(!$mail->Send()) {
    echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
  } else {
    echo "success";
  }
}
function send_email_reset_pass($email, $password){
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  require '../lib/PHPMailer/PHPMailerAutoload.php';
  ini_set('default_charset', 'UTF-8');
  $mail = new PHPMailer();
  //Khai báo gửi mail bằng SMTP
  $mail->IsSMTP();
  // UTF-8
  $mail->CharSet = 'utf-8';
  //Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
  // 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
  // 1 = Thông báo lỗi ở client
  // 2 = Thông báo lỗi cả client và lỗi ở server
  $mail->SMTPDebug  = 0;
   
  $mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
  $mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
  $mail->Port       = 587; // cổng để gửi mail
  $mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
  $mail->SMTPAuth   = true; //Xác thực SMTP
  $mail->Username   = "tutsinc.com@gmail.com"; // Tên đăng nhập tài khoản Gmail
  $mail->Password   = "Abcd1234@@"; //Mật khẩu của gmail
  $mail->SetFrom("support@tutsinc.com", "Tutsinc.com"); // Thông tin người gửi
  $mail->AddReplyTo("support@tutsinc.com","Test Reply");// Ấn định email sẽ nhận khi người dùng reply lại.
  $mail->AddAddress($email, "John Doe");//Email của người nhận
  $mail->Subject = "Reset Password Tutsinc.com"; //Tiêu đề của thư
  $data_body = "Mật khẩu mới của bạn là: " . $password;
  // $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
  $mail->MsgHTML($data_body);
  $mail->AltBody = "Mật khẩu nhắc nhở truy cập trang Tutsinc.com";
  if(!$mail->Send()) {
    echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
  } else {
    return true;
  }
  return false;
}
?>