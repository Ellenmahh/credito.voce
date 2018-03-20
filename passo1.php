<?php
    require_once('conexao.php');
header('Content-type: text/html; charset=iso-8859-1');
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br"/>

    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <link rel="shortcut icon" href="img/favicon.png" />
    <title>CRÉDITO.VC</title>

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel=stylesheet  type="text/css" href="css/import.css">
    <script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


    <script language="Javascript"> </script>
    <script language="Javascript">
    function validacaoEmail(field) {
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);

    if ((usuario.length >=1) &&
        (dominio.length >=3) &&
        (usuario.search("@")==-1) &&
        (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) &&
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&
        (dominio.indexOf(".") >=1)&&
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
    document.getElementById("msgemail").innerHTML="E-mail válido";

    }
    else{
    document.getElementById("msgemail").innerHTML="<font color='red'>E-mail inválido </font>";
    alert("E-mail invalido");
    }
    }
    </script>
    <style>
        .btn-primary {
            color: #fff;
            background-color: #092d4c;
        }
        .btn-primary:hover{background:  rgba(244,133,2,0.7) !important;}
         h4.great{ background:  rgba(244,133,2,0.7) !important;}
        .active-month, .active-term {    background:  rgba(244,133,2,0.7) !important;}
        .btn-group-justified{display: block;}
        .obri{background-color: #092d4c !important;}
        .navbar-inner {
  min-height: 40px;
  padding-right: 20px;
  padding-left: 20px;
  background-color: #fafafa;
  background-image: -moz-linear-gradient(top, #ffffff, #f2f2f2);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#f2f2f2));
  background-image: -webkit-linear-gradient(top, #ffffff, #f2f2f2);
  background-image: -o-linear-gradient(top, #ffffff, #f2f2f2);
  background-image: linear-gradient(to bottom, #ffffff, #f2f2f2);
  background-repeat: repeat-x;
  border: 1px solid #d4d4d4;
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#fff2f2f2', GradientType=0);
  *zoom: 1;
  -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
     -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
          box-shadow: 0 1px 4px rgba(0, 0, 0, 0.065);
}
    </style>
    <script>
  $(document).ready(function () {
      $('.valor').click(function () {
        var valor = $(this).val();
        var nome = $(this).attr('name');


        $('#area').val(valor)
      });

      $('.parcela').click(function () {
          var parcela = $(this).val();
          var nome = $(this).attr('name');
          $('#area2').val(parcela)
      });
      $('.estado_civil').click(function () {
          var estado_civil = $(this).val();
          var nome = $(this).attr('name');
           $('#area3').val(estado_civil)

      });
      $('.genero').click(function () {
          var genero = $(this).val();
          var nome = $(this).attr('name');
           $('#area4').val(genero)

      });
       $('.cheque').click(function () {
          var cheque = $(this).val();
          var nome = $(this).attr('name');
           $('#area5').val(cheque)

      });
       $('.restricao').click(function () {
          var restricao = $(this).val();
          var nome = $(this).attr('name');
           $('#area6').val(restricao)

      });
       $('.veiculo').click(function () {
          var veiculo = $(this).val();
          var nome = $(this).attr('name');
           $('#area7').val(veiculo)

      });
       $('.imovel').click(function () {
          var imovel = $(this).val();
          var nome = $(this).attr('name');
           $('#area8').val(imovel)

      });
  });
</script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
$("#form1").submit(function(){
  var email = $("#email").val();
  if(email != "")
  {
     var filtro = /^([w-]+(?:.[w-]+)*)@((?:[w-]+.)*w[w-]{0,66}).([a-z]{2,6}(?:.[a-z]{2})?)$/i;
     if(filtro.test(email))
     {

   return true;
     } else {
       alert("Este endereço de email não é válido!");
       return false;
     }
  } else {
 alert('Digite um email!'); return false;
  }
});
});
</script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<!--    habilitar botao 1 passo 1-->
    <script type="text/javascript">
//        $(function(){
//          $('.valor' && '   .parcela').click (function () {
//               $("#btn1").removeAttr('disabled');
//            });
//        });
        $(document).ready(function () {

        var status_valor = false;
            $('.valor').on('click', function () {
                status_valor = true;
            });

            $('.parcela').on('click', function ()
            {
                if(status_valor == false){
                    alert ('escolha um valor');
                   javascript:window.location='passo1.php';
                }
                if(status_valor === true)
                {
                    $("#btn1").removeAttr('disabled');
                }
            });
        });



    </script>
    <!--    habilitar botao 2 passo 2-->
    <script language="javascript">
       $(document).ready(function () {
             $("#btn2").prop('disabled',true);
           var valor_genero = false;
            $('.genero').on('click', function () {
                valor_genero = true;
            });
           var estado = false;
            $('.estado_civil').on('click', function (){
                estado = true;
                if(valor_genero == false){
                    alert ('escolha um genero');
                     $(this).addClass('obri');
                     $("#btn2").prop('disabled',true);

                }
                if(valor_genero === true){
                     $(this).removeClass('obri');
                }
//                if(valor_genero === true){
////                    $("#btn1").removeAttr('disabled');
//                    alert('genero ok ');
//                }
            });
           var profissao = false;
           $('#profissao').on('click',function(){
               profissao = true;
                if(estado == false){
                    alert('Estado Civil é obrigatório');


                };
//                if(estado === true){
//                    alert('estado ok')
//                };
          });
           var ocupacao = false;
            $('#ocupacao').on('click', function () {
                ocupacao = true;
                if(profissao == false){
                    alert('escolha profissao');

                }

            });
            var escolaridade = false;
            $('#escolaridade').on('click', function () {
                escolaridade = true;
                if(ocupacao == false){
                    alert('escolha sua ocupação');
                }


            });
           var conta_banco = false;
           $('#conta_banco').on('click', function(){
              conta_banco = true;
               if(escolaridade == false){
                   alert('o campo escolariade é obrigatório');
               }

           });
           var cheque = false;
           $('.cheque').on('click', function(){

               if(conta_banco == false){
                   alert('selecione uma sua conta');
                     $(this).addClass('obri');
               }
               if(conta_banco === true){
                    $(this).removeClass('obri');
                    cheque = true;
               }


           });
           var restricao = false;
           $('.restricao').on('click', function(){

               if(cheque == false){
                   alert('possui cheque?');
                     $(this).addClass('obri');
               }
               if(cheque === true){
                    $(this).removeClass('obri');
                    restricao = true;



               }


           });
           var veiculo = false;
           $('.veiculo').on('click', function(){

               if(restricao == false){
                   alert('selecione uma sua conta');
                     $(this).addClass('obri');
               }
               if(restricao === true){
                    $(this).removeClass('obri');
                    veiculo = true;

               }


           });

             var imovel = false;
           $('.imovel').on('click', function(){

               if(veiculo == false){
                   alert('possui veiculo?');
                     $(this).addClass('obri');
               }
               if(veiculo === true){
                    $(this).removeClass('obri');
                    imovel = true;
               }
               if(valor_genero && estado && profissao && ocupacao && escolaridade && conta_banco && cheque && restricao && veiculo && imovel === true){
                      $("#btn2").prop('disabled',false);
//                    alert('ok ');

                }

           });


        });
    </script>


    </script>

      <script>
       $(function() {
            $('#btn1').tooltip({position: "bottom"});
        });
    </script>


    <?php require_once('head3.html'); ?>


</head>
<body>
    	<!-- navbar -->
	<?php require_once('menu.html');?>
<div class="container" style="margin-top:40px;">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Passo 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Passo 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Passo 3</p>
            </div>
        </div>
    </div>
    <div class="price-box">
        <div class="row">
        </div>
          <div class="container">
            <form role="form" method="post" action="page.php" id="form1" name="form_passo1" accept-charset="UTF-8">
                <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">

                            <div class="col-md-12">
                            <h3></h3>
                             <div class="col-sm-6" style="width: 100%" >

                                      <div class="price-slider">
                                        <h4 class="great">De quanto você precisa? (R$)</h4>
<!--                                        <span>Mínimo R$ 1000</span>-->
                                        <div class="col-sm-12">
                                           <div class="btn-group btn-group-justified left"  >
                                               <?php
                                               $sql = "SELECT * FROM db_credito_voce.valor_emprestismo where id_valor_emprestimo< 5;";
//                                               echo $sql;
                                               $query = mysqli_query($conexao,$sql);
                                               while($lista = mysqli_fetch_assoc($query)){
                                               ?>
                                          <div class="btn-group btn-group-lg" >
    <!--                                          active-month selected-month-->
                                            <button type="button"
                                            class="btn btn-primary btn-lg btn-block term valor btnvalor"
                                             value='<?php echo $lista['id_valor_emprestimo'];?>' name="valor">
                                                <?php echo $lista['valor'];?>
                                            </button>


                                        </div>
                                        <?php } ?>


                                      <div class="btn-group btn-group-lg ">
                                             <select  required class="form-control btn-primary valor" id="outro" name="outro">
                                                 <option  required value="" selected>Outro</option>
                                                  <?php
                                                   $sql = "SELECT * FROM db_credito_voce.valor_emprestismo where id_valor_emprestimo >=5;";
    //                                               echo $sql;
                                                   $query = mysqli_query($conexao,$sql);
                                                   while($lista = mysqli_fetch_assoc($query)){
                                                   ?>

                                                <option value="<?php  echo $lista['id_valor_emprestimo'];?>">
                                                  <?php echo $lista['valor'];?></option>
                                             <?php } ?>
                                            </select>
                                        </div>

                                        </div>

                                        </div>
                                      </div>
                                      <div class="price-slider">
                                        <h4 class="great">Em quantas vezes ?</h4>
<!--                                        <span>Please choose one</span>-->
                                        <div class="btn-group btn-group-justified " id="quantidade">
                                            <?php
                                               $sql = "SELECT * FROM db_credito_voce.qtd_parcelas where id_qtd_parcelas < 5;";
//                                               echo $sql;
                                               $query = mysqli_query($conexao,$sql);
                                               while($lista = mysqli_fetch_assoc($query)){
                                               ?>
                                          <div class="btn-group btn-group-lg" >
    <!--                                          active-month selected-month-->
                                            <button id="parcela" type="button" data-parcela="parcela"
                                            class="btn btn-primary btn-lg btn-block month parcela"
                                            value='<?php echo $lista['id_qtd_parcelas'];?>' name="quantidade">
                                                <?php echo $lista['quantidade'];?></button>
                                          </div>
                                            <?php } ?>

                                         <div class="btn-group btn-group-lg">
                                             <select  class="form-control btn-primary parcela" id="outro" name="outro">
                                                 <option value="" selected>Outro</option>
                                                  <?php
                                                   $sql = "SELECT * FROM db_credito_voce.qtd_parcelas where id_qtd_parcelas >=5;";
    //                                               echo $sql;
                                                   $query = mysqli_query($conexao,$sql);
                                                   while($lista = mysqli_fetch_assoc($query)){
                                                   ?>

                                                <option value="<?php  echo $lista['id_qtd_parcelas'];?>">
                                                  <?php echo $lista['quantidade'];?></option>
                                             <?php } ?>
                                            </select>
                                        </div>

                                        </div>
                                      </div>

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


                                <div class="form-group">
                                    <label class="control-label">Nome Completo</label>
                                    <input required  maxlength="100" type="text" name="nome_completo" class="form-control" placeholder="João da Silva" id="nome_completo" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input required=""  maxlength="100" type="text" name="email" id="email" class="form-control" placeholder="example@example.com" onblur="validacaoEmail(form_passo1.email)" />
                                    <div id="msgemail"></div>


                                </div>


                                <textarea style="display:none;" id="area" name="valor"></textarea>
                                <textarea style="display:none;" id="area2" name="parcela"></textarea>

                              </div>

                                    <button class="btn btn-primary nextBtn btn-lg pull-right"  disabled type="button"  id="btn1" name="btn1">Next</button>

                        </div>

                    </div>
                </div>
                <div class="row setup-content" id="step-2" >
                    <div class="col-xs-12">

                        <textarea style="display:none;" id="area3" name="estado_civil"></textarea>
                        <textarea style="display:none;" id="area4" name="genero"></textarea>
                        <textarea style="display:none;" id="area5" name="cheque"></textarea>
                        <textarea style="display:none;" id="area6" name="restricao"></textarea>
                        <textarea style="display:none;" id="area7" name="veiculo"></textarea>
                        <textarea style="display:none;" id="area8" name="imovel"></textarea>

                        <div class="col-md-12">
                            <h3> Passo 2</h3>
                            <div class="form-group row  ">
                                <label class="control-label">CPF</label>
                                <input  required="required" class="form-control" placeholder="Digite o seu CPF" id="cpf" size="12" maxlength="11" name="cpf"
                                       onKeyPress="return Apenas_Numeros(event);"
                                       onBlur="validaCPF(this),formataCPF(this);"
                                       onkeyup="onkeyup(this);"/>

                            </div>

                            <!-- responsivo -->

                            <div class="form-group responsivo  row"  >
                                <label class="control-label">Data de Nascimento:</label>
                                   <input  required="required" maxlength="11" type="text"   id="data" name="dt_nasc" class="form-control" placeholder="00/00/00"  onkeypress="mascaraData( this, event )" size="11"/>


                            </div>
                            <div class="form-group responsivo row" >

                                <label class="control-label" >Renda</label>

                                <input  required="required" maxlength="200" type="text" onKeydown="Formata(this,20,event,2)"  id="renda" name="renda" class="form-control" placeholder="Renda"  />



                            </div>

            <!--                required="required" -->
                            <div class="form-group row" >
                                  <label class="control-label">Sexo:</label>
                            </div>
                            <div class="form-group" style="display: flex" ng-class="active">
                                  <?php $query = "select * from genero";
                                    $result = mysqli_query($conexao,$query);
                                    while($rows = mysqli_fetch_array($result)){
                                    ?>

                                    <div class="btn-group btn-group-justified">
                                      <div class="btn-group btn-group-lg ">
                                        <button required="required" class="form-control month btn-primary genero" id='genero' value="<?php echo $rows['idgenero'] ?>"><?php echo $rows ['genero']; ?></button>
                                      </div>

                                    </div>
                                <?php } ?>
                            </div>


                             <div class="form-group" >
                                  <label class="control-label row">Estado Civil:</label>
                            </div>
                         <div class="form-group" >

                                <div class="btn-group btn-group-justified">
                                <?php
                                    require_once('conexao.php');
                                   $query = "select * from estado_civil where id_estado_civil = 1 or id_estado_civil = 2 or id_estado_civil = 3;";
                                   $result = mysqli_query($conexao,$query);
                                   while ($rows = mysqli_fetch_array($result)){
                                  ?>
                                  <div class="btn-group btn-group-lg">
                                    <button  style="width:80%;" type="button" class="form-control btn-primary term estado_civil"
                                        id='estado_civil' value="<?php echo $rows ['id_estado_civil']?>">
                                        <?php echo $rows['estado_civil']?>
                                    </button>
                                  </div>

                                    <?php } ?>

                                <div class="btn-group btn-group-lg">

                                     <select style="width:80%" class="form-control  btn-primary estado_civil" term id="outro_estado_civil" name="outro_estado_civil">
                                    <option value="" selected>Outro</option>
                                     <?php
                                   $query = "select * from estado_civil where id_estado_civil >= 4;";
                                   $result = mysqli_query($conexao,$query);
                                   while ($rows = mysqli_fetch_array($result)){
                                  ?>
                                    <option value="<?php echo $rows ['id_estado_civil']?>">
                                    <?php echo $rows['estado_civil']?></option>
                                     <?php } ?>

                                </select>

                                </div>

                                </div>
                            </div>
                              <div class="form-group row" >
                                <label for="filter">Profissão</label>
                                <label for="filter" class="margin500">Ocupação</label>

                          </div>
                                <script language="javascript">
                                function ChamarLink() {
                                    var valorCombo = document.getElementById("profissao").value;
                                    if(valorCombo == 607){
                                        document.getElementById("aparecer").style.display = "flex";
                                        document.getElementById("matricula").style.display = "block";
                                        document.getElementById("ap_titulo").style.display = "flex";
//                                        alert(valorCombo);

                                    }
//                                    alert(valorCombo);

                                }

                            </script>

                            <div class="form-group" style="display:flex;">
                              <select  style="width: 40%;"  class="form-control" id="profissao" name="profissao" onchange="ChamarLink();">

                                          <option value="<?php echo $rows ['id_profissoes']?>"  selected="selected">Selecione</option>
                                         <?php
                                           $query = "select * from profissoes;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option  value="<?php echo $rows ['id_profissoes']?>">
                                            <?php echo $rows['profissoes']?>
                                         </option>
                                             <?php }
                                                   ?>

                                </select>
                                <select  style="width: 40%;margin-left: 100px;"  class="form-control" class="ocupacao" id="ocupacao" name="ocupacao">

                                      <option value="" selected="selected">Selecione</option>
                                         <?php

                                           $query = "select * from ocupacao;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option value="<?php echo $rows ['id_ocupacao']?>">
                                            <?php echo $rows['ocupacao']?>
                                    </option>
                                             <?php } ?>

                                </select>
                          </div>

                            <div class="form-group" id="ap_titulo" style="display:none;">
                            <label for="filter">Orgão:</label>
                            <label for="filter" class="margin500">Vínculo com orgão:</label>
                            </div>
                           <div class="form-group" id="aparecer" style="display:none;">

                                 <select  style="width: 40%"  class="form-control " id="orgao" name="orgao">
                                        <option value="" selected="selected">Selecione</option>
                                         <?php

                                           $query = "select * from orgao;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option value="<?php echo $rows ['id_orgao']?>">
                                            <?php echo $rows['orgao']?>
                                    </option>
                                             <?php } ?>
                                </select>

                                <select  style="width: 40%;margin-left:100px;"  class="form-control" id="vinculo_com_orgao" name="vinculo_com_orgao">
                                        <option value="" selected="selected">Selecione</option>
                                         <?php

                                           $query = "select * from vinculo_com_orgao;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option value="<?php echo $rows ['id_vinculo_com_orgao']?>">
                                            <?php echo $rows['vinculo_com_orgao']?>
                                    </option>
                                             <?php } ?>
                                </select>


                            </div>
                             <div class="form-group" id="matricula" style="display:none" >

                          <label class="control-label">Matrícula</label>
                                <input maxlength="100" name="matricula" type="text" class="form-control" placeholder="" />

                          </div>



                      <div class="form-group flex">
                            <label class="control-label">Grau de instrução:</label>
                            <label class="control-label conta_banco">Possui conta em banco?</label>

                        </div>
                        <div class="form-group" style="display:flex;">
                            <select  style="width: 40%"  class="form-control" id="escolaridade" name="escolaridade">
                                     <option value="" selected="selected">Selecione</option>
                                         <?php

                                           $query = "select * from escolaridade;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option value="<?php echo $rows ['id_escolaridade']?>">
                                            <?php echo $rows['escolaridade']?>
                                    </option>
                                             <?php } ?>
                                </select>

                                <select  style="width: 40%;margin-left: 100px;"  class="form-control" id="conta_banco" name="conta_banco">
                                     <option value="" selected="selected">Selecione</option>
                                         <?php

                                           $query = "select * from conta_banco;";
                                           $result = mysqli_query($conexao,$query);
                                           while ($rows = mysqli_fetch_array($result    )){
                                          ?>
                                         <option value="<?php echo $rows ['id_conta_banco']?>">
                                            <?php echo $rows['conta_banco']?>
                                    </option>
                                             <?php } ?>
                                </select>

                        </div>
                             <div class="form-group" >
                                  <label class="control-label">Com cheque?</label>

                            </div>
                            <div class="form-group" style="display: flex">


                                    <div class="btn-group btn-group-justified" required="required">
                                        <?php $query = "select * from resposta";
                                    $result = mysqli_query($conexao,$query);
                                    while($rows = mysqli_fetch_array($result)){
                                    ?>
                                      <div class="btn-group btn-group-lg">
                                        <button  style="width:80%;" type="button" class="form-control  btn-primary  cheque"  id='cheque' value="<?php echo $rows['id_resposta'] ?>"><?php echo $rows ['resposta'] ?></button>
                                      </div>
                                        <?php } ?>



                                    </div>

                            </div> <div class="form-group" >

                                  <label class="control-label " >Possui restrições em seu nome?</label>
                            </div>
                            <div class="form-group" style="display: flex">


                                    <div class="btn-group btn-group-justified" required="required">


                                    <?php $query = "select * from resposta";
                                    $result = mysqli_query($conexao,$query);
                                    while($rows = mysqli_fetch_array($result)){
                                    ?>
                                      <div class="btn-group btn-group-lg">
                                        <button  style="width:80%;" type="button" class="form-control  btn-primary restricao"  id='restricao' value="<?php echo $rows['id_resposta'] ?>"><?php echo $rows ['resposta'] ?></button>
                                      </div>
                                      <?php } ?>

                                    </div>

                            </div>
                             <div class="form-group" >
                                  <label class="control-label">Possui veículo próprio?</label>

                            </div>
                            <div class="form-group" style="display: flex">

                                    <div class="btn-group btn-group-justified" required="required">
                                        <?php $query = "select * from resposta";
                                    $result = mysqli_query($conexao,$query);
                                    while($rows = mysqli_fetch_array($result)){
                                    ?>
                                      <div class="btn-group btn-group-lg">
                                        <button  style="width:80%;" type="button" class="form-control  btn-primary  veiculo"  id='veiculo' value="<?php echo $rows['id_resposta'] ?>"><?php echo $rows ['resposta'] ?></button>
                                      </div>
                                        <?php } ?>



                                    </div>
                            </div><div class="form-group" >

                                  <label class="control-label ">Possui imóvel próprio?</label>
                            </div>
                            <div class="form-group" style="display: flex">

                                    <div class="btn-group btn-group-justified" required="required">

                                    <?php $query = "select * from resposta";
                                    $result = mysqli_query($conexao,$query);
                                    while($rows = mysqli_fetch_array($result)){
                                    ?>
                                      <div class="btn-group btn-group-lg">
                                        <button  style="width:80%;" type="button" class="form-control btn-primary imovel"  id='imovel' value="<?php echo $rows['id_resposta'] ?>"><?php echo $rows ['resposta'] ?></button>
                                      </div>
                                      <?php } ?>

                                    </div>
                            </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" disabled type="button" id="btn2" name="btn2">Next</button>
                            </div>

                        </div>
    </div>
                <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3> Passo 3</h3>
                            <!-- Inicio do formulario -->
                            <div class="form-group">
                                <form method="get" action=".">
                                    <label class="control-label" >Cep:
                                    <input name="cep" required="required"  class="form-control" type="text" id="cep" value="" maxlength="9" /></label><br />
                                     <div class="form-group">
                                         <label class="control-label">Rua:</label>
                                         <label class="control-label numero">Número:</label>
                                     </div>
                                     <div class="form-group" style="display:flex">
                                        <input name="rua"   class="form-control" required="required" type="text" id="rua" size="60" style="width:70%"/>

                                        <input name="numero" required="required"   class="form-control margin50" type="text" id="numero"  onKeyPress="return Apenas_Numeros(event);" style="width:20%;"/>
                                    </div>
                                     <div class="form-group" style="display:flex">
                                         <label class="control-label">Complemento:</label>
                                         <label class="control-label margin500" >Bairro:</label>
                                     </div>
                                     <div class="form-group" style="display:flex">
                                        <input name="complemento"   class="form-control" type="text" id="complemento" size="60" style="width:40%"/>

                                        <input name="bairro"   class="form-control margin160" type="text" id="bairro"   style="width:40%;"/>
                                    </div>
                                    <div class="form-group">
                                         <label class="control-label">Cidade:</label>
                                         <label class="control-label estado numero" >Estado:</label>
                                     </div>
                                     <div class="form-group" style="display:flex">
                                        <input name="cidade"   class="form-control" type="text" id="cidade" size="40" style="width:70%"/>

                                        <input name="estado"   class="form-control" type="text" id="uf" size="2"   onKeyPress="return Apenas_Numeros(event);" style="width:20%;margin-left:50px;"/>
                                    </div>

                                    <label class="control-label">IBGE:
                                    <input name="ibge"  class="form-control"type="text" id="ibge" size="8" /></label><br />

                                 <div class="form-group">

                                         <label class="control-label celular">Celular:</label>
                                     </div>

                                  <div class="form-group" style="display:flex">


                                        <input name="celular"   class="form-control telefone" type="text" id="celular"   style="width:50%;margin-left:150px;"/>
                                    </div>
                                    <div class="form-group">

                                         <label class="control-label celular">Outro telefone:</label>
                                     </div>

                                  <div class="form-group" style="display:flex">

                                        <input name="telefone" class="form-control telefone" type="text" id="telefone"   style="width:50%;margin-left:150px;"/>
                                    </div>
                                </form>
                            </div>

                            <label class="check_label" style="margin-top:20px;">
                                            <input class="form-control ng-dirty ng-valid-parse ng-valid ng-valid-required user-success ng-touched" style="float: left; margin: 10px; margin-left: 0 !important;width:20px;margin-top:-10px;" ng-required="true" ng-model="acceptTerms" type="checkbox" name="termo" id="termo" required="required"

                                                   onclick="if (this.checked) { save.disabled = false; } else if (! this.checked) { save.disabled = true; }">
                                            Declaro que concordo com o
                                            <a href="https://www.bompracredito.com.br/termo-uso/" target="_blank">Termo de Uso</a>
                                            e a
                                            <a href="https://www.bompracredito.com.br/politica-privacidade/" target="_blank">Política de Privacidade</a>
                                </label>

