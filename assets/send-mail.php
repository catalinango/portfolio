<?php
header("Content-type: text/plain; charset=UTF-8");

$correct  = true;
$name     = "";
$email    = "";
$comments = "";

function prepare_data($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (!empty($_POST["name"])) {
    $name     = prepare_data($_POST['name']);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
      $correct = false;
    }
  } else {
    $correct = false;
  }

  if (!empty($_POST["email"])) {
    $email = prepare_data($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $correct = false;
    }
  } else {
    $correct = false;
  }

  if (!empty($_POST["comments"])) {
    $comments = prepare_data($_POST["comments"]);
    if (empty($comments)) {
      $correct = false;
    }
  } else {
    $correct = false;
  }

  if ($correct === true) {
    $subject  = 'Automatic response from Catalina Guerrero Portfolio';
    $body   = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">';
    $body  .= '<html xmlns="http://www.w3.org/1999/xhtml">';
    $body  .= '<meta name="viewport" content="width=device-width" />';
    $body  .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
    $body  .= '<title>Catalina Guerrero Emails</title>';
    $body  .= '</head>';
    $body  .= '<body bgcolor="#fff">';
    $body  .= '<table style="background-color: #61FAAD;">';
    $body  .= '<tr>';
    $body  .= '<td></td>';
    $body  .= '<td style="background-color: transparent;">';
    $body  .= '<!-- HEADER -->';
    $body  .= '<table style="width: 800px; text-align:center">';
    $body  .= '<tr>';
    $body  .= '<td><h3 style="color: #505393; font-family: sans-serif; margin-left:30%">Thank you for contacting me!</h3></td>';
    $body  .= '</tr>';
    $body  .= '</table>';
    $body  .= '</td>';
    $body  .= '<td></td>';
    $body  .= '</tr>';
    $body  .= '</table>';
    $body  .= '<!-- /HEADER -->';
    $body  .= '<!-- BODY -->';
    $body  .= '<table>';
    $body  .= '<tr>';
    $body  .= '<td bgcolor="#fff">';
    $body  .= '<table style="width: 800px;">';
    $body  .= '<tr><td>';
    $body  .= '<h4 style="font-family: sans-serif; display: inline; margin-right:20px">You have sent me the following information: </h4>';
    $body  .= '</td></tr><tr><td>';
    $body  .= '<p style="font-family: sans-serif; display: inline; margin-right:20px"><strong>Your Name:</strong> ' . $name . '</p>';
    $body  .= '</td></tr><tr><td>';
    $body  .= '<p style="font-family: sans-serif; display: inline; margin-right:20px"><strong>Your Email:</strong> ' . $email . '</p>';
    $body  .= '</td></tr><tr><td>';
    $body  .= '<p style="font-family: sans-serif; display: inline; margin-right:20px"><strong>Your message:</strong> ' . $comments . '</p>';
    $body  .= '</td></tr>';
    $body  .= '</table>';
    $body  .= '</td>';
    $body  .= '<td></td>';
    $body  .= '</tr>';
    $body  .= '</table>';
    $body  .= '<p style="font-family: sans-serif; display: inline; margin-left:5px"><strong>I will contact you as soon as posible.</strong></p>';
    $body  .= '<!-- /BODY -->';
    $body  .= '</body>';
    $body  .= '</html>';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: Catalina Guerrero <info@catalinaguerrero.com>' . "\r\n";
    $headers .= 'Bcc: catalinango@gmail.com' . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();

    if (mail($email, $subject, $body, $headers)) {
      echo "Your comments has been sent";
    } else {
      echo "Something went wrong, please try again";
    }
  } else {
    echo "Something went wrong, please review your information";
  }
} else {
  echo "??";
}
