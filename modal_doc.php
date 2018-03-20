<?php
   // arquivo que contera a conexao com o banco	
    require_once('conexao.php');
    
//$id= "";
   $_SESSION['id_user'];
   $_SESSION['resposta_veiculo'];
   $_SESSION['resposta_imovel'];
    $porcentagem="90%";
if($_SESSION['resposta_veiculo'] == 2) {
//    echo "<code> Não</code>";
    
    ?> 
    <style>
        #veiculo{display: none; }
    </style>

<?php
} if($_SESSION['resposta_imovel'] == 2){
//    echo "<code> Não</code>";
    
     ?> 
    <style>
        #imovel{display: none; }
    </style>

<?php
}


?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        
          <style  type="text/css">
        .modal-content{width: 660px; padding-left: 10px;}
        .principal{width: 600px;}
        .azul{color: #5959ff;font-weight: bold;}
        .concluido{height: 100px !importante;}
              .imovel{display: flex;}
              .veiculo{display: flex;}
              .div_concluiu > h4{margin-top: 100px;}
             
              .btn{margin-top: 100px;}
    </style>
            <?php require_once('head2.html')?>
         
        
     
    </head>
    <body >
        <div class="container theme-showcase" role="main">
            <div class="page-header">
                <h1></h1>
            </div>
        </div>
        <div id="myModal" class="modal fade autocompleta" tabindex="-1" role="dialog" aria-labelledby="">
                                      <div class="modal-dialog modal-card" role="document" >
                                        <div class="modal-content row">
                                             <div class="concluiu" id="conclusao" style="width:100%;text-align:center;height:140px;">
                                                 <div class="div_conclui" > 
                                                     <div class="div_">
                                                         <div class="div_concluiu">
                                                              <?php 
                                                                $sql = "select * from usuario where id_usuario=". $_SESSION['id_user'].";";
                                                                $query = mysqli_query($conexao,$sql);
                                                                while($rs = mysqli_fetch_assoc($query)){

                                                                ?>
                                                             <?php echo "<h4>Pronto, ". $rs['nome_completo'] ."! agora é só aguardar nossa ligação!</h4>" ;?><br>

                                                             <br> 
                                                             <?php } ?>
                                                              <a href="index.php" class="btn btn-success btn-lg pull-right" type="button" id="fim" name="fim" >FIM</a>

                                                         </div>
                                                     </div>
                                                 </div>
                                                 <br>
                                             </div>
                                        </div>
                                    </div>


                        </div>
    
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
		
		<?php
			$situacao_usuario = "pendente";
			if($situacao_usuario == "pendente"){ ?>
				<script>
					$(document).ready(function(){
						$('#myModal').modal('show');
					});
				</script>
			<?php } ?>
        
   
           <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

    
    

   
    </body>
</html>