<!--
                               <button  class="btn btn-success btn-lg pull-right" data-toggle="modal"
                                disabled data-target=".autocompleta">

                                   Finish!
                                </button>

-->
                                <button  class="btn btn-success btn-lg pull-right" type="submit" disabled id="save" name="save" onclick="document.form_passo1.submit();">

                                   Finalizar
                                </button>



                        </div>
                </div>
        </div>
            </form>

<!--
              <form>
                  <input name="x" type="checkbox" value="0"
                         onclick="if (this.checked) { z.disabled = false; } else if (! y.checked) { z.disabled = true; }">

                  <input name="y" type="checkbox" value="1" onclick="if (this.checked) { z.disabled = false; } else if (! x.checked) { z.disabled = true; }">

                  <button name="z" disabled>


                      </form>
-->
        </div>
    </div>
</div>
    <footer>

	<div class="container">
			<div class="row">
				<div class="span6 offset3">
					<ul class="social-networks">
						<li><a href="#"><i class="icon-circled icon-bgdark icon-instagram icon-2x"></i></a></li>
						<li><a href="#"><i class="icon-circled icon-bgdark icon-twitter icon-2x"></i></a></li>
						<li><a href="#"><i class="icon-circled icon-bgdark icon-dribbble icon-2x"></i></a></li>
						<li><a href="#"><i class="icon-circled icon-bgdark icon-pinterest icon-2x"></i></a></li>
					</ul>
					<p class="copyright">
						&copy; Maxim Theme. All rights reserved.
						<div class="credits">
							<!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Maxim
              -->
							<a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by BootstrapMade.com

                    </div>
				</div>
			</div>
		</div>
		<!-- ./container -->
	</footer>

    <a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/jquery.nav.js"></script>
	<script src="js/jquery.localScroll.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/isotope.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/inview.js"></script>
	<script src="js/animate.js"></script>
	<script src="js/custom.js"></script>
	<script src="contactform/contactform.js"></script>

	<script src="js/custom.js"></script>
    <?php require_once('js/script.php')?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

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



</body>
</html>
