

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
          <style  type="text/css">
        .modal-content{width: 600px; text-align: center;}
        .principal{width: 600px;}
        .azul{color: #5959ff;font-weight: bold;}
        .principal_ibi{width: 500px;margin-left: 20px;color: black;}
              .section.orange p{color: black;}

    </style>
    </head>
    <body>
        <div class="container theme-showcase" role="main">
            <div class="page-header">
                <h1></h1>
            </div>
        </div>


        
    <div id="myModal" class="modal fade autocompleta" tabindex="-1" role="dialog" aria-labelledby="">
      <div class="modal-dialog modal-sm modal-card" role="document" >
        <div class="modal-content row">
        <h3>Legal!</h3>

          <div class="conteudoModal" >
            <div class="col-lg-5 col-md-8 principal">
                    <p class="azul"> Para dar continuidade em sua análise de crédito, continue o cadastramento online.</p><br>
                <img width="50px;" src="img/sucess.ico"><br><br>
                    <a class="btn btn-success btn-lg " type="submit" style="text-transform: uppercase;" href="passo2.php"> Seguir para próxima fase agora</a><br><br>
                    <p class="azul" style="text-transform: uppercase;">É de graça e sem nenhum compromisso</p>
            </div>
          </div>
        </div>
    </div>
      
    
    </div> 
        
        <div id="myModal" class="modal fade ibi" tabindex="-1" role="dialog" aria-labelledby="">
      <div class="modal-dialog modal-sm modal-card" role="document" >
        <div class="modal-content ">
      
            <div class="conteudoModal" >
            <div class="col-lg-5 col-md-8 principal_ibi">
                   
                   
                <p>
                Para garantir a credibilidade de nossos serviços, contamos com a solidez da  <strong class="azul">IBI</strong> <p>promotora, com sua experiência de mais de 20 anos e mais de 2 milhões de clientes.
Em se tratando de serviços financeiros, é da maior relevância ter como referência instituições financeiras fortes e confiáveis, para adquirir produtos como empréstimos pessoais e crédito consignado.
Em parceria com a IBI oferecemos produtos e serviços de confiança para um relacionamento transparente e seguro com nossos clientes.
                
            </div>
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
    </body>
</html>
