
<?php

//mysql_connect('localhost','root','root');
$conexao= mysqli_connect('autosisconsultasmsdev.ctds4qm6ip9q.us-east-1.rds.amazonaws.com','midia100','Midia1001');
mysqli_select_db($conexao,  'db_credito_voce');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
session_start();
$id_estado = $_GET['estado'];
//echo $id_estado;


$sql = "select cidade.id, cidade.nome as nome from cidade as cidade inner join estado = estado on
estado.id = cidade.estado where estado.id = '$id_estado' ORDER BY cidade.nome";
//echo $sql;
$rs = mysqli_query($conexao,$sql);
echo "<label></label><select class='form-control cidade_id' name='cidade_id'>";
while($reg = mysqli_fetch_object($rs)){
    echo "<option value='$reg->id'>$reg->nome</option>n";
}
echo "</select>";
//while($result = mysqli_fetch_array($rs)){
//       $_SESSION['idcidade'] = $result['id']."</br>";
//  echo  $_SESSION['idcidade'];
//
//}
?>
