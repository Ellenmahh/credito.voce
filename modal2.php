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

    </style>
            <?php require_once('head2.html')?>
         
        
        <script>
        
      $(document).ready(function () {
         
           $('.imovel_clic').click(function () {
              var imovel = $(this).val();
              var nome = $(this).attr('name');
               $('#area9').val(imovel)
              
          }); 
          $('.documentacao').click(function () {
              var documentacao = $(this).val();
              var nome = $(this).attr('name');
               $('#area10').val(documentacao)
              
          });  
          $('#marca').click(function () {
              var marca = $(this).val();
              var nome = $(this).attr('name');
               $('#area11').val(marca)
              
          });
           $('#modelo').click(function () {
              var modelo = $(this).val();
              var nome = $(this).attr('name');
               $('#area12').val(modelo)
              
          }); 
          $('.veiculo_clic').click(function () {
              var veiculo = $(this).val();
              var nome = $(this).attr('name');
               $('#area13').val(veiculo) 
          }); 
      });
    </script>
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
     
                     
                         <div class="concluiu" id="conclusao" style="width:50%;text-align:center">
                             <div class="div_conclui" > 
                                 <div class="div_">
                                     <div class="div_concluiu">
                                          <?php 
                                            $sql = "select * from usuario where id_usuario=". $_SESSION['id_user'].";";
                                            $query = mysqli_query($conexao,$sql);
                                            while($rs = mysqli_fetch_assoc($query)){

                                            ?>
                                         <?php echo "Olá, ". $rs['nome_completo'] ."! você concluiu" ;?>
                                         
                                         <span class="porcentage">
                                         <?php echo $porcentagem ?>
                                         
                                         </span> 
                                         
                                         <br> <span class="pequeno">do seu cadastro</span>
                                         <?php } ?>
                                     </div>

                                 </div>

                             </div>

                             <br>

                         </div>
                  

          <div class="conteudoModal" >
                 <div class="row setup-content" id="step-3" >
                        <form method="get" action="form_passo3.php" name="form_passo3"> 
                        <div class="col-xs-12">
                              <textarea  style="display:none" id="area9"  name="imovel"></textarea>
                              <textarea  style="display:none" id="area10" name="documentacao"></textarea>
                              <textarea  style="display:none" id="area11" name="marca"></textarea>
                              <textarea  style="display:none" id="area12" name="modelo"></textarea>
                              <textarea  style="display:none" id="area13" name="veiculo"></textarea>
                              <textarea  style="display:none" id="area14" name="valor"></textarea>
                            <div class="col-md-12">
                                <!-- imovel -->
                               <h3 id="imovel">Dados do imóvel</h3><br>
                             
                                 <div class="form-group responsivo " id="imovel" >
                                    <label class="control-label" >Qual valor do imóvel?</label>
                                    <input style="width:85%;" maxlength="200" type="text"  id="valor" name="valor" class="form-control" placeholder=""  size="20" onKeydown="Formata(this,20,event,2)"/>
                                    <span class="input-group-addon renda" >,00</span>
                                </div>
                                <div class="form-group row " id="imovel" >
                                    <label class="control-label">Seu imóvel está financiado?</label>
                                </div>
                                 <div class="form-group imovel" id="imovel">
                                    <div class="btn-group btn-group-justified" >
                                        <?php $query = "select * from resposta";
                                    $result = mysqli_query($conexao,$query);
                                    while($rows = mysqli_fetch_array($result)){
                                    ?>
                                      <div class="btn-group btn-group-lg" id="imovel">
                                        <button type="button" name="imovel" style="width:80%;" class="form-control  btn-primary imovel_clic" id="imovel"  value="<?php echo $rows['id_resposta'] ?>">
                                            <?php echo $rows ['resposta'] ?>
                                          </button>
                                      </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                 <div class="form-group row imovel" id="imovel">
                                    <label class="control-label">A documentação do imóvel está ok?</label>

                                </div>
                                 <div class="form-group imovel" id="imovel">
                                    <div class="btn-group btn-group-justified" >
                                        <?php $query = "select * from resposta";
                                    $result = mysqli_query($conexao,$query);
                                    while($rows = mysqli_fetch_array($result)){
                                    ?>
                                      <div class="btn-group btn-group-lg">
                                        <button  style="width:80%;" type="button" class="form-control  btn-primary  month documentacao" id="documentacao" value="<?php echo $rows['id_resposta'] ?>"  name="documentacao" ><?php echo $rows ['resposta'] ?></button>
                                      </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                
                                   <!-- finish imovel -->
                                
                                   <!-- dados veiculo -->
                                <h3 id="veiculo">Dados do veículo</h3><br>
                                  <div class="form-group row " id="veiculo">
<!--                                    <label class="control-label">Qual o ano do seu                                                veículo?</label>-->
                                    
                                      <label class="control-label">Qual o marca do seu veículo?</label>
                                      <label class="control-label modelo_veiculo">Qual a modelo do seu veículo?</label>

                                </div>
                                 <div class="form-group veiculo" id="veiculo">

                                        <div class="btn-group btn-group-justified" id="veiculo">
                                         <div class="btn-group btn-group-lg term">
                                             <select  class="form-control  marca " id="marca" name="marca">
                                               <?php $marca = $_POST['id_marca_veiculo'] ;?>
                                          
                                          <option value="<?php echo $rows['id_marca_veiculo']?>" selected="selected">Selecione</option>
                                         <?php
                                          require_once('conexao.php');
                                           $query = "SELECT * FROM marca_veiculo;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option value= "<?php echo($rows['id_marca_veiculo']);?>"
                                            <?php echo ($result == $rows['id_marca_veiculo'])? "selected" : ""; ?>>
                                            <?php 
                                               echo utf8_decode($rows['marca_veiculo']);
                                             ?>
                                                
                                           <?php } ?>
                                            </select>
                                        </div>

                                        <div class="btn-group btn-group-lg row" id="veiculo">
                                         <div class="modelo" id="modelo" id="veiculo">
                                              
                                        </div>
                                        </div>


                                        </div>
                                </div>

                                 <div class="form-group row " id="veiculo">
                                    <label class="control-label">Seu veículo está financiado?</label>

                                </div>
                                 <div class="form-group veiculo" id="veiculo">
      
                                    <div class="btn-group btn-group-justified" >
                                        <?php $query = "select * from resposta";
                                    $result = mysqli_query($conexao,$query);
                                    while($rows = mysqli_fetch_array($result)){
                                    ?>
                                      <div class="btn-group btn-group-lg">
                                        <button  name="veiculo" style="width:80%;" type="button" class="form-control  btn-primary  cheque veiculo_clic" id="veiculo"  value="<?php echo $rows['id_resposta'] ?>"><?php echo $rows ['resposta'] ?></button>
                                      </div>
                                        <?php } ?>
                                    </div>
                                </div>
                               
                            </div>
                            
                                <button  class="btn btn-success btn-lg pull-right" type="submit" id="fim" name="fim"onclick="document.form_passo3.submit();">
                                   
                                   Finalizar
                                </button>
                                 
                        </div>
                            </form>
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
        
    <script>
    
    jQuery("input.telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });
    
    </script>
           <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

    <script type="text/javascript">


$(document).ready(function() {

    $("#total").val("10000");
    $("#slider_amirol").slider({
        range: "min",
        animate: true,

        min: 0,
        max: 28,
        step: 1,
        slide:
            function(event, ui)
            {
                update(1,ui.value); //changed
                calcualtePrice(ui.value);
            }
    });

    $('.month').on('click',function(event) {
        var id = $(this).attr('id');

        $('.month').removeClass('selected-month');
        $(this).addClass('selected-month');
        $(".month").removeClass("active-month");
        $(this).addClass("active-month");

        $('#month').val(id);

        calcualtePrice()
    });
    $('.term').on('click',function(event) {
        var id = $(this).attr('id');

        $('.term').removeClass('selected-term');
        $(this).addClass('selected-term');
        $(".term").removeClass("active-term");
        $(this).addClass("active-term");
        $('#term').val(id);

        calcualtePrice()
    }); 
    $('.cheque').on('click',function(event) {
        var id = $(this).attr('id');

        $('.cheque').removeClass('selected-term');
        $(this).addClass('selected-term');
        $(".cheque").removeClass("active-term");
        $(this).addClass("active-term");
        $('#cheque').val(id);

        calcualtePrice()
    });
    $('.restricao').on('click',function(event) {
        var id = $(this).attr('id');

        $('.restricao').removeClass('selected-term');
        $(this).addClass('selected-term');
        $(".restricao").removeClass("active-term");
        $(this).addClass("active-term");
        $('#restricao').val(id);

        calcualtePrice()
    });
     $('.veiculo_clic').on('click',function(event) {
        var id = $(this).attr('id');

        $('.veiculo_clic').removeClass('selected-term');
        $(this).addClass('selected-term');
        $(".veiculo_clic").removeClass("active-term");
        $(this).addClass("active-term");
        $('#veiculo').val(id);

        calcualtePrice()
    });
     $('.imovel_clic').on('click',function(event) {
        var id = $(this).attr('id');

        $('.imovel').removeClass('selected-term');
        $(this).addClass('selected-term');
        $(".imovel").removeClass("active-term");
        $(this).addClass("active-term");
        $('#imovel').val(id);

        calcualtePrice()
    });

    update();
    calcualtePrice();
});




</script>
    
<script>
        function Limpar(valor, validos) {
// retira caracteres invalidos da string
var result = "";
var aux;
for (var i=0; i < valor.length; i++) {
aux = validos.indexOf(valor.substring(i, i+1));
if (aux>=0) {
result += aux;
}
}
return result;
}

//Formata número tipo moeda usando o evento onKeyDown

function Formata(campo,tammax,teclapres,decimal) {
var tecla = teclapres.keyCode;
vr = Limpar(campo.value,"0123456789");
tam = vr.length;
dec=decimal

if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }

if (tecla == 8 )
{ tam = tam - 1 ; }

if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 )
{

if ( tam <= dec )
{ campo.value = vr ; }

if ( (tam > dec) && (tam <= 5) ){
campo.value = vr.substr( 0, tam - 2 ) + "," + vr.substr( tam - dec, tam ) ; }
if ( (tam >= 6) && (tam <= 8) ){
campo.value = vr.substr( 0, tam - 5 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ;
}
if ( (tam >= 9) && (tam <= 11) ){
campo.value = vr.substr( 0, tam - 8 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; }
if ( (tam >= 12) && (tam <= 14) ){
campo.value = vr.substr( 0, tam - 11 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; }
if ( (tam >= 15) && (tam <= 17) ){
campo.value = vr.substr( 0, tam - 14 ) + "." + vr.substr( tam - 14, 3 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - 2, tam ) ;}
}

}

    </script>
   
    </body>
</html>
