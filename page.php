<?php
//$db = new PDO("mysql:host=localhost;dbname=db_credito_voce","root","root");
require_once('conexao.php');
    
header('Content-type: text/html; charset=iso-8859-1');
 header("Content-Type: text/html; charset=ISO-8859-1",true);
   
//  passo 1 /////////////////
       
    
        $cep = $_POST['cep'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
        $bairro = $_POST['bairro'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $ibge = $_POST['ibge'];

        $nome_completo=$_POST['nome_completo'];
        $email=$_POST['email'];
        $valor= $_POST['valor'];
        $parcela= $_POST['parcela'];
        $cpf=$_POST['cpf'];
        $dt_nasc=$_POST['dt_nasc'];
        $renda=$_POST['renda'];
        $id_profissao=$_POST['profissao'];
        $id_ocupacao=$_POST['ocupacao'];
        $id_orgao=$_POST['orgao'];
        $id_vinculo_com_orgao=$_POST['vinculo_com_orgao'];
        $matricula=$_POST['matricula'];
        $id_escolaridade=$_POST['escolaridade'];
        $id_conta_banco=$_POST['conta_banco'];
        $id_estado_civil=$_POST['estado_civil'];
        $id_genero=$_POST['genero'];
        $id_cheque=$_POST['cheque'];
        $id_restricao=$_POST['restricao'];
        $id_veiculo=$_POST['veiculo'];
        $id_imovel=$_POST['imovel'];
        $celular=$_POST['celular'];
        $telefone=$_POST['telefone'];

@$erro = "todos os campos são obrigatórios";
// echo $celular. " cel</br>",
//     $id_conta_banco. " conta banco</br>";
//     $nome_completo. " </br>",
//    $cep. " cep</br>",
//    $complemento. " cep</br>",
//    $bairro. " cep</br>",
//    $cidade. " cep</br>",
//    $estado. " cep</br>",
//   $email. " </br>",
//    $valor. " </br>",
//    $parcela. " </br>",
//     $cpf. " </br>",
//     $dt_nasc. " </br>",
//     $renda. " </br>",
//     $id_profissao. " profissao</br>",
//     $id_ocupacao. " ocupacao</br>",
//     $id_orgao. " orgao</br>",
//     $id_vinculo_com_orgao. "vinculo </br>",
//     $matricula. " matricula </br>",
//     $id_escolaridade. " </br>",
//     $id_conta_banco. " </br>",
//     $id_estado_civil. " estadoo </br>",
//     $id_genero. " genero </br>",
//     $id_cheque."testandoo </br>",
//     $id_restricao."testandoo </br>",
//   
//    $id_veiculo."veiculo </br>",
//     $id_imovel."imovel </br>";
    
     $_SESSION['resposta_veiculo']=$id_veiculo;
     $_SESSION['resposta_imovel']=$id_imovel;
    if(empty($complemento)){
        $endereco = "insert into endereco (cep,logradouro,numero,bairro,cidade,estado,ibge) values ('".$cep."','".$rua."','".$numero."','".$bairro."','".$cidade."','".$estado."','".$ibge."');" or die(mysql_error());
    }else{
    $endereco = "insert into endereco (cep,logradouro,numero,complemento,bairro,cidade,estado,ibge) values ('".$cep."','".$rua."','".$numero."','".$complemento."','".$bairro."','".$cidade."','".$estado."','".$ibge."');" or die(mysql_error());
    }
//ini_set('display_errors', true); error_reporting($endereco);

  // echo $endereco;
    
    $rs_endereco=mysqli_query($conexao,$endereco);
    
    if($rs_endereco > 0){
        $id_endereco = mysqli_insert_id($conexao); 
           $_SESSION['id_endereco']=$id_endereco; 
//            echo $id_endereco."</br>"; 
            if(empty($id_orgao and $id_vinculo_com_orgao)){
             //   echo  "vazio";
                    if(empty($telefone)){ 
//                           echo  "tel vazio";
                        $sql = "insert into usuario (
                        nome_completo,email,cpf,
                        data_nascimento,renda,id_profissao,
                        id_ocupacao,
                        id_instrucao,id_conta_banco,
                        id_valor_emprestimo,id_qtd_parcelas,
                        genero,id_estado_civil,cheque,
                        restricao,veiculo,imovel,id_endereco,
                        celular) values (
                        '".$nome_completo."','".$email."','".$cpf."',
                        '".$dt_nasc."','".$renda."',".$id_profissao.",
                        ".$id_ocupacao.",
                       ".$id_escolaridade.",".$id_conta_banco.",
                        ".$valor.",".$parcela.",
                        ".$id_genero.",".$id_estado_civil.",".$id_cheque.",
                        ".$id_restricao.",".$id_veiculo.",".$id_imovel.",".$id_endereco.",
                        '".$celular."');";
}

else{
                 $sql = "insert into usuario (
                nome_completo,email,cpf,
                data_nascimento,renda,id_profissao,
                id_ocupacao,
                matricula,id_instrucao,id_conta_banco,
                id_valor_emprestimo,id_qtd_parcelas,
                genero,id_estado_civil,cheque,
                restricao,veiculo,imovel,id_endereco,
                celular,telefone) values (
                '".$nome_completo."','".$email."','".$cpf."',
                '".$dt_nasc."','".$renda."',".$id_profissao.",
                ".$id_ocupacao.",
                '".$matricula."',".$id_escolaridade.",".$id_conta_banco.",
                ".$valor.",".$parcela.",
                ".$id_genero.",".$id_estado_civil.",".$id_cheque.",
                ".$id_restricao.",".$id_veiculo.",".$id_imovel.",".$id_endereco.",
                '".$celular."','".$telefone."'  

                );";
//            echo $sql;
            }}
           
        else{
           if(empty($telefone)){  
//            echo  "tellll vazio";
            
            $sql = "insert into usuario (
            nome_completo,email,cpf,
            data_nascimento,renda,id_profissao,
            id_ocupacao,id_orgao,id_vinculo_orgao,
            matricula,id_instrucao,id_conta_banco,
            id_valor_emprestimo,id_qtd_parcelas,
            genero,id_estado_civil,cheque,
            restricao,veiculo,imovel,id_endereco,
            celular) values (
            '".$nome_completo."','".$email."','".$cpf."',
            '".$dt_nasc."','".$renda."',".$id_profissao.",
            ".$id_ocupacao.",".$id_orgao.",".$id_vinculo_com_orgao.",
            '".$matricula."',".$id_escolaridade.",".$id_conta_banco.",
            ".$valor.",".$parcela.",
            ".$id_genero.",".$id_estado_civil.",".$id_cheque.",
            ".$id_restricao.",".$id_veiculo.",".$id_imovel.",".$id_endereco.",
            '".$celular."'  

            );";}else{
            $sql = "insert into usuario (
            nome_completo,email,cpf,
            data_nascimento,renda,id_profissao,
            id_ocupacao,id_orgao,id_vinculo_orgao,
            matricula,id_instrucao,id_conta_banco,
            id_valor_emprestimo,id_qtd_parcelas,
            genero,id_estado_civil,cheque,
            restricao,veiculo,imovel,id_endereco,
            celular,telefone) values (
            '".$nome_completo."','".$email."','".$cpf."',
            '".$dt_nasc."','".$renda."',".$id_profissao.",
            ".$id_ocupacao.",".$id_orgao.",".$id_vinculo_com_orgao.",
            '".$matricula."',".$id_escolaridade.",".$id_conta_banco.",
            ".$valor.",".$parcela.",
            ".$id_genero.",".$id_estado_civil.",".$id_cheque.",
            ".$id_restricao.",".$id_veiculo.",".$id_imovel.",".$id_endereco.",
            '".$celular."','".$telefone."'  

            );"or die(mysql_error());
                //echo $sql;
            }  }
        
            $result = mysqli_query($conexao,$sql);
//        echo $sql;
            if($result > 0){ 
               header('location:modal.php');      
//                echo "ok";
                 //recebo o último id
               $ultimo_id = mysqli_insert_id($conexao); 
               $_SESSION['id_user']=$ultimo_id; 
              // echo  $ultimo_id; 
           }else{
                 "<SCRIPT type='text/javascript'> //not showing me this
                                    alert('$erro');
                                    window.location.replace(\"passo1.php\");
                                </SCRIPT>";
//               //header('location:passo1.php');
//               echo "erro";
               }

    }

    else{
//        echo "erro no endereco";
        echo "<script type='javascript'>alert('Erro no endereço!');";
        echo "javascript:window.location='passo1.php';</script>";
//       
//    </SCRIPT>";
}

    
?>