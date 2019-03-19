<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$data = null;
$status = 404;
if(isset($_POST['posalji'])){

//    header('Content-Type: application/json');
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$email = $_POST['email'];
$naslov = $_POST['naslov'];
$tekst = $_POST['tekst'];
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//Load Composer's autoloader
require 'vendor/autoload.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'testphpmailer756@gmail.com';                 // SMTP username
    $mail->Password = 'qw1234er';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $ime." ".$prezime);
    $mail->addAddress('testphpmailer756@gmail.com');     // Add a recipient


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $naslov;
    $mail->Body    = $tekst;
    $mail->AltBody = $tekst;

    $mail->send();

    $data = ['msg'=>'Uspesno poslat mail'];
    $status = 200;


} catch (Exception $e) {
$data = null;
$status = 500;
}

}
http_response_code($status);
echo json_encode($data);


