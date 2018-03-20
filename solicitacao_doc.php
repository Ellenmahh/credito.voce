<?php
    require_once('conexao.php');
$_SESSION['id_user'] . "</br>";
$msg= "";
    if(isset($_POST['finalizar_proposta'])){
//    echo "ok";
    $nome_arq = basename ($_FILES['rg']['name']);
    $nome_arq2 = basename ($_FILES['cpf']['name']);
    $nome_arq3 = basename ($_FILES['comprovante_residencia']['name']);
    $nome_arq4 = basename ($_FILES['comprovante_renda']['name']);

//    echo $nome_arq. "rg <br>",
//        $nome_arq2. "cpf <br>",
//        $nome_arq3. "comprovante_residencia<br>",
//       echo  $nome_arq4. "comprovante_renda <br>";

    $caminho = "img/comprovante/";
    $nome_arquivo = $caminho . $nome_arq;
    $nome_arquivo2 = $caminho . $nome_arq2;
    $nome_arquivo3 = $caminho . $nome_arq3;
    $nome_arquivo4 = $caminho . $nome_arq4;
    $extensao = strtolower(substr($nome_arq,strlen($nome_arq)-3,3));
//    echo $nome_arquivo."<br> ". $nome_arquivo2."<br>".$nome_arquivo3."<br>".$nome_arquivo4;

     if($_FILES['rg']['error']==0 and $_FILES['cpf']['error']==0 and $_FILES['comprovante_residencia']['error']==0 and $_FILES['comprovante_renda']['error']==0){
      $uploaddir = "img/comprovante/";
			$nome_arq = basename($_FILES['rg']['name']);
			$nome_arq2 = basename($_FILES['cpf']['name']);
			$nome_arq3 = basename($_FILES['comprovante_residencia']['name']);
			$nome_arq4 = basename($_FILES['comprovante_renda']['name']);
			$temp_name = $_FILES['rg']['tmp_name'];
			$temp_name2 = $_FILES['cpf']['tmp_name'];
			$temp_name3 = $_FILES['comprovante_residencia']['tmp_name'];
			$temp_name4 = $_FILES['comprovante_renda']['tmp_name'];
			$uploadfile = $uploaddir . $nome_arq . $nome_arq2;
         if(move_uploaded_file($_FILES['rg']['tmp_name'], $nome_arquivo)){
             if(move_uploaded_file($_FILES['cpf']['tmp_name'], $nome_arquivo2)){
                 if(move_uploaded_file($_FILES['comprovante_residencia']['tmp_name'], $nome_arquivo3)){
                     if(move_uploaded_file($_FILES['comprovante_renda']['tmp_name'], $nome_arquivo4)){
                         $verificacao = "insert into  documentos (identidade,cpf,comprovante_residencia,comprovante_renda) values ('".$nome_arquivo."','".$nome_arquivo2."','".$nome_arquivo3."','".$nome_arquivo4."');";
//                         echo $verificacao;
                         $query = mysqli_query($conexao,$verificacao);
                         if($query > 0){
                              $doc = mysqli_insert_id($conexao);
                              $_SESSION['id_documentos']=$doc;
                             $sql = "update usuario set upload_comprovante = ". $_SESSION['id_documentos']." where id_usuario = ".$_SESSION['id_user'].";";
                            // echo $sql;
                             $rs = mysqli_query($conexao,$sql);
                             if($rs > 0){
                               //header('location:modal_doc.php');
                               // echo "ok";
                               require 'PHPMailer/PHPMailerAutoload.php';

                               $mail = new PHPMailer;

                               $sql = "select * from db_credito_voce.cadastro_completo where id_usuario = ".$_SESSION['id_user'].";";
                             // echo $sql;
                             $query = mysqli_query($conexao,$sql);
                               // echo "nome". $nome."<br>",
                               // "email".$email."<br>",
                               // "mensagem".$message."<br>",
                               // "subject".$assunto."<br>";

                               //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                               $mail->isSMTP();                                    // Set mailer to use SMTP
                               $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
                               $mail->SMTPAuth   = true;
                               $mail->CharSet = 'UTF-8';                             // Enable SMTP authentication
                               $mail->Username = 'creditovoce@outlook.com';                 // SMTP username
                               $mail->Password = 'credito.voce';                          // SMTP password
                               $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                               $mail->Port = 587;
                               // $mail->SMTPDebug = 2;                                  // TCP port to connect to
                               $mail->setFrom('creditovoce@outlook.com');
                               // $mail->From = $email;
                               // $mail->FromName = $nome;
                               $mail->addAddress('midia100@midia100.com.br');     // Add a recipient

                              $mail->AddCC('marcio@midia100.com.br');
                              $mail->AddCC('suporte@midia100.com.br');
                              $mail->addBCC('elnmah@hotmail.com');
                               $mail->isHTML(true);                                  // Set email format to HTML

                               // $mail->Subject = "teste";
                               // $mail->Body    =  "testando";
                               $mail->Subject =  "DOCUMENTÇÃO DE USUÁRIO";
                               while($rs= mysqli_fetch_assoc($query)){
                                 $message  = "<html><body>";

                                 $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";

                                 $message .= "<tr><td>";

                                 $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff;text-align:center'>";

                                 $message .= "<thead>
                                 <tr height='80'>
                                   <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Cadastro do usuário:</th>
                                 </tr>
                                            </thead>";

                                  $message .= "<tbody>
                                      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                         <td style='background-color:#00a2d1; text-align:center;'> ".$rs['id_usuario']."</td>
                                      </tr>

                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong><h2> Nome: </strong>".$rs['nome_completo']."</h2>  <strong> email: </strong>".$rs['email']."</td>

                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Solicitou: </strong>".$rs['valor_emprestimo']."<strong> Qtd Parcelas: </strong>".$rs['QtdParcela']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Finalidade: </strong>".$rs['finalidade']."</td>
                                      </tr>
                                      <tr>
                                         <td colspan='4' style='padding:15px;'><strong> CPF: </strong>".$rs['cpf']."  <strong> Data de nascimento: </strong>".$rs['data_nascimento']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong>Imagem CPF: </strong>34.204.2.75/credito.voce/".$rs['img_cpf']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong>Tipo identidade: </strong>".$rs['tipo_identidade']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong>Número identidade: </strong>".$rs['numero_id']."<strong> Emissão: </strong>".$rs['dt_emissao']."<strong> Validade: </strong>".$rs['dt_validade']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong>Orgão emissor: </strong>".$rs['orgao_emissor']."<strong> UF Emissor: </strong>".$rs['UF_emissor']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong>Imagem RG: </strong>34.204.2.75/credito.voce/".$rs['img_rg']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Celular: </strong>".$rs['celular']." <strong>Telefone: </strong>".$rs['telefone']."<strong> Renda: R$ </strong>".$rs['renda']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong>Imagem comprovante de renda: </strong>34.204.2.75/credito.voce/".$rs['img_comprovanteDeRenda']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Genero: </strong>".$rs['genero']."<strong> Nacionalidade: </strong>".$rs['nacionalidade']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> UF Nascimento: </strong>".$rs['estado_nascimento']."<strong> Cidade Nascimento: </strong>".$rs['cidade_nascimento']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Nome do pai: </strong>".$rs['nome_pai']."<strong> Nome da mãe: </strong>".$rs['nome_mae']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Tipo de resiência: </strong>".$rs['tipo_residencia']."<strong> Reside desde: </strong>".$rs['reside_desde']."</td>
                                      </tr>


                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Escolaridade: </strong>".$rs['escolaridade']."<strong> Conta: </strong>".$rs['conta_banco']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Possui cheque?: </strong>".$rs['cheque']."<strong> Restrição no nome?: </strong>".$rs['restricao']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Possui veículo?: </strong>".$rs['veiculo']."<strong> Imovel?: </strong>".$rs['imovel']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Profissão: </strong>".$rs['profissoes']."<strong>  Ocupação: </strong>".$rs['ocupacao']."</td>
                                      </tr>
                                      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                         <td style='background-color:#00a2d1; text-align:center;'> Endereço residencial: </td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong>Cep:</strong>".$rs['cep']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Logradouro: </strong>".$rs['logradouro']."<strong> N: </strong>".$rs['numero']."<strong> Complemento: </strong>".$rs['complemento']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Bairro: </strong>".$rs['bairro']."<strong> Cidade: </strong>".$rs['cidade']."<strong> Estado: </strong>".$rs['estado']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong>Imagem Comprovante de residência: </strong>34.204.2.75/credito.voce/".$rs['img_comprovanteResidencia']."</td>
                                      </tr>
                                      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                         <td style='background-color:#00a2d1; text-align:center;'> Se Funcionário público:</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong>Orgão:</strong>".$rs['orgao']. "<strong> Vinculo com orgão:</strong>".$rs['vinculo_com_orgao']."<strong>Matrícula:</strong>".$rs['matricula']."</td>
                                      </tr>

                                      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                         <td style='background-color:#00a2d1; text-align:center;'> Dados empresarial:</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Nome empresa: </strong>".$rs['nome_empresa']."<strong> Telefone da empresa: </strong>".$rs['telefone_empresa']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> CEP: </strong>".$rs['cep_empresa']."<strong> Logradouro: </strong>".$rs['logradouro_empresa']."<strong> Complemento: </strong>".$rs['complemento_empresa']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Dt Admissão: </strong>".$rs['data_admissao']."<strong> Comprovante: </strong>".$rs['comprovante']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Bairro: </strong>".$rs['bairro_empresa']."<strong> Cidade: </strong>".$rs['cidade_empresa']."<strong> UF: </strong>".$rs['uf_empresa']."</td>
                                      </tr>
                                      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                         <td style='background-color:#00a2d1; text-align:center;'> Dados Imóvel:</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Valor do imovel: </strong>".$rs['valor']."</td>

                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Está financiado?: </strong>".$rs['financiado']."<strong> Documentação ok ?: </strong>".$rs['documentacao']."</td>
                                      </tr>
                                      <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                         <td style='background-color:#00a2d1; text-align:center;'> Dados Veículo:</td>
                                      </tr>

                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Marca: </strong>".$rs['marca_veiculo']."<strong> Modelo: </strong>".$rs['modelo']."</td>
                                      </tr>
                                      <tr>
                                       <td colspan='4' style='padding:15px;'><strong> Está financiado?: </strong>".$rs['veiculo_financiado']."<strong> Documentação ok ?: </strong>".$rs['documentacao']."</td>
                                      </tr>


                                             </tbody>";

                                             $message .= "</table>";

                                   $message .= "</td></tr>";
                                   $message .= "</table>";

                                   $message .= "</body></html>";

                               }
                               $mail->Body    = $message;

                               if(!$mail->send()) {

                                   echo 'Mailer Error: ' . $mail->ErrorInfo;

                                $msg="Sua menssagem não foi enviada, por favor tente mais tarde";
                                echo $msg;

                                // echo  "<SCRIPT type='text/javascript'> //not showing me this
                                //                                    alert('$msg');
                                //                                window.location.replace(\"index.php\");
                                //        </SCRIPT>";
                               } else {
                                   $msg = "Sua mensagem foi enviada com sucesso!, logo entraremos em contato.";
                                   //echo $msg;
                                   header('location:modal_doc.php');

                                   // echo  "<SCRIPT type='text/javascript'> //not showing me this
                                   //                                 alert('$msg');
                                   //             window.location.replace(\"index.php\");
                                   //         </SCRIPT>";
                               }


                              }
                             }


//
                    }
                 }
             }
         }

     }
         if(empty($nome_arq)){
             $msg ="<code>opsss... não identificamos o rg</code>";
        }else if(empty($nome_arq2)){
             $msg ="<code>opsss... não identificamos o cpf</code>";
        }else if(empty($nome_arq3)){
             $msg ="<code> comprovante de residência</code>";
        }else if(empty($nome_arq4)){
              $verificacao = "insert into  documentos (identidade,cpf,comprovante_residencia) values ('".$nome_arquivo."','".$nome_arquivo2."','".$nome_arquivo3."');";

//                         echo $verificacao;
             $query = mysqli_query($conexao,$verificacao);
                         if($query > 0){
                              $doc = mysqli_insert_id($conexao);
                              $_SESSION['id_documentos']=$doc;
                            $sql = "update usuario set upload_comprovante = ". $_SESSION['id_documentos']." where id_usuario = ".$_SESSION['id_user'].";";
                             // echo $sql;
                             $rs = mysqli_query($conexao,$sql);
                             if($rs > 0){

                                // echo "ok";
                                require 'PHPMailer/PHPMailerAutoload.php';

                                $mail = new PHPMailer;
                                $sql = "select * from db_credito_voce.cadastro_completo where id_usuario = ".$_SESSION['id_user'].";";
                              // echo $sql;
                              $query = mysqli_query($conexao,$sql);


                                // echo "nome". $nome."<br>",
                                // "email".$email."<br>",
                                // "mensagem".$message."<br>",
                                // "subject".$assunto."<br>";

                                //$mail->SMTPDebug = 3;                               // Enable verbose debug output

                                $mail->isSMTP();                                    // Set mailer to use SMTP
                                $mail->Host = 'smtp.live.com';  // Specify main and backup SMTP servers
                                $mail->SMTPAuth   = true;
                                $mail->CharSet = 'UTF-8';                             // Enable SMTP authentication
                                $mail->Username = 'creditovoce@outlook.com';                 // SMTP username
                                $mail->Password = 'credito.voce';                              // SMTP password
                                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                                $mail->Port = 587;
                                // $mail->SMTPDebug = 2;                                  // TCP port to connect to
                                $mail->setFrom('creditovoce@outlook.com');
                                // $mail->From = $email;
                                // $mail->FromName = $nome;
                                $mail->addAddress('midia100@midia100.com.br');     // Add a recipient

                               $mail->AddCC('marcio@midia100.com.br');
                               $mail->AddCC('suporte@midia100.com.br');
                               $mail->addBCC('elnmah@hotmail.com');
                                $mail->isHTML(true);                                  // Set email format to HTML

                                // $mail->Subject = "teste";
                                // $mail->Body    =  "testando";
                                $mail->Subject =  "DOCUMENTÇÃO DE USUÁRIO";
                                while($rs= mysqli_fetch_assoc($query)){
                                  $message  = "<html><body>";

                                  $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";

                                  $message .= "<tr><td>";

                                  $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff;text-align:center'>";

                                  $message .= "<thead>
                                  <tr height='80'>
                                    <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Cadastro do usuário:</th>
                                  </tr>
                                             </thead>";

                                   $message .= "<tbody>
                                       <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                          <td style='background-color:#00a2d1; text-align:center;'> ".$rs['id_usuario']."</td>
                                       </tr>

                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong><h2> Nome: </strong>".$rs['nome_completo']."</h2>  <strong> email: </strong>".$rs['email']."</td>

                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Solicitou: </strong>".$rs['valor_emprestimo']."<strong> Qtd Parcelas: </strong>".$rs['QtdParcela']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Finalidade: </strong>".$rs['finalidade']."</td>
                                       </tr>
                                       <tr>
                                          <td colspan='4' style='padding:15px;'><strong> CPF: </strong>".$rs['cpf']."  <strong> Data de nascimento: </strong>".$rs['data_nascimento']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong>Imagem CPF: </strong>34.204.2.75/credito.voce/".$rs['img_cpf']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong>Tipo identidade: </strong>".$rs['tipo_identidade']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong>Número identidade: </strong>".$rs['numero_id']."<strong> Emissão: </strong>".$rs['dt_emissao']."<strong> Validade: </strong>".$rs['dt_validade']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong>Orgão emissor: </strong>".$rs['orgao_emissor']."<strong> UF Emissor: </strong>".$rs['UF_emissor']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong>Imagem RG: </strong>34.204.2.75/credito.voce/".$rs['img_rg']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Celular: </strong>".$rs['celular']." <strong>Telefone: </strong>".$rs['telefone']."<strong> Renda: R$ </strong>".$rs['renda']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong>Imagem comprovante de renda: </strong>34.204.2.75/credito.voce/".$rs['img_comprovanteDeRenda']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Genero: </strong>".$rs['genero']."<strong> Nacionalidade: </strong>".$rs['nacionalidade']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> UF Nascimento: </strong>".$rs['estado_nascimento']."<strong> Cidade Nascimento: </strong>".$rs['cidade_nascimento']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Nome do pai: </strong>".$rs['nome_pai']."<strong> Nome da mãe: </strong>".$rs['nome_mae']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Tipo de resiência: </strong>".$rs['tipo_residencia']."<strong> Reside desde: </strong>".$rs['reside_desde']."</td>
                                       </tr>


                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Escolaridade: </strong>".$rs['escolaridade']."<strong> Conta: </strong>".$rs['conta_banco']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Possui cheque?: </strong>".$rs['cheque']."<strong> Restrição no nome?: </strong>".$rs['restricao']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Possui veículo?: </strong>".$rs['veiculo']."<strong> Imovel?: </strong>".$rs['imovel']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Profissão: </strong>".$rs['profissoes']."<strong>  Ocupação: </strong>".$rs['ocupacao']."</td>
                                       </tr>
                                       <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                          <td style='background-color:#00a2d1; text-align:center;'> Endereço residencial: </td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong>Cep:</strong>".$rs['cep']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Logradouro: </strong>".$rs['logradouro']."<strong> N: </strong>".$rs['numero']."<strong> Complemento: </strong>".$rs['complemento']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Bairro: </strong>".$rs['bairro']."<strong> Cidade: </strong>".$rs['cidade']."<strong> Estado: </strong>".$rs['estado']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong>Imagem Comprovante de residência: </strong>34.204.2.75/credito.voce/".$rs['img_comprovanteResidencia']."</td>
                                       </tr>
                                       <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                          <td style='background-color:#00a2d1; text-align:center;'> Se Funcionário público:</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong>Orgão:</strong>".$rs['orgao']. "<strong> Vinculo com orgão:</strong>".$rs['vinculo_com_orgao']."<strong>Matrícula:</strong>".$rs['matricula']."</td>
                                       </tr>

                                       <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                          <td style='background-color:#00a2d1; text-align:center;'> Dados empresarial:</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Nome empresa: </strong>".$rs['nome_empresa']."<strong> Telefone da empresa: </strong>".$rs['telefone_empresa']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> CEP: </strong>".$rs['cep_empresa']."<strong> Logradouro: </strong>".$rs['logradouro_empresa']."<strong> Complemento: </strong>".$rs['complemento_empresa']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Dt Admissão: </strong>".$rs['data_admissao']."<strong> Comprovante: </strong>".$rs['comprovante']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Bairro: </strong>".$rs['bairro_empresa']."<strong> Cidade: </strong>".$rs['cidade_empresa']."<strong> UF: </strong>".$rs['uf_empresa']."</td>
                                       </tr>
                                       <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                          <td style='background-color:#00a2d1; text-align:center;'> Dados Imóvel:</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Valor do imovel: </strong>".$rs['valor']."</td>

                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Está financiado?: </strong>".$rs['financiado']."<strong> Documentação ok ?: </strong>".$rs['documentacao']."</td>
                                       </tr>
                                       <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
                                          <td style='background-color:#00a2d1; text-align:center;'> Dados Veículo:</td>
                                       </tr>

                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Marca: </strong>".$rs['marca_veiculo']."<strong> Modelo: </strong>".$rs['modelo']."</td>
                                       </tr>
                                       <tr>
                                        <td colspan='4' style='padding:15px;'><strong> Está financiado?: </strong>".$rs['veiculo_financiado']."<strong> Documentação ok ?: </strong>".$rs['documentacao']."</td>
                                       </tr>


                                              </tbody>";

                                              $message .= "</table>";

                                    $message .= "</td></tr>";
                                    $message .= "</table>";

                                    $message .= "</body></html>";

                                }
                                $mail->Body    = $message;

                                if(!$mail->send()) {
                                  //  echo 'Message could not be sent..';
                                    echo 'Mailer Error: ' . $mail->ErrorInfo;

                                 $msg="Sua menssagem não foi enviada, por favor tente mais tarde";
                                 echo $msg;
                                  //require_once('modal_doc.php');
                                 // echo  "<SCRIPT type='text/javascript'> //not showing me this
                                 //                                    alert('$msg');
                                 //                                window.location.replace(\"index.php\");
                                 //        </SCRIPT>";
                                } else {
                                    $msg = "Sua mensagem foi enviada com sucesso!, logo entraremos em contato.";
                                  //  echo $msg;
                                      header('location:modal_doc.php');

                                    // echo  "<SCRIPT type='text/javascript'> //not showing me this
                                    //                                 alert('$msg');
                                    //             window.location.replace(\"index.php\");
                                    //         </SCRIPT>";
                                }



                             }

                         }
         }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Credito.vc</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel=stylesheet  type="text/css" href="css/import.css">
    <script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <?php require_once('head3.html'); ?>
    <style>
        .principal{
            height: 500px;
        }
        .div1{
            width: 250px;
            background-color: #0f6ab5;
            height: 160px;
            margin-bottom: 10px;
            color: white;
            text-align:center;
        }
        .div2{
            width: 250px;
            height: 320px;
            background-color: #656464;
            color: white;
            text-align:center;
        }
        .anexo{
            width: 40px;
            margin-top: 150px;
        }
        .div2 span{

            margin-top: 150px;
        }
        #multiple_upload, #multiple_upload2, #multiple_upload3,#multiple_upload4{
          position:relative;
          margin-top: 20px;
        }


    #uploadChange, #uploadChange2,#uploadChange3,#uploadChange4 {
      position:absolute;
      top:2px;
      left:0;
      opacity:0.01;
      border:none;
      width:355px;
      padding:10px;
      z-index:1;
      cursor:pointer;
      margin-top: 150px;

}

    </style>
