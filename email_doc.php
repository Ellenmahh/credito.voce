<?php

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$msg= "";
  $sql = "select user.id_usuario,user.nome_completo, doc.id_documentos,doc.identidade,doc.cpf,doc.comprovante_renda,
                                doc.comprovante_residencia FROM usuario as user
                                inner join documentos as doc on
                                user.upload_comprovante = doc.id_documentos where id_usuario = ".$_SESSION['id_user'].";";
// echo $sql;
$query = mysqli_query($conexao,$sql);

                                    

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
$mail->addAddress('elnmah@hotmail.com');     // Add a recipient
// $mail->addBCC('bcc@example.com');
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject =  "enviando doc";
while($rs= mysqli_fetch_assoc($query)){
    $mail->Body    =  echo "nome: ".$rs['nome_completo'],
                    echo '<img src="34.204.2.75/credito.voce/"'.$rs['identidade'] ;
}


if(!$mail->send()) {
    echo 'Message could not be sent..';
    echo 'Mailer Error: ' . $mail->ErrorInfo;

 $msg="Sua menssagem não foi enviada, por favor tente mais tarde";
 echo $msg;
} else {
    $msg = "Sua mensagem foi enviada com sucesso!, logo entraremos em contato.";

    echo $msg;
}

?>
