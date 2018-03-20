<?php
require_once('conexao.php');

    
$_SESSION['id_user'] ;

if(isset($_GET['fim'])){
//     echo "teste</br>";

//    //outros dados user


// //dados imovel user
    $valor_imovel = $_GET['valor'] ;
    $imovel= $_GET['imovel'];
    $documentacao= $_GET['documentacao'];
    //dados veiculo
    $marca= $_GET['marca'];
    $modelo= $_GET['modelo'];
    $financiado= $_GET['veiculo'];
   @$erro = "todos os campos são obrigatórios";
//   echo
//    $valor_imovel." valor imovel</br>",
//    $imovel."imovel </br>",
//    $documentacao." doc</br>",
//    $marca." marca</br>",
//    $modelo." modelo</br>",
//    $financiado." financiado?</br>";
    if(empty($valor_imovel or $imovel or $marca or $modelo or $financiado)){
        header('location:solicitacao_doc.php');
    }else if(empty($marca or $modelo)){
        header('location:solicitacao_doc.php');
    }
        
   $sql_imovel = "insert into dados_imovel_usuario (valor,financiado,documentacao,usuario)values('".$valor_imovel."',".$imovel.",
   ".$documentacao.",".$_SESSION['id_user'].")";
              //echo $sql_imovel. "</br>";
                $result = mysqli_query($conexao,$sql_imovel);
                if($result > 0){
                    $id_imovel = mysqli_insert_id($conexao); 
                       $_SESSION['id_imovel']=$id_imovel; 
                           $sql_veiculo = "insert into dados_veiculo_usuario (usuario,marca,modelo,financiado)values(".$_SESSION['id_user'].",".$marca.",".$modelo.",".$financiado.")";
//                           echo $sql_veiculo;
                            $veiculo= mysqli_query($conexao,$sql_veiculo);
                            if($veiculo >0){
                                 $id_veiculo = mysqli_insert_id($conexao); 
                                $_SESSION['id_veiculo']=$id_veiculo; 
                              $usuario = "update usuario set dados_imovel=".$id_imovel.",dados_veiculo=".$id_veiculo." where id_usuario=".$_SESSION['id_user'];
                               // echo $usuario;
                                $query = mysqli_query($conexao,$usuario);
                                if($query>0){
//                                    echo "cadastrado com sucesso!";
                                    header('location:solicitacao_doc.php');
                                }else{
                                    echo "ops";}
                            }
                    }else{
                     $sql_veiculo = "insert into dados_veiculo_usuario (usuario,marca,modelo,financiado)values(".$_SESSION['id_user'].",".$marca.",".$modelo.",".$financiado.")";
//                           echo $sql_veiculo;
                            $veiculo= mysqli_query($conexao,$sql_veiculo);
                            if($veiculo >0){
                                 $id_veiculo = mysqli_insert_id($conexao); 
                                $_SESSION['id_veiculo']=$id_veiculo; 
                              $usuario = "update usuario set dados_veiculo=".$id_veiculo." where id_usuario=".$_SESSION['id_user'];
                               // echo $usuario;
                                $query = mysqli_query($conexao,$usuario);
                                if($query>0){
//                                    echo "cadastrado com sucesso!";
                                    header('location:solicitacao_doc.php');
                                }else{
                                     echo "<SCRIPT type='text/javascript'> //not showing me this
                                    alert('$erro');
                                    window.location.replace(\"passo2.php\");
                                </SCRIPT>";  
                                }
                            }
                    
                }
}


?>