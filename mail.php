<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('fonctions.php');

$captcha = $_POST['g-recaptcha-response'];
$url_c = 'https://www.google.com/recaptcha/api/siteverify?secret=6LeYnncUAAAAACo4RNx5ZPViugSr0SQPvKuywKVX&response=' . $captcha;
$response = json_decode(file_get_contents($url_c), true)['success'];
print_r($response);

if ($response != 1) {
  redirect_error();
}

ini_set('SMTP','SSL0.OVH.NET');
ini_set("sendmail_from","tom@tommarx.fr");

  if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['message'])) {
      if ($_POST['message'] != "" && $_POST['mail'] != "") {
          send_mail();
      } else {
          redirect_error();
      }
  } else {
      redirect_error();
  }

  function send_mail()
  {
      $to = 'tom@tommarx.fr';
      $from = 'tom@tommarx.fr';
      $object = 'Message envoyé depuis le site';
      $name = htmlspecialchars($_POST['name']);
      $mail = htmlspecialchars($_POST['mail']);
      $message = "Message : " . htmlspecialchars($_POST['message']) . "<br />";
      $message .= "\nNom : <b>$name</b>" . "<br />";
      $message .= "\nMail : <b>$mail</b>" . "<br />";

      $headers  = "From: $from"."\r\n";
      $headers .= "Reply-To: $mail"."\r\n";
      $headers .= 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

      $success = mail($to, $object, $message, $headers);
      if ($success) {
          redirect_success();
      } else {
          redirect_error();
      }
  }

  function redirect_error()
  {
      header('Location: ' . $GLOBALS['url'] . 'contact/?success=false');
      exit();
  }

  function redirect_success()
  {
      header('Location: '. $GLOBALS['url'] . 'contact/?success=true');
      exit();
  }
