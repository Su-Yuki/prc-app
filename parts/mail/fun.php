<?php 
// mail
mb_language("Japanese"); 
mb_internal_encoding("UTF-8");
 
$email = "";
$subject = "テスト"; 
$body = "これはテストです。\n"; 
$to = '';
// $header = "From: $email\nReply-To: $email\n";
// $header = "From: ";
$header = "From: ". mb_encode_mimeheader('');
// var_dump($header);
 
mb_send_mail($to, $subject, $body, $header, '-f'. $email);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    aaaaaaaa
</body>
</html>