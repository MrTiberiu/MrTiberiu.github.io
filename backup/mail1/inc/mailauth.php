<?php
$mail = new PHPMailer;
$mail->IsSMTP();        // Sets Mailer to send message using SMTP
$mail->Host = 'smtp.gmail.com';  // Sets the SMTP hosts of your Email hosting, this for Gmail
$mail->Port = '587';        // Sets the default SMTP server port
$mail->SMTPAuth = true;       // Sets SMTP authentication. Utilizes the Username and Password variables
$mail->Username = 'mtiberiu123@gmail.com';     // Sets SMTP username
$mail->Password = 'Pandes23dec';     // Sets SMTP password
$mail->SMTPSecure = 'tls';       // Sets connection prefix. Options are "", "ssl" or "tls"
$mail->IsHTML(true);       // Sets message type to HTML
$mail->From = 'mtiberiu123@gmail.com';   // Sets the From email address for the message
$mail->FromName = 'Neo ungdomssklubb';     // Sets the From name of the message
?>