</head>
<body >
    	<!-- navbar -->
	<?php require_once('menu.html');?>
<div class="container" style="margin-top:40px;">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Documentos</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Conclusão</p>
            </div>

        </div>
    </div>
    <div class="price-box">
        <div class="row">
        </div>
          <div class="container">
            <form role="form" method="post" action="solicitacao_doc.php" enctype="multipart/form-data">
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">

                            <div class="col-md-12">
                            <h3><strong> Estamos quase lá!</strong> só falta alguns documentos...</h3>
                             <div class="col-sm-6" style="width: 100%">


                                      <div class="price-slider">
                                        <h4 class="great">Tire foto dos seus documentos ou escaneie</h4>
                                        <span>e anexe as imagens nas caixas abaixo:</span>
                                        <div class="btn-group btn-group-justified principal upload" >

                                          <div class="btn-group btn-group-lg" >
                                              <div class="div1">
                                             <strong>
                                                 <br> Identidade<br>
                                                 (Frente/Verso)
                                                 <br>
                                                 <br>
                                              </strong>
                                                  <?php echo $msg?>
                                              </div>
                                            <div class="div2">
                                                <div id="multiple_upload">

                                                  <input id="uploadChange" type="file" name="rg" multiple="multiple" onchange="PreviewImage();" />
                                                  <div id="message">
                                                    <img class="anexo" src="img/anexo.png"><br>
                                                                     Inserir RG
                                                </div>

                                                  <img id="uploadPreview" style="width: 100%; height: 70px;border:0px;margin-top:20px; " />

                                                  <script type="text/javascript">

                                                    function PreviewImage() {
                                                        var oFReader = new FileReader();
                                                        oFReader.readAsDataURL(document.getElementById("uploadChange").files[0]);

                                                        oFReader.onload = function (oFREvent) {
                                                            document.getElementById("uploadPreview").src = oFREvent.target.result;
                                                        };
                                                    };
                                                </script>
                                              </div>
                                           </div>
                                          </div>
                                          <div class="btn-group btn-group-lg" >
                                              <div class="div1">
                                             <strong>
                                                 <br> CPF<br>
                                                 (Frente/Verso)
                                                 <br>
                                                 <br>
                                              </strong>
                                                  <?php echo $msg?>
                                              </div>

                                                <div class="div2">
                                                    <div id="multiple_upload2">

                                                      <input id="uploadChange2" type="file" name="cpf" multiple="multiple" onchange="PreviewImage2();" />
                                                      <div id="message2">
                                                        <img class="anexo" src="img/anexo.png"><br>
                                                                       Inserir CPF
                                                    </div>

                                                      <img id="uploadPreview2" style="width: 100%; height: 70px;border:0px;margin-top:20px; " />

                                                      <script type="text/javascript">

                                                        function PreviewImage2() {
                                                            var oFReader = new FileReader();
                                                            oFReader.readAsDataURL(document.getElementById("uploadChange2").files[0]);

                                                            oFReader.onload = function (oFREvent) {
                                                                document.getElementById("uploadPreview2").src = oFREvent.target.result;
                                                            };
                                                        };
                                                    </script>
                                                  </div>
                                                </div>

                                          </div>
                                          <div class="btn-group btn-group-lg" >
                                              <div class="div1">
                                             <strong>
                                                 <br> Comprovante <br>de Residência<br>

                                                 <br>
                                                 <br>
                                              </strong>
                                                  <?php echo $msg?>
                                              </div>

                                                <div class="div2">
                                                    <div id="multiple_upload3">

                                                      <input id="uploadChange3" type="file" name="comprovante_residencia" multiple="multiple" onchange="PreviewImage3();" />
                                                      <div id="message3">
                                                        <img class="anexo" src="img/anexo.png"><br>
                                                                        Inserir Comprovante <br>de Residência
                                                    </div>

                                                      <img id="uploadPreview3" style="width: 100%; height: 70px;border:0px;" />

                                                      <script type="text/javascript">

                                                        function PreviewImage3() {
                                                            var oFReader = new FileReader();
                                                            oFReader.readAsDataURL(document.getElementById("uploadChange3").files[0]);

                                                            oFReader.onload = function (oFREvent) {
                                                                document.getElementById("uploadPreview3").src = oFREvent.target.result;
                                                            };
                                                        };
                                                    </script>
                                                  </div>
                                                </div>

                                          </div>

                                          <div class="btn-group btn-group-lg" >
                                          <div class="div1">
                                         <strong>
                                             <br> Comprovante <br>de Renda<br>

                                             <br>
                                             <br>
                                          </strong>
                                              <?php echo $msg;?>
                                          </div>
                                            <div class="div2">
                                                    <div id="multiple_upload4">

                                                      <input id="uploadChange4" type="file" name="comprovante_renda" multiple="multiple" onchange="PreviewImage4();" />
                                                      <div id="message4">
                                                        <img class="anexo" src="img/anexo.png"><br>
                                                                Inserir Comprovante <br>de Renda
                                                    </div>

                                                      <img id="uploadPreview4" style="width: 100%; height: 70px;border:0px;" />

                                                      <script type="text/javascript">

                                                        function PreviewImage4() {
                                                            var oFReader = new FileReader();
                                                            oFReader.readAsDataURL(document.getElementById("uploadChange4").files[0]);

                                                            oFReader.onload = function (oFREvent) {
                                                                document.getElementById("uploadPreview4").src = oFREvent.target.result;
                                                            };
                                                        };
                                                    </script>
                                                  </div>
                                                </div>

                                        </div>

                                        </div>
                                      </div>

                                      <div class="price-slider" style="display: none">
                                        <h4 class="great">Term</h4>
                                        <span>Please choose one</span>
                                          <input name="sliderVal" type="hidden" id="sliderVal" value='0' readonly="readonly" />
                                    <input name="month" type="hidden" id="month" value='24month' readonly="readonly" />
                                    <input name="term" type="hidden" id="term" value='quarterly' readonly="readonly" />
                                          <div class="btn-group btn-group-justified">
                                            <div class="btn-group btn-group-lg">
                                        <button type="button" class="btn btn-primary btn-lg btn-block term active-term selected-term" id='quarterly'>Quarterly</button>
                                      </div>
                                            <div class="btn-group btn-group-lg">
                                              <button type="button" class="btn btn-primary btn-lg btn-block term" id='monthly'>Monthly</button>
                                      </div>
                                            <div class="btn-group btn-group-lg">
                                              <button type="button" class="btn btn-primary btn-lg btn-block term" id='weekly'>Weekly</button>
                                            </div>
                                          </div>
                                      </div>


                              </div>
                            <button class="btn btn-primary   btn-lg pull-right "  type="submit" value="finalizar_proposta" name="finalizar_proposta" >Finalizar proposta </button>

