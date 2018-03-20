<?php

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$nome = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$assunto = $_POST['subject'];
$msg= "";
// echo "nome". $nome."<br>",
// "email".$email."<br>",
// "mensagem".$message."<br>",
// "subject".$assunto."<br>";

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                    // Set mailer to use SMTP
$mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth   = true;
$mail->CharSet = 'UTF-8';                             // Enable SMTP authentication
$mail->Username = 'atendimentoautocc@outlook.com';                 // SMTP username
$mail->Password = 'Midia1001';                          // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;
// $mail->SMTPDebug = 2;                                  // TCP port to connect to
$mail->setFrom('atendimentoautocc@outlook.com');
// $mail->From = $email;
// $mail->FromName = $nome;
$mail->addAddress('midia100@midia100.com.br');     // Add a recipient
// $mail->addBCC('bcc@example.com');
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject =  $assunto;
$mail->Body    =  $message .'<br> Email:'. $email .'<br>'. $nome;


if(!$mail->send()) {
    echo 'Message could not be sent..';
    echo 'Mailer Error: ' . $mail->ErrorInfo;

 $msg="Sua menssagem não foi enviada, por favor tente mais tarde";
 // echo $msg;
 echo  "<SCRIPT type='text/javascript'> //not showing me this
                                    alert('$msg');
                                window.location.replace(\"index.php\");
        </SCRIPT>";
} else {
    $msg = "Sua mensagem foi enviada com sucesso!, logo entraremos em contato.";
    // echo $msg;

    echo  "<SCRIPT type='text/javascript'> //not showing me this
                                    alert('$msg');
                window.location.replace(\"index.php\");
            </SCRIPT>";
}
