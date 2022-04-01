<?php
header("Content-type: text/plain; charset=UTF-8");
$name     = $_POST['name'];
$to       = $_POST['email'];
$msg      = $_POST['comments'];
$subject  = 'Automatic response from Catalina Guerrero Portfolio';

$mail   = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
$mail  .= '<html xmlns="http://www.w3.org/1999/xhtml">';
$mail  .= '<meta name="viewport" content="width=device-width" />';
$mail  .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
$mail  .= '<title>Catalina Guerrero Emails</title>';
$mail  .= '</head>';
$mail  .= '<body bgcolor="#fff">';
$mail  .= '<table style="background-color: #61FAAD;">';
$mail  .= '<tr>';
$mail  .= '<td></td>';
$mail  .= '<td style="background-color: transparent;">';
$mail  .= '<!-- HEADER -->';
$mail  .= '<table style="width: 800px; text-align:center">';
$mail  .= '<tr>';
$mail  .= '<td><h3 style="color: #505393; font-family: sans-serif; margin-left:30%">Thank you for contacting me!</h3></td>';
$mail  .= '</tr>';
$mail  .= '</table>';
$mail  .= '</td>';
$mail  .= '<td></td>';
$mail  .= '</tr>';
$mail  .= '</table>';
$mail  .= '<!-- /HEADER -->';
$mail  .= '<!-- BODY -->';
$mail  .= '<table>';
$mail  .= '<tr>';
$mail  .= '<td bgcolor="#fff">';
$mail  .= '<table style="width: 800px;">';
$mail  .= '<tr><td>';
$mail  .= '<h4 style="font-family: sans-serif; display: inline; margin-right:20px">You have sent me the following information: </h4>';
$mail  .= '</td></tr><tr><td>';
$mail  .= '<p style="font-family: sans-serif; display: inline; margin-right:20px"><strong>Your Name:</strong> ' . $name. '</p>';
$mail  .= '</td></tr><tr><td>';
$mail  .= '<p style="font-family: sans-serif; display: inline; margin-right:20px"><strong>Your Email:</strong> ' . $to . '</p>';
$mail  .= '</td></tr><tr><td>';
$mail  .= '<p style="font-family: sans-serif; display: inline; margin-right:20px"><strong>Your message:</strong> ' . $msg. '</p>';
$mail  .= '</td></tr>';
$mail  .= '</table>';
$mail  .= '</td>';
$mail  .= '<td></td>';
$mail  .= '</tr>';
$mail  .= '</table>';
$mail  .= '<p style="font-family: sans-serif; display: inline; margin-left:5px"><strong>I will contact you as soon as posible.</strong></p>';
$mail  .= '<!-- /BODY -->';
$mail  .= '</body>';
$mail  .= '</html>';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Catalina Guerrero <info@catalinaguerrero.com>' . "\r\n";
$headers .= 'Bcc: catalinango@gmail.com' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $mail, $headers)) {
  echo "Your comments has been sent";
} else {
  echo "Something went wrong, please try again";
}
