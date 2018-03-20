    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>

    <script type="text/javascript">
// JavaScript Document
var p = {

    0: "1.000",
    1: "1.500",
    2: "2.000",
    3: "2.500",
    4: "3.000",
    5: "3.500",
    6: "4.000",
    7: "4.500",
    8: "5.000",
    9: "5.500",
    10: "6.000",
    11: "6.500",
    12: "7.000",
    13: "7.500",
    14: "8.000",
    15: "8.500",
    16: "9.000",
    17: "9.500",
    18: "1,000K",
    19: "1,100K",
    20: "1,200K",
    21: "1,300K",
    22: "1,400K",
    23: "1,500K",
    24: "1,600K",
    25: "1,700K",
    26: "1,800K",
    27: "19,00K",
    28: "2,000K",
};

var t = {

    0: "100000",
    1: "150000",
    2: "200000",
    3: "250000",
    4: "300000",
    5: "350000",
    6: "400000",
    7: "450000",
    8: "500000",
    9: "550000",
    10: "600000",
    11: "650000",
    12: "700000",
    13: "750000",
    14: "800000",
    15: "850000",
    16: "900000",
    17: "950000",
    18: "1000000",
    19: "1100000",
    20: "1200000",
    21: "1300000",
    22: "1400000",
    23: "1500000",
    24: "1600000",
    25: "1700000",
    26: "1800000",
    27: "1900000",
    28: "2000000",

}

var obj = {
    '24month' : {
        'quarterly' : '1.41',
        'monthly' : '1.28',
        'weekly' : '1.2'
    },
    '18month' : {
        'quarterly' : '1.38',
        'monthly' : '1.25',
        'weekly' : '1.8'
    },
    '12month' : {

        'quarterly' : '1.35',
        'monthly' : '1.225',
        'weekly' : '1.15'
    }
};

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
     $('.veiculo').on('click',function(event) {
        var id = $(this).attr('id');

        $('.veiculo').removeClass('selected-term');
        $(this).addClass('selected-term');
        $(".veiculo").removeClass("active-term");
        $(this).addClass("active-term");
        $('#veiculo').val(id);

        calcualtePrice()
    });
     $('.imovel').on('click',function(event) {
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



function update(slider,val) {

    if(undefined === val) val = 0;
    var amount = p[val];

    $('#sliderVal').val(val);

    $('#slider_amirol a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+amount+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
}

function calcualtePrice(val){

    if(undefined === val)
        val = $('#sliderVal').val();

    var month = $('#month').val();
    var term = obj[month][$('#term').val()];

    var totalPrice = t[val]*term;

    $("#total").val(totalPrice.toFixed(2));
    $("#total12").val(Math.round((totalPrice)/12).toFixed(2));
    $("#total52").val(Math.round((totalPrice)/52).toFixed(2));
}
</script>
    <script type="text/javascript">
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
    <script language=javascript>
<!--
function fone(obj,prox) {
switch (obj.value.length) {
	case 1:
		obj.value = "(" + obj.value;
		break;
	case 3:
		obj.value = obj.value + ")";
		break;
	case 8:
		obj.value = obj.value + "-";
		break;
	case 13:
		prox.focus();
		break;
}
}

function mascaraData( campo, e )
{
	var kC = (document.all) ? event.keyCode : e.keyCode;
	var data = campo.value;

	if( kC!=8 && kC!=46 )
	{
		if( data.length==2 )
		{
			campo.value = data += '/';
		}
		else if( data.length==5 )
		{
			campo.value = data += '/';
		}
		else
			campo.value = data;
	}
}
function Apenas_Numeros(caracter)
{
  var nTecla = 0;
  if (document.all) {
	  nTecla = caracter.keyCode;
  } else {
	  nTecla = caracter.which;
  }
  if ((nTecla> 47 && nTecla <58)
  || nTecla == 8 || nTecla == 127
  || nTecla == 0 || nTecla == 9  // 0 == Tab
  || nTecla == 13) { // 13 == Enter
	  return true;
  } else {
	  return false;
  }
}
function validaCPF(cpf)
 {
   erro = new String;

 	if (cpf.value.length == 11)
 	{
 			cpf.value = cpf.value.replace('.', '');
 			cpf.value = cpf.value.replace('.', '');
 			cpf.value = cpf.value.replace('-', '');

 			var nonNumbers = /\D/;

 			if (nonNumbers.test(cpf.value))
 			{
 					erro = "A verificacao de CPF suporta apenas números!";
 			}
 			else
 			{
 					if (cpf.value == "00000000000" ||
 							cpf.value == "11111111111" ||
 							cpf.value == "22222222222" ||
 							cpf.value == "33333333333" ||
 							cpf.value == "44444444444" ||
 							cpf.value == "55555555555" ||
 							cpf.value == "66666666666" ||
 							cpf.value == "77777777777" ||
 							cpf.value == "88888888888" ||
 							cpf.value == "99999999999") {

 							erro = "Número de CPF inválido!"
 					}

 					var a = [];
 					var b = new Number;
 					var c = 11;

 					for (i=0; i<11; i++){
 							a[i] = cpf.value.charAt(i);
 							if (i < 9) b += (a[i] * --c);
 					}

 					if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
 					b = 0;
 					c = 11;

 					for (y=0; y<10; y++) b += (a[y] * c--);

 					if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }

 					if ((cpf.value.charAt(9) != a[9]) || (cpf.value.charAt(10) != a[10])) {
// 						erro = "Número de CPF inválido.";

 					}
 			}
 	}
 	else
 	{
 		if(cpf.value.length == 0)
 			return false
 		else
 			erro = "Número de CPF inválido.";
 	}
 	if (erro.length > 0) {
 			alert(erro);
 			
 			return false;
 	}
 	return true;
 }

 //envento onkeyup
 function maskCPF(CPF) {
 	var evt = window.event;
 	kcode=evt.keyCode;
 	if (kcode == 8) return;
 	if (CPF.value.length == 3) { CPF.value = CPF.value + '.'; }
 	if (CPF.value.length == 7) { CPF.value = CPF.value + '.'; }
 	if (CPF.value.length == 11) { CPF.value = CPF.value + '-'; }
 }

 // evento onBlur
 function formataCPF(CPF)
 {
 	with (CPF)
 	{
 		value = value.substr(0, 3) + '.' +
 				value.substr(3, 3) + '.' +
 				value.substr(6, 3) + '-' +
 				value.substr(9, 2);
 	}
 }
 function retiraFormatacao(CPF)
 {
 	with (CPF)
 	{
 		value = value.replace (".","");
 		value = value.replace (".","");
 		value = value.replace ("-","");
 		value = value.replace ("/","");
 	}
 }
//-->
</script>
    <!-- Adicionando JQuery -->

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >



        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
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
