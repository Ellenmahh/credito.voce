
<?php
$conexao= mysqli_connect('autosisconsultasmsdev.ctds4qm6ip9q.us-east-1.rds.amazonaws.com','midia100','Midia1001');
mysqli_select_db($conexao,  'db_credito_voce');
mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
$marca = $_GET['marca_veiculo'];
//echo $marca;
$sql = "select  modelo.idmodelo_veiculo as idmodelo,modelo.modelo as modelo, marca.marca_veiculo as marca from modelo_veiculo as modelo inner join marca_veiculo as marca
on modelo.id_marca_veiculo = marca.id_marca_veiculo where marca.id_marca_veiculo  like '%$marca%';";
//echo $sql;
$rs = mysqli_query($conexao,$sql);


echo "<label></label><select class='form-control modelo' name='modelo'>";
while($reg = mysqli_fetch_object($rs)){
    echo "<option value='$reg->idmodelo'>

    $reg->modelo</option>n";

}
echo "</select>";


?>
