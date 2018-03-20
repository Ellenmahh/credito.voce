
<?php
 session_start();


//        $conexao = mysqli_connect("127.0.0.1", "root", "root", "db_credito_voce");
//    $conexao = mysqli_connect("127.0.0.1", "root", "961301", "db_credito_voce");
$conexao= mysqli_connect('autosisconsultasmsdev.ctds4qm6ip9q.us-east-1.rds.amazonaws.com','midia100','Midia1001');
mysqli_select_db($conexao,  'db_credito_voce');

mysqli_query($conexao,"SET NAMES 'utf8'");
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');
mysqli_query($conexao,'SET character_set_results=utf8');
    if (!$conexao) {
        echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

//    echo "Sucesso: Sucesso ao conectar-se com a base de dados MySQL." . PHP_EOL;

?>
