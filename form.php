<?php var_dump($_POST);
include './PHPMailer/src/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;

include './PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\SMTP;


$body='
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body
<div><p>Services:'.$_POST["services"].' </p> <p>Demandes:'.$_POST["demandes"].'</p> <p>Message:'.$_POST["message"].'</p></div>
</body>
</html>';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'localhost';
$mail->Port = 1025;
$mail->SMTPAuth = true;
$mail->Username = '';
$mail->Password = '';
$mail->setFrom('contact@email.com', 'contact');
$mail->addAddress('spiritofly@gmail.com', 'Gregory');
if ($_POST['email'] != null && $_POST['nom'] != null) {
    $mail->addReplyTo($_POST['email'], $_POST['nom']);
}


if ($_POST['nom'] != null) {
    $mail->Subject = 'Coucou ' . $_POST['nom'];
} else {
    $mail->Subject = 'Coucou';
}

if ($_POST['message'] != null) {
    $mail->Body = $body;
} else{
    $mail->Body = 'bonne ap';
}

if (!$mail->send()) {
    var_dump($mail->ErrorInfo);
} else {
    session_start();
    $_SESSION['message'] = "Message envoyé";
    header('Location: http://localhost/CV.Gregory/');
    exit;
}