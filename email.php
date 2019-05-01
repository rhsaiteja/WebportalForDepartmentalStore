<?php
session_start();
require'PHPMailer-5.2.25/PHPMailerAutoload.php'; 
$x=rand(100000,999999);
$_SESSION["otp"]=md5($x);
$mail=new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host ='smtp.gmail.com';
$mail->Port = '587';
$mail->isHTML(true);
$mail->Username = 'csemail105.105@gmail.com';
$mail->Password = 'csemail105';
$mail->SetFrom('okkart.com');
$mail->Subject = 'activate account/verify email address';
$mail->Body = "click on link to activate accoount http://localhost:8080/JavaBridgeTemplate621/PhpProject2/activation.php?uname=".$_SESSION['email']."&otp=".$_SESSION['otp'];
if(isset($_GET['loggedin']))
{
    $mail->Body = "click on link to activate accoount http://localhost:8080/JavaBridgeTemplate621/PhpProject2/activation.php?uname=".$_SESSION['email']."&otp=".$_SESSION['otp']."&loggedin=1";
}
$mail->AddAddress($_SESSION['email']);
if(!$mail->Send()) {
     echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "click on the link sent to your email address to activate your account<br/>";
    if(!isset($_GET['loggedin']))
    echo "<a href='login.html'>skip to login</a>";
}
?>