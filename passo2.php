<?php
   // arquivo que contera a conexao com o banco
   require_once('conexao.php');

//$id= "";
  $_SESSION['id_user'] ;
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once('head2.html')?>
    <link rel="shortcut icon" href="img/favicon.png" />

     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br"/>

    <script>

      $(document).ready(function () {
          $('.nacionalidade').click(function () {
            var nacionalidade = $(this).val();
            var nome = $(this).attr('name');
            $('#area1').val(nacionalidade)
          });

          $('#estado').click(function () {
              var estado = $(this).val();
              var nome = $(this).attr('name');
              $('#area2').val(estado)
          });

          $('.cidade_id').click(function () {
              var cidade_id = $(this).val();
              var nome = $(this).attr('name');
               $('#area3').val(cidade_id)

          });
          $('#uf_emissor').click(function () {
              var uf_emissor = $(this).val();
              var nome = $(this).attr('name');
               $('#area4').val(uf_emissor)

          });

          $('#orgao_emissor').click(function () {
              var orgao_emissor = $(this).val();
              var nome = $(this).attr('name');
               $('#area5').val(orgao_emissor)

          });
          $('.residencia').click(function () {
              var residencia = $(this).val();
              var nome = $(this).attr('name');
               $('#area6').val(residencia)

          });

          $('.comprovante').click(function () {
              var comprovante = $(this).val();
              var nome = $(this).attr('name');
               $('#area8').val(comprovante)

          });

          $('#finalidade').click(function () {
              var finalidade = $(this).val();
              var nome = $(this).attr('name');
               $('#area9').val(finalidade)
          });
          $('#identidade').click(function () {
              var identidade = $(this).val();
              var nome = $(this).attr('name');
               $('#area10').val(identidade)
          });

      });
    </script>

      <style>
          .btn_dif {
            color: #fff;
            background-color: #092d4c;
        }

        .btn_dif:hover{
            background:  rgba(244,133,2,0.7) !important;
        }
        .btn-group-justified{
            display: block;

          }
          .active-month, .active-term {

            background:  rgba(244,133,2,0.7) !important;
        }
           .obri{background-color: #092d4c !important;}
          .form-control{width: 100%;}
          .right{margin-left: 700px;}
    </style>

    <!--    habilitar botao 1 passo 1-->
    <script type="text/javascript">
//        $(function(){
//          $('.nacionalidade' && '#estado' && '.cidade_id' && '#identidade' && '#orgao_emissor' && '#uf_emissor' && '#finalidade' && '.residencia'  ).click (function () {
//               $("#btn3").removeAttr('disabled');
//            });
//        });


      function valida() {
            // Fetching values from all input fields and storing them in variables.
            var nome = document.getElementById("cep").value;
            var email = document.getElementById("rua").value;
            var fone = document.getElementById("bairro").value;
            var mensagem = document.getElementById("uf").value;

//            var telefone = document.getElementById("telefone").value;
//            var data_adm = document.getElementById("data_adm").value;


            //Check input Fields Should not be blanks.
            if (nome == '' || email == '' || fone == '' || mensagem == '') {

                return false;
            }else{

                return true;
            }
        }
        function valida2() {
            // Fetching values from all input fields and storing them in variables.


            var telefone = document.getElementById("telefone").value;
            var data_adm = document.getElementById("data_adm").value;


            //Check input Fields Should not be blanks.
            if (telefone == '' || data_adm == '') {

                return false;
            }else{

                return true;
            }
        }

             $(document).ready(function () {

                   var comprovante = false;
                     $('.comprovante').on('click', function () {
                         valida();

                         if(valida() === true){

                              $(this).removeClass('obri');
                             comprovante = true;


                         }else{
                              alert("Preencha o endereço corretamente");
                             $(this).addClass('obri');

                         }


                    });




                 $('#fim').on('click', function () {


                    if(valida2() && valida() === true){




                         }else{
                              alert("Preencha todos os campos");

                         }

                 });

             });


//          else{
//
//                document.form_passo2.submit();
//            }

    </script>


      <script language="javascript">
       $(document).ready(function () {
             $("#btn3").prop('disabled',true);

           var valor_nacionalidade = false;
            $('.nacionalidade').on('click', function () {
                valor_nacionalidade = true;
            });
           var estado = false;
            $('#estado').on('click', function (){
                estado = true;
                if(valor_nacionalidade == false){
                    alert ('Nacionalidade é obrigaório');

                }

//                if(valor_genero === true){
////                    $("#btn1").removeAttr('disabled');
//                    alert('genero ok ');
//                }
            });
           var cidade = false;
           $('.cidade_id').on('click',function(){
               cidade = true;

//                if(estado === true){
//                    alert('estado ok')
//                };
          });
           var identidade = false;
            $('#identidade').on('click', function () {
                identidade = true;
                if(estado == false){
                    alert('Escolha o estado');

                }

            });
            var orgao = false;
            $('#orgao_emissor').on('click', function () {
                orgao = true;
                if(identidade == false){
                    alert(' identidade é obrigatório');
                }


            });
           var uf_emissor = false;
           $('#uf_emissor').on('click', function(){
              uf_emissor = true;
               if(orgao == false){
                   alert('Orgão emissor é obrigatório');
               }

           });
           var residencia = false;
           $('.residencia').on('click', function(){

               if(uf_emissor == false){
                   alert(' Uf emissor é obrigatório');
                    $(this).addClass('obri');
               }
               if(uf_emissor === true){
                      $(this).removeClass('obri');
                     residencia = true;
               }



           });
           var finalidade = false;
           $('#finalidade').on('click', function(){

               if(residencia == false){
                   alert('tipo de residência?');
                } if(residencia === true){
                  finalidade = true;
                }

                if(valor_nacionalidade && estado && cidade && identidade && orgao && uf_emissor && finalidade && residencia  === true){
                      $("#btn3").prop('disabled',false);
//                    alert('ok ');

                }


           });






        });
    </script>

    <!--    habilitar finalizar -->
    <script type="text/javascript">
//        $(function(){
//          $('.comprovante' && '#data_adm'  ).click (function () {
//               $("#fim").removeAttr('disabled');
//            });
//        });
    </script>
<body style="margin:0;">

<div class="container" >
    <div class="price-box" >
        <div class="row">
        </div>
          <div class="container" >
               <a  type="button" class="btn btn_instituicoes"
                  >Temos 3 instituições disponiveis<br> pra você <br><img src="img/ibi.png"> <img src="img/pernambucanas.png"> <img src="img/marisa.png">
              </a>
                 <hr>

              <form method="post" name="form_passo2" action="cadastro.php" enctype="multipart/form-data" accept-charset="UTF-8">
                    <div class="row setup-content" id="step-1" >
                        <div class="concluido">
                        <img src="img/logo.png">
                         <div class="concluiu response" id="conclusao">
                             <div class="div_conclui">
                                 <div class="div_">
                                     <div class="div_concluiu">
                                         Você concluiu <br><span class="porcentage">70%</span>
                                         <br> <span class="pequeno">do seu cadastro</span>
                                     </div>

                                 </div>

                             </div>

                             <br>

                         </div>
                    </div>
                        <div class="col-xs-12">

                        <textarea style="display:none" id="area1" name="nacionalidade"></textarea>
                        <textarea  style="display:none" id="area2" name="estado_id"></textarea>
                        <textarea  style="display:none" id="area3" name="cidade_id"></textarea>
                        <textarea  style="display:none" id="area4" name="uf_emissor"></textarea>
                        <textarea style="display:none"  id="area5" name="orgao_emissor"></textarea>
                        <textarea  style="display:none" id="area6" name="residencia"></textarea>
                        <textarea  style="display:none" id="area10" name="identidade"></textarea>
                        <textarea  style="display:none" id="area9" name="finalidade"></textarea>

                            <div class="col-md-12">
                                 <div class="col-sm-6 para-lado" style="width: 100%" >

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
                                 <div class="form-group row" >
                                      <label class="control-label">Qual sua nacionalidade:</label>
                                </div>
                                <div class="form-group" style="display: flex;" >
                                    <?php
                                        $sql = "select * from nacionalidade";
                                        $resul = mysqli_query($conexao,$sql);
                                        while( $rs = mysqli_fetch_assoc($resul)){
                                    ?>
                                        <div class="btn-group btn-group-justified" >
                                          <div class="btn-group btn-group-lg ">
                                            <button  type="button" class="form-control btn_dif btn-primary month nacionalidade" value="<?php echo $rs['id_nacionalidade'] ?>"  id='nacionalidade' name="nacionalidade"  ><?php echo $rs['nacionalidade'] ?></button>
                                          </div>
                                        </div>
                                    <?php }?>
                                </div>
                                <div class="form-group row" >
                                      <label class="control-label">Em Qual estado você nasceu?</label>
                                </div>
                                 <div class="form-group" >

                                      <select  class="form-control" id="estado" name="estado" >
                                          <?php $estado = $_POST['uf'] ;?>

                                          <option value="<?php echo $rows['id']?>" selected="selected">Selecione um Estado</option>
                                         <?php
                                          require_once('conexao.php');
                                           $query = "select estado.id, estado.uf from estado as estado;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option value= "<?php echo($rows['id']);?>"
                                            <?php echo ($result == $rows['id'])? "selected" : ""; ?>>
                                            <?php
                                               echo utf8_decode($rows['uf']);
                                             ?>

                                           <?php } ?>

                                     </select>
                                </div>

                                 <div class="form-group row" >
                                      <label class="control-label">Em Qual cidade você nasceu?</label>

                                </div>

                                    <div class="form-group" >
