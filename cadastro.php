<?php
//$db = new PDO("mysql:host=localhost;dbname=db_credito_voce","root","root");
require_once('conexao.php');
      header('Content-type: text/html; charset=iso-8859-1');
 header("Content-Type: text/html; charset=ISO-8859-1",true);
  $_SESSION['id_user'] ;
    $valor_imovel = "";
    $imovel="";
    $documentacao="";
    //dados veiculo
    $marca="";
    $modelo="";
    $financiado="";
//
//    //outros dados user
    $nacionalidade ="";
    $nome_mae ="";
    $nome_pai = "";
    $identidade = "";
    $n_id = "";
    $dt_emissao ="";
    $dt_validade ="";
    $orgao_emissor ="";
    $uf_emissor ="";
    $residencia = "";
//    // empresa user
    $nome_empresa = "";
    //endereco empresa user
    $cep = "";
    $rua ="";
    $numero = "";
    $complemento ="";
    $bairro ="";
    $estado ="";
    $cidade_id= "";
    $ibge = "";
//    // finish endereco user
    $comprovante = "";
    $telefone_empresa ="";
    $data_adm = "";

    @$nacionalidade = $_POST['nacionalidade'];
    @$estado_nasc = $_POST['estado_id'];
    @$cidade_nasc= $_POST['cidade_id'];
    @ $nome_mae = $_POST['nome_mae'];
    @ $nome_pai = $_POST['nome_pai'];
    @ $identidade = $_POST['identidade'];
    @ $n_id = $_POST['n_id'];
    @ $dt_emissao = $_POST['dt_emissao'];
    @ $dt_validade = $_POST['data_validade'];
    @ $orgao_emissor = $_POST['orgao_emissor'];
    @ $uf_emissor = $_POST['uf_emissor'];
    @ $residencia = $_POST['residencia'];
    @ $reside_desde = $_POST['reside_desde'];
    @ $finalidade = $_POST['finalidade'];

    @$erro = "preencha todos os campos";

// dados empresa user/////////
   @ $nome_empresa = $_POST['nome_empresa'];

   @ $cep = $_POST['cep'];
   @ $rua = $_POST['rua'];
   @ $numero = $_POST['numero'];
    @$complemento = $_POST['complemento'];
   @ $bairro = $_POST['bairro'];
    @$estado = $_POST['estado'];
   @ $cidade_id= $_POST['cidade'];
   @ @$ibge = $_POST['ibge'];
   @ $comprovante = $_POST['comprovante'];
   @ $telefone_empresa = $_POST['telefone'];
   @ $data_adm = $_POST['data_adm'];

// finish dados empresa user
//     echo
//    $nacionalidade. " nacionalidade</br>",
//   $estado_nasc. "estado </br>",
//    $cidade_nasc. "cidade </br>",
//    $reside_desde. "reside_desde </br>",
//    $nome_empresa. " </br>",
//    $uf_emissor. "uf emissor </br>",
//    $orgao_emissor. " orgao emissor </br>",
//    $residencia. "residencia </br>",
//    $identidade." identidade</br>",
//    $finalidade." finalidade</br>",
//    $comprovante." comprovante</br>";
    if(empty($complemento)){
     $endereco = "insert into endereco (cep,logradouro,numero,bairro,cidade,estado,ibge) values ('".$cep."','".$rua."','".$numero."','".$bairro."','".$cidade_id."','".$estado."','".$ibge."');";
   }else{
     $endereco = "insert into endereco (cep,logradouro,numero,complemento,bairro,cidade,estado,ibge) values ('".$cep."','".$rua."','".$numero."','".$complemento."','".$bairro."','".$cidade_id."','".$estado."','".$ibge."');";
     }
  //  echo $endereco. "</br>";
    $rs_endereco=mysqli_query($conexao,$endereco);
//
    if($rs_endereco > 0){
//        echo "endereco ok";
        $id_endereco = mysqli_insert_id($conexao);
            $_SESSION['id_endereco']=$id_endereco;
if(empty($comprovante)){
  $sql_empresa = "insert into dados_empresa_usuario (nome_empresa,endereco_empresa,telefone_empresa,
                data_admissao,usuario) values ('".$nome_empresa."',".$id_endereco.",'".$telefone_empresa."','".$data_adm."',".$_SESSION['id_user'].")";
}else{

                $sql_empresa = "insert into dados_empresa_usuario (nome_empresa,endereco_empresa,telefone_empresa,
                data_admissao,usuario,comprovante) values ('".$nome_empresa."',".$id_endereco.",'".$telefone_empresa."','".$data_adm."',".$_SESSION['id_user'].",".$comprovante.")";
}
            //    echo $sql_empresa. "</br>";


                $rs_empresa=mysqli_query($conexao,$sql_empresa);
                if($rs_empresa > 0){
                     $id_empresa = mysqli_insert_id($conexao);
                       $_SESSION['id_empresa']=$id_empresa;
                       // echo $id_empresa."</br>";

if(empty($estado_nasc)){
 $sql_usuario=("update usuario set id_nacionalidade=".$nacionalidade.",cidade_nascimento=".$cidade_nasc.",nome_pai='".$nome_pai."',nome_mae='".$nome_mae."',id_identidade=".$identidade.",numero_id='".$n_id."',dt_emissao='".$dt_emissao."',dt_validade='".$dt_validade."',orgao_emissor=".$orgao_emissor.",uf_emissor=".$uf_emissor.",residencia=".$residencia.",reside_desde='".$reside_desde."',finalidade=".$finalidade.",dados_empresa=".$id_empresa." where id_usuario=".$_SESSION['id_user']);
}else{
                        $sql_usuario=("update usuario set id_nacionalidade=".$nacionalidade.",estado_nascimento=".$estado_nasc.",cidade_nascimento=".$cidade_nasc.",nome_pai='".$nome_pai."',nome_mae='".$nome_mae."',id_identidade=".$identidade.",numero_id='".$n_id."',dt_emissao='".$dt_emissao."',dt_validade='".$dt_validade."',orgao_emissor=".$orgao_emissor.",uf_emissor=".$uf_emissor.",residencia=".$residencia.",reside_desde='".$reside_desde."',finalidade=".$finalidade.",dados_empresa=".$id_empresa." where id_usuario=".$_SESSION['id_user']);
}


   //                 echo $sql_usuario;
                    $rs_usuario = mysqli_query($conexao,$sql_usuario);
                        if($rs_usuario > 0 ){
                               header('location:modal2.php');

                        }else{
                             header('location:modal2.php');
                        }
           }
        }
else{
    header('location:modal2.php');

                            
}



?>
