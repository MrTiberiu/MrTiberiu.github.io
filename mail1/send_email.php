<?php
//send_mail.php

if(isset($_POST['email_data']))
{
 require 'inc/PHPMailerAutoload.php';
 $output = '';
 foreach($_POST['email_data'] as $row)
 {
  include 'inc/mailauth.php';
  $mail->AddAddress($row["email"], $row["fornavn"]); //Adds a "To" address
  $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);       //Sets message type to HTML
  $mail->AddEmbeddedImage('C:\xampp\htdocs\test\images\icon.png', 'icon');
  $mail->Subject = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'; //Sets the subject of the message
  //An HTML or plain text message body
  $mail->Body = '
  <p>Sed at odio sapien. Vivamus efficitur, nibh sit amet consequat suscipit, ante quam eleifend felis, mattis dignissim lectus ipsum eget lectus. Nullam aliquam tellus vitae nisi lobortis, in hendrerit metus facilisis. Donec iaculis viverra purus a efficitur. Maecenas dignissim finibus ultricies. Curabitur ultricies tempor mi ut malesuada. Morbi placerat neque blandit, volutpat felis et, tincidunt nisl.</p>
  <p>In imperdiet congue sollicitudin. Quisque finibus, ipsum eget sagittis pellentesque, eros leo tempor ante, interdum mollis tortor diam ut nisl. Vivamus odio mi, congue eu ipsum vulputate, consequat hendrerit sapien. Aenean mauris nibh, ultrices accumsan ultricies eget, ultrices ut dui. Donec bibendum lectus a nibh interdum, vel condimentum eros auctor.</p>
  <p>Quisque dignissim pharetra tortor, sit amet auctor enim euismod at. Sed vitae enim at augue convallis pellentesque. Donec rhoncus nisi et posuere fringilla. Phasellus elementum iaculis convallis. Curabitur laoreet, dui eget lacinia suscipit, quam erat vehicula nulla, non ultrices elit massa eu dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vulputate mauris vel ultricies tempor.</p>
  <p>Mauris est leo, tincidunt sit amet lacinia eget, consequat convallis justo. Morbi sollicitudin purus arcu. Suspendisse pellentesque interdum enim non consectetur. Etiam eleifend pharetra ante a feugiat.</p>
  <img src="cid:icon" width="70px" height="70px" align="center">
    <footer>
    <p>Neo ungdomssklubb @ 2021</p>
    <p><a href="https://www.youtube.com/watch?v=aq8Dl1g7rYk">Ressurs</a></p>
    </footer>
  ';
  $mail->AltBody = '';
  
  $result = $mail->Send();      //Send an Email. Return true on success or false on error

  if($result["code"] == '400')
  {
   $output .= html_entity_decode($result['full_error']);
  }

 }
 if($output == '')
 {
  echo 'ok';
 }
 else
 {
  echo $output;
 }
}

?>