<!--                               aqui sera carregada as cidade, de acordo com o estado selecionado-->
                                        <div class="cidade_id"></div>
                                    </div>
                                <div class="form-group">
                                    <label class="control-label">Nome completo da sua mãe:</label>
                                    <input  maxlength="100" type="text" name="nome_mae" class="form-control" placeholder="Maria da Silva"  />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nome completo do seu pai:</label>
                                    <input maxlength="100" type="text" name="nome_pai"class="form-control" placeholder="João da Silva" />
                                </div>

                                     <div class="form-group row" >
                                      <label class="control-label">Qual o tipo da sua identidade?</label>
                                    </div>
                                     <div class="form-group" >

                                      <select  class="form-control" id="identidade" name="identidade" >

                                          <option value="" selected="selected">Selecione</option>
                                         <?php
                                          require_once('conexao.php');
                                           $query = "
                                           select distinct identidade.id_identidade as id , tipo.tipo_identidade as identidade from tipo_identidade as identidade
                                            inner join identidade as tipo
                                            on identidade.id_identidade = tipo.id_identidade;";

                                          $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result)){
                                          ?>
                                         <option value= "<?php echo($rows['id']);?>"
                                            <?php echo ($result == $rows['id'])? "selected" : ""; ?>>
                                            <?php
                                               echo utf8_decode($rows['identidade']);
                                             ?>

                                           <?php } ?>

                                     </select>
                                    </div>
                                       <div class="form-group">
                                    <label class="control-label">Digite o número da sua identidade:</label>
                                    <input maxlength="15" size="15" type="text" name="n_id"class="form-control" placeholder="" />
                                </div>
                                     <div class="form-group">
                                        <label class="control-label">Data de emissão</label>
                                        <input type="text" name="dt_emissao" class="form-control" placeholder="01/01/2018"  onkeypress="mascaraData( this, event )" size="11" maxlength="10" />
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label">Data de validade</label>
                                        <input  type="text" name="dt_validade"class="form-control" placeholder="01/01/2018"  onkeypress="mascaraData( this, event )" size="11" maxlength="10" />
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label">Orgão emissor:</label>
                                    </div>
                                    <div class="form-group" >

                                          <select class="form-control" id="orgao_emissor" name="orgao_emissor">
                                                <option value="" selected="selected">Selecione</option>
                                         <?php

                                           $query = "select * from orgao_emissor;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option value="<?php echo $rows ['id_orgao_emissor']?>">
                                            <?php echo $rows['orgao_emissor']?>
                                    </option>
                                             <?php } ?>
                                         </select>
                                    </div>

                                     <div class="form-group row" >
                                      <label class="control-label">UF emissor:</label>
                                    </div>
                                     <div class="form-group" >

                                          <select    class="form-control" id="uf_emissor" name="uf_emissor">
                                               <option value="<?php echo $rows['id']?>" selected="selected">Selecione um Estado</option>
                                         <?php
                                          require_once('conexao.php');
                                           $query = "select estado.id, estado.uf from estado as estado;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option value= "<?php echo($rows['id']);?>"
                                            <?php echo ($result == $rows['id'])? "selected" : ""; ?>>
                                            <?php
                                               echo utf8_decode($rows['uf']);
                                             ?>

                                           <?php } ?>
                                         </select>
                                    </div>
                                     <div class="form-group row">
                                      <label class="control-label">Tipo de residência</label>
                                    </div>
                                    <div class="form-group" >
                                        <div class="btn-group btn-group-justified">
                                             <?php
                                               $query = "select * from tipo_residencia where id_tipo_residencia = 1 or id_tipo_residencia = 2;";
                                               $result = mysqli_query($conexao,$query);
                                               while ($rows = mysqli_fetch_array($result)){
                                              ?>
                                          <div class="btn-group btn-group-lg">
    <!--                                          active-month selected-month-->
                                            <button type="button"  class="form-control btn_dif  btn-primary term residencia" id='residencia' name="residencia" value="<?php echo $rows ['id_tipo_residencia'];?>">
                                                <?php echo $rows['tipo_residencia'];?> </button>
                                          </div>
                                         <?php } ?>
                                         <div class="btn-group btn-group-lg">
                                             <select  class="form-control  residencia btn_dif btn-primary term" id="outro" name="outro">
                                                <option value="" selected>Outro</option>
                                              <?php
                                   $query = "select * from tipo_residencia where id_tipo_residencia >= 3;";
                                   $result = mysqli_query($conexao,$query);
                                   while ($rows = mysqli_fetch_array($result)){
                                  ?>
                                    <option value="<?php echo $rows ['id_tipo_residencia']?>">
                                    <?php echo $rows['tipo_residencia']?></option>
                                     <?php } ?>
                                            </select>
                                        </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label">Reside no endereço desde:</label>
                                        <input type="text" name="reside_desde"class="form-control" placeholder="01/01/2018"  onkeypress="mascaraData( this, event )" size="11" maxlength="10"/>
                                    </div>
                                       <div class="form-group row" >
                                      <label class="control-label">Qual a finalidade do empréstimo?</label>
                                    </div>
                                     <div class="form-group" >

                                          <select    class="form-control" id="finalidade" name="finalidade">
                                                 <option value="" selected="selected">Selecione</option>
                                         <?php

                                           $query = "select * from finalidade;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option value="<?php echo $rows ['id_finalidade']?>">
                                            <?php echo $rows['finalidade']?></option>
                                             <?php } ?>
                                         </select>
                                    </div>


                                     <button class="btn btn-primary nextBtn btn-lg pull-right"  id="btn3" type="button" >Next</button>
                                      </div>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-2">
                        <div class="concluido">
                        <img src="img/logo.png">
                         <div class="concluiu response" id="conclusao">
                             <div class="div_conclui">
                                 <div class="div_">
                                     <div class="div_concluiu">
                                         Você concluiu <br><span class="porcentage">80%</span>
                                         <br> <span class="pequeno">do seu cadastro</span>>>>
                                     </div>

                                 </div>

                             </div>

                             <br>

                         </div>
                    </div>
                        <div class="col-xs-12">
                             <textarea style="display:none" id="area8" name="comprovante"></textarea>

                            <div class="col-md-12 para-lado" >
                                <div class="form-group row ">
                                    <label class="control-label">Empresa ou orgão onde trabalha</label>
                                    <input    class="form-control" placeholder="Nome da empresa" id="nome_empresa" name="nome_empresa" size="12" maxlength="100"
                                          />
                                </div>
                                  <div class="form-group row">
                                       <form method="get" action=".">
                                    <label class="control-label" >Cep:
                                    <input name="cep"  class="form-control" type="text" id="cep" value="" maxlength="9" /></label><br />
                                     <div class="form-group">
                                         <label class="control-label">Rua:</label>
                                         <label class="control-label numero">Número:</label>
                                     </div>
                                     <div class="form-group" style="display:flex">
                                        <input name="rua"   class="form-control"  type="text" id="rua" size="60" style="width:70%"/>

                                        <input name="numero"  class="form-control" type="text" id="numero"  onKeyPress="return Apenas_Numeros(event);" style="width:20%;margin-left:50px;"/>
                                    </div>
                                     <div class="form-group">
                                         <label class="control-label">Complemento:</label>
                                         <label class="control-label margin500 bairro" >Bairro:</label>
                                     </div>
                                     <div class="form-group" style="display:flex">
                                        <input name="complemento"   class="form-control" type="text" id="complemento" size="60" style="width:40%"/>

                                        <input name="bairro"   class="form-control margin160" type="text" id="bairro"   style="width:40%;"/>
                                    </div>
                                    <div class="form-group">
                                         <label class="control-label">Cidade:</label>
                                         <label class="control-label estado_label" >Estado:</label>
                                     </div>
                                     <div class="form-group" style="display:flex">
                                        <input name="cidade"   class="form-control" type="text" id="cidade" size="40" style="width:50%" required/>

                                        <input name="estado"   class="form-control margin50" type="text" id="uf" size="2"   onKeyPress="return Apenas_Numeros(event);" style="width:20%;"/>
                                    </div>

                                    <label class="control-label">IBGE:
                                    <input name="ibge"  class="form-control"type="text" id="ibge" size="8" /></label><br />



                                </form>
                                    </div>
                <!--                required="required" -->
                                <div class="form-group row" >
                                      <label class="control-label">Comprovante de Renda</label>
                                </div>
                                <div class="form-group" style="display: flex">

                                        <div class="btn-group btn-group-justified">

                                              <?php
                                               $query = "select * from comprovante where id_comprovante = 1 or id_comprovante = 2;";
                                               $result = mysqli_query($conexao,$query);
                                               while ($rows = mysqli_fetch_array($result)){
                                              ?>
                                          <div class="btn-group btn-group-lg">
                                            <button  style="width:80%;" onclick="showDiv()" type="button" class="form-control btn_dif btn-primary cheque comprovante"  id='comprovante' value="<?php echo $rows ['id_comprovante']?>"><?php echo $rows['comprovante']?></button>
                                          </div>

                                           <?php } ?>
                                            <div class="btn-group btn-group-lg">
                                             <select  class="form-control comprovante  btn_dif btn-primary" id="outro_comprovante" name="outro_comprovante" onchange="ChamarLink();">
                                                <option value="" selected>Outro</option>
                                                <?php
                                                   $query = "select * from comprovante where id_comprovante>= 3;";
                                                   $result = mysqli_query($conexao,$query);
                                                   while ($rows = mysqli_fetch_array($result)){
                                                  ?>
                                                    <option value="<?php echo $rows ['id_comprovante']?>">
                                                    <?php echo $rows['comprovante']?></option>
                                                     <?php } ?>
                                            </select>
                                        </div>

                                        </div>

                                </div>

                                <div class="form-group">
                                     <div style="display:none" id="receberInput"> <input name="fleFoto" type="file"> </div>
                                </div>
                                <div class="form-group row">
                                <label class="control-label">Telefone</label>
                                <input class="form-control telefone"  required name="telefone" type="text" id="telefone" maxLength="10" size="10" />
                                </div>
                                 <div class="form-group responsivo  row"  >
                                    <label class="control-label">Data de Admissão:</label>
                                      <input class="form-control" placeholder="Formato: 00/00/0000" required id="data_adm" name="data_adm"
                                           onkeypress="mascaraData( this, event )" size="11" maxlength="10"/>
                                </div>

                                <button  class="btn btn-success btn-lg pull-right"  type="submit" id="fim" name="fim" >

                                   Finalizar
                                </button>
                                </div>
                            </div>
                    </div>




             </form>
            </div>

        </div>
        <div class="stepwizard" >
        <div class="    stepwizard-row setup-panel">
            <div class="stepwizard-step">
               <a href="#step-1" type="button"  class="btn btn_instituicoes btn-primary" >
                    <img style="width:15px;" src="img/cadastro.png">
                    <strong>Passo 1</strong><br>
                    Complete suas informações pessoais.<br>
                        <span class="pequeno">Quanto mais completo seu cadastro, <br> mais opções de empréstimo você recebe</span>
                </a>
                <hr>
                <br>
            </div>
            <div class="stepwizard-step">

                <a href="#step-2" type="button"  class="btn btn_instituicoes btn-default" disabled="disabled">
                     <strong>Passo 2</strong><br>
                    Conte um pouco sobre sua Profissão.<br>
                    <span class="pequeno">Essas informações adicionais são solicitadas <br> pelos nossos parceiros</span>
			</a>
                <hr>
            </div>
            <div class="stepwizard-step">
                 <a href="#step-3" type="button"   class="btn btn_instituicoes btn-default" disabled="disabled">
                     <strong>Passo 3</strong><br>
                    Agora fale sobre o seu imóvel e veículo.<br>
                    <span class="pequeno">Utilizando seu imóvel e veículo como garantia,<br> você consegue taxas mais 			atrativas.</span>
                </a>
                <hr>
            </div>
        </div>
    </div>

</div>

 <style type="text/css">

     @media(max-device-width:600px){


         .concluido{
             height: 200px;
             margin: 0px;
             width: 100 %;
         }
         .container{padding: 0px !important;}
         .para-lado{
             margin: 0px;
         }
         .btn_instituicoes{font-size: 15px;}
     }

    .modelo_veiculo {
    margin-left: 365px;
}
.tomato {
    background-color:coral;
    padding:40px;
    font-family:Verdana;
}

</style>

     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>



<!--
    <script>

    $("#brasileira").click(function(){
    $("#brasileira").addClass("red");
    $("#estrangeiro").removeClass("red");


});
          $("#estrangeiro").click(function(){
            $("#estrangeiro").addClass("red");
            $("#brasileira").removeClass("red");

});
    </script>
-->

<?php require_once('js/script.php')?>


</body>
</html>
