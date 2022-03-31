<?php
$name     = $_POST['name'];
$to       = $_POST['email'];
$msg      = $_POST['msg'];
$subject  = 'Catalina Guerrero - Portfolio Contact Form';

$mail   = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Catalina Guerrero Portfolio Emails</title>
</head>
<body bgcolor="#fff">
<table style="background-color: #d4f5ff;">
<tr>
<td></td>
<td style="background-color: transparent;">
<!-- HEADER -->
<table style="width: 800px; text-align:center">
<tr>
<td>Catalina Guerrero - Portfolio</td>
<td><h3 style="color: #000; font-family: sans-serif; margin-left:10%">Thank you for contacting us!</h3></td>
</tr>
</table>
</td>
<td></td>
</tr>
</table>
<!-- /HEADER -->
<!-- BODY -->
<table>
<tr>
<td bgcolor="#fff">
<table style="width: 800px;">
<tr><td>
<h4 style="font-family: sans-serif; display: inline; margin-right:20px">You have sent us the following information: </h4>
</td></tr><tr><td>
<p style="font-family: sans-serif; display: inline; margin-right:20px"><strong>Nombre:</strong> ' . $name. '</p>
</td></tr><tr><td>
<p style="font-family: sans-serif; display: inline; margin-right:20px"><strong>Email:</strong> ' . $to . '</p>
</td></tr><tr><td>
<p style="font-family: sans-serif; display: inline; margin-right:20px"><strong>Your inquiry:</strong> ' . $msg. '</p>
</td></tr>
</table>
</td>
<td></td>
</tr>
</table>
<!-- /BODY -->
</body>
</html>';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Catalina Guerrero <info@catalinaguerrero.com' . "\r\n";
$headers .= 'Bcc: catalinango@gmail.com' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $mail, $headers)) {
  echo "{error:false, msg:'Your message has been sent.'}";
} else {
  echo "{error:true, msg:'Something went wrong, please try again.'}";
}