<!--                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" value="finalizar_proposta" data-toggle="modal" data-target=".autocompleta" name="finalizar_proposta" >Finalizar proposta </button>-->




                        </div>

                    </div>
                </div>
                <div class="row setup-content" id="step-2" >
                    <div class="col-xs-12">

                        <div class="col-md-12">
                            <h3> Step 2</h3>

                                                    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

                            </div>

                        </div>
                </div>

            </form>

<!--
              <form>
                  <input name="x" type="checkbox" value="0"
                         onclick="if (this.checked) { z.disabled = false; } else if (! y.checked) { z.disabled = true; }">

                  <input name="y" type="checkbox" value="1" onclick="if (this.checked) { z.disabled = false; } else if (! x.checked) { z.disabled = true; }">

                  <button name="z" disabled>


                      </form>
-->
        </div>
    </div>
</div>
    <footer>

	<div class="container">
			<div class="row">
				<div class="span6 offset3">
					<ul class="social-networks">
						<li><a href="#"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
						<li><a href="#"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
						<li><a href="#"><i class="icon-circled icon-bgdark icon-dribbble icon-2x"></i></a></li>
						<li><a href="#"><i class="icon-circled icon-bgdark icon-pinterest icon-2x"></i></a></li>
					</ul>
					<p class="copyright">
						&copy; Maxim Theme. All rights reserved.
						<div class="credits">
							<!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Maxim
              -->
							<a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by BootstrapMade.com

                    </div>
				</div>
			</div>
		</div>
		<!-- ./container -->
	</footer>

    <a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/jquery.nav.js"></script>
	<script src="js/jquery.localScroll.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/isotope.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/inview.js"></script>
	<script src="js/animate.js"></script>
	<script src="js/custom.js"></script>
	<script src="contactform/contactform.js"></script>

	<script src="js/custom.js"></script>
    <?php require_once('js/script.php')?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>




    <script>



</body>
</html>
