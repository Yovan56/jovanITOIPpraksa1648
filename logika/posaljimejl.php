<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/PHPMAiler-master/src/Exception.php';
require_once __DIR__ . '/../includes/PHPMAiler-master/src/PHPMailer.php';
require_once __DIR__ . '/../includes/PHPMAiler-master/src/SMTP.php';

require_once __DIR__ . '/../tabele/Mejl.php';


if (
    isset($_POST['ime']) && 
    isset($_POST['prezime']) &&
    isset($_POST['naslov']) && 
    isset($_POST['mejl']) &&
    isset($_POST['poruka'])
) {
    $imePrezime = $_POST['ime']." ".$_POST['prezime'];
    $naslov = $_POST['naslov'];
    $mejl = $_POST['mejl'];
    $poruka = $_POST['poruka'];
   
    Mejl::insertMejl($_POST['ime'],$_POST['prezime'],$_POST['naslov'],$_POST['mejl'],$_POST['poruka']);

    
    $spojeno = "<p>".$poruka."</p><br><p>".$imePrezime."&nbsp;&lt;".$mejl."&gt;</p>";
}

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->SMTPAuth = true;
$mail->Host = HOST_MAIL;
$mail->Port = PORT;
$mail->Username = USERNAME;
$mail->Password = PASSWORD;
$mail->setFrom(SENDING_ADDRESS);
$mail->addAddress(RECEIVING_ADDRESS);
$mail->Subject = $naslov;
$mail->msgHTML($spojeno);
$mail->AltBody = 'This is a plain-text message body';


if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
$mail->smtpClose();
