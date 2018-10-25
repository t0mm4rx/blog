<?php

ini_set('SMTP','smtp.free.fr');
ini_set("sendmail_from","tom@basket-events.com");

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
      $to = 'tom@basket-events.com';
      $from = 'tommarx@free.fr';
      $object = 'Vous avez reçu un message';
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
      header('Location: index.php?page=contact&success=false');
      exit();
  }

  function redirect_success()
  {
      header('Location: index.php?page=contact&success=true');
      exit();
  }
