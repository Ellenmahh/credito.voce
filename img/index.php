
<?php require_once('conexao.php');?>
<!DOCTYPE HTML>
<html>
    <head>
	<meta charset="utf-8">
	<title>CRÉDITO.VC</title>
     <link rel="shortcut icon" href="img/favicon.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style2.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet" type="text/css">
        
<!--        <script type="text/javascript" src="jquery.js"></script>-->
<script type="text/javascript" src="functions.js"></script> 
<!--  slide-->
        <script>
        
           /* Slider (work in progress)
 * 03/09/2015 by Andrew Errico
 */
$(function() {

    // slider type
    $t = "slide"; // opitions are fade and slide
    
  	//variables
    $f = 1000,  // fade in/out speed
    $s = 1000,  // slide transition speed (for sliding carousel)
    $d = 5000;  // duration per slide
    
    $n = $('.slide').length; //number of slides
    $w = $('.slide').width(); // slide width
  	$c = $('.container').width(); // container width
   	$ss = $n * $w; // slideshow width
  
  	
      function timer() {
        $('.timer').animate({"width":$w}, $d);
        $('.timer').animate({"width":0}, 0);
    }

  
  // fading function
    function fadeInOut() {
      timer();
        $i = 0;    
        var setCSS = {
            'position' : 'absolute',
            'top' : '0',
            'left' : '0'
        }        
        
        $('.slide').css(setCSS);
        
        //show first item
        $('.slide').eq($i).show();
        

        setInterval(function() {
          timer();
            $('.slide').eq($i).fadeOut($f);
            if ($i == $n - 1) {
                $i = 0;
            } else {
                $i++;
            }
            $('.slide').eq($i).fadeIn($f, function() {
                $('.timer').css({'width' : '0'});
            });

        }, $d);
        
    }
    
    function slide() {
      timer();
        var setSlideCSS = {
            'float' : 'left',
            'display' : 'inline-block',
          	'width' : $c
        }
        var setSlideShowCSS = {
            'width' : $ss // set width of slideshow container
        }
        $('.slide').css(setSlideCSS);
        $('.slideshow').css(setSlideShowCSS); 
        
        
        setInterval(function() {
            timer();
            $('.slideshow').animate({"left": -$w}, $s, function(){
                // to create infinite loop
                $('.slideshow').css('left',0).append( $('.slide:first'));
            });
        }, $d);
        
    }
    
    if ($t == "fade") {
        fadeInOut();
        
    } if ($t == "slide") {
        slide();
        
    } else {
      
    }
});
        </script>
        <style>
            @media (min-width: 1200px){
                .span3 {
                    width: 249px !important;
                }
                }
            .img_sobre{
                   display:none;
                    padding: 10px;
                    border-width: 0 1px 1px 0;
                    border-style: solid;
                    border-color: #efefef;
                    box-shadow: 0 1px 1px #cdcdcd;
                    margin-bottom: 5px;
                    background-color: #f1f1f1;
            }
            #loadmore {
                padding: 10px  !important;
                text-align: center !important;
                background-color: #33739E !important;
                color: #fff !important;
                border-width: 0 1px 1px 0 !important;
                border-style: solid !important;
                border-color: #fff !important;
                box-shadow: 0 1px 1px #ccc !important;
                transition: all 600ms ease-in-out !important;
                -webkit-transition: all 600ms ease-in-out !important;
                -moz-transition: all 600ms ease-in-out !important;
                -o-transition: all 600ms ease-in-out !important;
            }
            #loadmore:hover {
                background-color: #fff !important;
                color: #33739E !important;
            }
        
        </style>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script>
    $(function () {
      num_posts_show = 2;
      speed_to_top = 1000; // in ms

        $(".img_sobre").slice(0, num_posts_show).show();
        $("#loadmore").on('click', function (e) {
            e.preventDefault();
             $(".img_sobre:hidden").slice(0, num_posts_show).slideDown();
            if ($(".img_sobre:hidden").length == 0) {
                $("#loadmore").hide('slow');
            }
//            $('html,body').animate({
//                scrollTop: $(this).offset().top
//            }, 1500);
        });
    });


    </script>
</head>    
    
<body>
	<!-- navbar -->
     <?php require_once('menu.html');?>
	 <div class="timer"></div>
      <section id="home" class="slideshow">
		<div id="main-slider" class="carousel slide" data-ride="carousel">
			
			<div class="carousel-inner">

				<div class="item active">

					<img class="img-responsive slide" src="img/slider/01.jpg" alt="slider">

					<div class="carousel-caption slide">

						<h2>EMPRÉSTIMO FACILITADO CRÉDITO.VC</h2>

						<h4 style="color:#000">
                            A CRÉDITO.VC oferece opções de linhas de crédito em um <br> ambiente seguro e rápido para solucionar dificuldades financeiras <br>ou viabilizar a realização de seus planos e sonhos. Nossos produtos <br> financeiros foram planejados para facilitar seu controle financeiro <br>e proteger o seu bolso.
                        </h4>

					</div>

				</div>

				<div class="item">

					<img class="img-responsive slide" src="img/slider/02.jpg" alt="slider">

					<div class="carousel-caption slide">

						<h2>EMPRÉSTIMO PESSOAL CRÉDITO.VC</h2>
						<h4 style="color:#000">
                            O empréstimo pessoal é um contrato de crédito entre o cliente e a <br>instituição financeira, onde o cliente recebe uma quantia financeira para utilizar como quiser <br>(pagamento de contas ou dívidas, educação, compras, viagens ou como desejar).<br>
                            
                        </h4>
					</div>
				</div>
				<div class="item">
					<img class="img-responsive slide" src="img/slider/03.jpg" alt="slider">
					<div class="carousel-caption slide">

						<h2>EMPRÉSTIMO CONSIGNADO CRÉDITO.VC</h2>
						<h4 style="color:#000">
                            O empréstimo consignado é aquele concedido a profissionais de empresas públicas,<br> privadas ou a aposentados, em que o pagamento é realizado através de desconto das prestações<br> do salário ou do benefício previdenciário do cidadão.<br>
                           
                        </h4>
					</div>
				</div>

			</div>
            <ol class="carousel-indicators">
				<li data-target="#main-slider" data-slide-to="0" class="active"></li>

				<li data-target="#main-slider" data-slide-to="1"></li>

				<li data-target="#main-slider" data-slide-to="2"></li>
                
			</ol>
		</div>

    </section>
	<!-- spacer section -->
	<section class="spacer ">
		<div class="container">
			<div class="row">
				<div class="span6 alignright flyLeft">
					<blockquote class="large">
						Como funciona 
                            <div class="container">
                                <div class="col-sm-4">
                                    <i class="step"><span>1</span> Simule</i>
                                    <p>Informe o valor desejado para empréstimo e selecione a quantidade de parcelas para pagamento. Ao encontrar a melhor simulação, solicite sua análise de crédito. </p>
                                </div>

                                <div class="col-sm-4">
                                    <i class="step"><span>2</span> Solicite</i>
                                    <p>Preencha a ficha com os dados solicitados para que a instituição financeira analise e calcule a taxa de juros para enviar a sua proposta.</p>
                                </div>

                                <div class="col-sm-4">
                                    <i class="step"><span>3</span> Receba</i>
                                    <p>Após seu pedido ser aprovado e sua aceitação da nossa proposta, basta enviar os documentos necessários e esperar o valor do empréstimo ser creditado em sua conta corrente.</p>
                                </div>

                                <div class="clearfix"></div>
                                <hr class="solid2" />
                            </div>
                        <cite>Crédito.você</cite>
					</blockquote>
				</div>
				<div class="span6 aligncenter flyRight">
					
				</div>
			</div>
		</div>
	</section>
	<!-- end spacer section -->
	<!-- section: team -->
	<section id="about" class="section">
		<div class="container">
			<h4>QUEM SOMOS</h4>
			<div class="row">
				<div class="span4 offset1">
					<div>
						<h2>A CRÉDITO.VC é <strong>uma loja virtual de produtos financeiros,</strong></h2>
						<p>
							  onde você pode utilizar empréstimos online de forma rápida e segura. Na CRÉDITO.VC o cliente compara, simula, contrata e adquire o produto que melhor atende a sua necessidade financeira e econômica.</p><p>

A CRÉDITO.VC tem como proposta oferecer soluções oportunas de empréstimos pessoais com taxas de juros justas. Oferecemos as melhores condições de empréstimo para que nossos clientes possam enfrentar, de forma segura, situações como sair de um endividamento ou a concretização de sonhos e planos.
Estamos continuamente buscando aperfeiçoamento para oferecer sempre a melhor experiência de crédito ao nosso cliente. Valorizamos a sua opinião, suas necessidades, críticas e sugestões para que possamos oferecer o melhor atendimento.
Nosso principal objetivo é proporcionar a quem procura crédito as ofertas mais adequadas ao seu perfil para fechar negócio na hora. Prefira um empréstimo online, de forma prática e inteligente!


						</p>
					</div>
				</div>
				<div class="span6">
					<div class="aligncenter">
<!--						<img src="img/icons/creativity.png" alt="" />-->
                        <h2></h2>
					</div>
				</div>
			</div>
<!--
			<div class="row">
				<div class="span2 offset1 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="img/parceiros/ibi.jpg" alt="" />
						<h3></h3>
						<p>
							Para garantir a credibilidade de nossos serviços, contamos com a solidez da IBI promotora, com sua experiência de mais de 20 anos e mais de 2 milhões de clientes.</p><p>
Em se tratando de serviços financeiros, é da maior relevância ter como referência instituições financeiras fortes e confiáveis, para adquirir produtos como empréstimos pessoais e crédito consignado.
Em parceria com a IBI oferecemos produtos e serviços de confiança para um relacionamento transparente e seguro com nossos clientes.
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="img/parceiros/logo-midia100.jpg" alt="" />
						<h3></h3>
						<p>
							
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="img/team/img-3.jpg" alt="" />
						<h3>Neil Doe</h3>
						<p>
							Web designer
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="img/team/img-4.jpg" alt="" />
						<h3>Mark Joe</h3>
						<p>
							UI designer
						</p>
					</div>
				</div>
				<div class="span2 flyIn">
					<div class="people">
						<img class="team-thumb img-circle" src="img/team/img-5.jpg" alt="" />
						<h3>Stephen B</h3>
						<p>
							Digital imaging
						</p>
					</div>
				</div>
			</div>
-->
		</div>
		<!-- /.container -->
	</section>
	<!-- end section: team -->
	<!-- section: services -->
	<section id="services" class="section orange">
		<div class="container">
			<h4>Parceiros</h4>
			<!-- Four columns -->
			<div class="row">
				
				<div class="span3 animated-fast flyIn">
					<div class="service-box">
						<img src="img/parceiros/logo-midia100.png" alt="" />
						<h2></h2>
						<p data-toggle="modal" data-target=".midia">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						</p>
					</div>
				</div><div class="span3 animated-fast flyIn">
					<div class="service-box">
						<img src="img/parceiros/logo-midia100.png" alt="" />
						<h2></h2>
						<p data-toggle="modal" data-target=".midia">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						</p>
					</div>
				</div><div class="span3 animated-fast flyIn">
					<div class="service-box">
						<img src="img/parceiros/logo-midia100.png" alt="" />
						<h2></h2>
						<p data-toggle="modal" data-target=".midia">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						</p>
					</div>
				</div><div class="span3 animated-fast flyIn">
					<div class="service-box">
						<img src="img/parceiros/logo-midia100.png" alt="" />
						<h2></h2>
						<p data-toggle="modal" data-target=".midia">
							Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						</p>
					</div>
				</div>
				
			</div>
		</div>
        

     
 <style  type="text/css">
            .modal-content{width: 600px; text-align: center;}
            
            .azul{color: #5959ff;font-weight: bold;}
            .principal{width: 500px;margin-left: 20px;color: black;overflow: auto;}
            .section.orange p{color: black;}

          

        </style>

        <div id="myModal" class="modal fade midia" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog modal-sm modal-card" role="document" >
            <div class="modal-content ">

                <div class="conteudoModal" >
                <div class="col-lg-5 col-md-8 principal">


                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                </div>
                </div>
                </div>
            </div>


        </div>
        
         <div id="myModal" class="modal fade casamento" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog modal-sm modal-card" role="document" >
            <div class="modal-content ">

                <div class="conteudoModal" >
                <div class="col-lg-5 col-md-8 principal casamento">
                    <?php $sql = 'select * from blog where id_blog = 1';
//                    echo $sql;
                    $query = mysqli_query($conexao,$sql);
                    while($rs = mysqli_fetch_assoc($query)){ ?>
                    <img class="max-img" src="<?php echo $rs['imagem'] ?>" alt="" />

                    <p>
                        <?php echo $rs['detalhes'] ?>
                    </p>
                    <?php } ?>
                </div>
                </div>
                </div>
            </div>


        </div>
        
        <div id="myModal" class="modal fade realize" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog modal-sm modal-card" role="document" >
            <div class="modal-content ">

                <div class="conteudoModal" >
                <div class="col-lg-5 col-md-8 principal casamento ">
                    
                    <?php $sql = 'select * from blog where id_blog = 2';
//                    echo $sql;
                    $query = mysqli_query($conexao,$sql);
                    while($rs = mysqli_fetch_assoc($query)){ ?>
                    <img class="max-img" src="<?php echo $rs['imagem'] ?>" alt="" />

                    <p>
                        <?php echo $rs['detalhes'] ?>
                    </p>
                    <?php } ?>

                </div>
                </div>
                </div>
            </div>


        </div>
        
        <div id="myModal" class="modal fade vantagens" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog modal-sm modal-card" role="document" >
            <div class="modal-content ">

                <div class="conteudoModal" >
                <div class="col-lg-5 col-md-8 principal casamento ">
                     <?php $sql = 'select * from blog where id_blog = 3';
//                    echo $sql;
                    $query = mysqli_query($conexao,$sql);
                    while($rs = mysqli_fetch_assoc($query)){ ?>
                    <img class="max-img" src="<?php echo $rs['imagem'] ?>" alt="" />

                    <p>
                        <?php echo $rs['detalhes'] ?>
                    </p>
                    <?php } ?>
                  

                </div>
                </div>
                </div>
            </div>


        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->

		
		
				<script>
					$(document).ready(function(){
						$('#myModal').modal('onclick');
					});
				</script>
			
 
	</section>	<!-- end section: services -->
	<!-- section: works -->
	
	<!-- spacer section -->
	<section class="spacer bg3">
		<div class="container">
			<div class="row">
				<div class="span12 aligncenter flyLeft">
					<blockquote class="large">
						5 Motivos para confiar:<br>
                        1. Respeito ao cliente.<br>
                        2. Parceria com grandes empresas.<br>
                        3. Ética e transparência.<br>
                        4. Ambiente seguro e rápido.<br>
                        5. Inteligência, tecnologia e segurança da informação.<br>
					</blockquote>
				</div>
				<div class="span12 aligncenter flyRight">
					
				</div>
			</div>
		</div>
	</section>
	<!-- end spacer section -->
	<!-- section: blog -->
	<section id="blog" class="section">
		<div class="container">
			<h4>Blog</h4>
			<!-- Three columns -->
			<div class="row" id="blog_conteudo">
				<?php $sql = "select * from blog;";
                    $query = mysqli_query($conexao,$sql);
                while($rs = mysqli_fetch_assoc($query)){
                ?>
				<div class="span3 img_sobre">
					<div class="home-post">
						<div class="post-image">
							<img class="max-img" style="width:100%;height:310px;" src="<?php echo $rs['imagem']; ?>" alt="" />
						</div>
						<div class="post-meta">
							<h5>Realize o sonho de reformar a sua casa</h5>
							<span class="date">06/11/2015</span>
							
						</div>
						<div class="entry-content">
							
							<p>
								 A decisão de reformar a casa ou apartamento pode originar de uma necessidade emergencial ou de um &hellip;
							</p>
							<a href="#" class="more" data-toggle="modal" data-target=".realize">Continuar Lendo</a>
						</div>
					</div>
				</div>
                <?php } ?>
<!--
				<div class="span3 img_sobre">
					<div class="home-post">
						<div class="post-image">
							<img class="max-img" src="img/03.jpg" alt="" />
						</div>
						<div class="post-meta">
							<h5>Vantagens de empréstimo online</h5>
							<span class="date">06/11/2015</span>
							
						</div>
						<div class="entry-content">
							
							<p>
								  O empréstimo online é uma nova forma de obter um empréstimo pessoal, de qualquer lugar onde &hellip;
							</p>
							<a href="#" class="more" data-toggle="modal" data-target=".vantagens">Continuar lendo</a>
						</div>
					</div>
				</div>
				<div class="span3 img_sobre">
					<div class="home-post">
						<div class="post-image">
							<img class="max-img" src="img/03.jpg" alt="" />
						</div>
						<div class="post-meta">
							<h5>Vantagens de empréstimo online</h5>
							<span class="date">06/11/2015</span>
							
						</div>
						<div class="entry-content">
							
							<p>
								  O empréstimo online é uma nova forma de obter um empréstimo pessoal, de qualquer lugar onde &hellip;
							</p>
							<a href="#" class="more" data-toggle="modal" data-target=".vantagens">Continuar lendo</a>
						</div>
					</div>
				</div>
-->
			</div>
			<div class="blankdivider30"></div>
			
				<a  href="#" id="loadmore" class="btn btn-large btn-theme " >Carregar mais</a>  
			
            
		</div>
	</section>	<!-- end spacer section -->
	<!-- section: contact -->
	<section id="contact" class="section">
		<div class="container">
			<h4>Get in Touch</h4>
			<p>
				Reque facer nostro et ius, cu persius mnesarchum disputando eam, clita prompta et mel vidisse phaedrum pri et. Facilisis posidonium ex his. Mutat iudico vis in, mea aeque tamquam scripserit an, mea eu ignota viderer probatus. Lorem legere consetetur ei
				eum. Sumo aeque assentior te eam, pri nominati posidonium consttuam
			</p>
			<div class="blankdivider30">
			</div>
			<div class="row">
				<div class="span12">
					<div class="cform" id="contact-form">
						<div id="sendmessage">Your message has been sent. Thank you!</div>
						<div id="errormessage"></div>
						<form action="" method="post" role="form" class="contactForm">
							<div class="row">
								<div class="span6">
									<div class="field your-name form-group">
										<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
										<div class="validation"></div>
									</div>
									<div class="field your-email form-group">
										<input type="text" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
										<div class="validation"></div>
									</div>
									<div class="field subject form-group">
										<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
										<div class="validation"></div>
									</div>
								</div>
								<div class="span6">
									<div class="field message form-group">
										<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
										<div class="validation"></div>
									</div>
									<input type="submit" value="Send message" class="btn btn-theme pull-left">
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- ./span12 -->
			</div>
		</div>
	</section>
<!--
      <a  data-toggle="modal" data-target=".autocompleta" class="back-to-top">
      <i class="left200" class="fa fa-chevron-up"><img style="width: 100px;" src="img/whatsapp.png">(11) 96589-4588</i>
          <ul>
        <li><a href="javascript:" onclick="Start.abrirPopupAtendimento();"><i class="sprite-icon-chat"></i> Chat Online</a></li>
        <li><a href=""><i class="sprite-icon-whatsapp-2"></i> WhatsApp 11 95825-1263</a></li>
        <li><a href="/faleConosco"><i class="sprite-icon-envelope-2"></i> E-mail</a></li>
    </ul>
      
</a>
-->
    <div id="bar-duvida" class="text-center">
    <span class="hidden-xs">Está com dúvida? Entre em contato conosco por algum dos nossos canais:</span>
    <ul>
        <li><a href="javascript:" onclick="Start.abrirPopupAtendimento();"><i class="sprite-icon-chat"></i> Chat Online</a></li>
        <li><a href=""><i class="sprite-icon-whatsapp-2"></i> WhatsApp 11 95825-1263</a></li>
        <li><a href="/faleConosco"><i class="sprite-icon-envelope-2"></i> E-mail</a></li>
    </ul>
</div>
	<footer>
    <div class="container">
       <div class="col-sm-3">
            <a href="/"><img class="logo" src="img/logo-invert.png?v=0.1" alt="" /></a>
            <a href="/" class="logo-midia100">
            <div class="redes">
                <a href="https://www.facebook.com/" target="_blank"><i class="sprite-icon-facebook"></i></a>
                <a href="https://twitter.com/" target="_blank"><i class="sprite-icon-twitter"></i></a>
                <a href="https://plus.google.com/" target="_blank"><i class="sprite-icon-google"></i></a>
            </div>
           </a>
        </div>
        
        <div class="col-sm-9 text-right">

           
					
            <div class="duvidas">
                <p>Ficou com dúvidas? Entre em contato conosco:</p><br>
                <a href="javascript:" onclick="Start.abrirPopupAtendimento();"><i class="sprite-icon-chat-xs"></i> Chat Online</a><br />
                <i class="sprite-icon-envelope"></i> atendimento@creditovc.com.br<br />
                <i class="sprite-icon-whatsapp"></i> WhatsApp 11 95825-1263
            </div>
        </div>
        
        <p class="paragraf hidden-xs">A análise de crédito e cálculo das taxas de juros variam de acordo com as informações fornecidas pelo cliente, como dados pessoais, valor solicitado e número de parcelas. Toda análise tem por embasamento a política de crédito da Instituição Financeira. Antes de efetivar a contratação de qualquer serviço através da Crédito.vc, o cliente terá acesso a todas as condições e informações concernentes ao empréstimo de forma clara e completa, inclusive informações sobre impostos incidentes (IOF) e o custo efetivo total (CET) da operação. A inadimplência ou atraso no pagamento de prestações do contrato de empréstimo pessoal pode implicar em consequências legais, como a inclusão de nome nos cadastros dos órgãos de proteção ao crédito, o protesto de títulos e o ajuizamento de ações de cobrança.</p>
        
        <hr class=" hidden-xs" />
        
        <p class=" text-center paragraf">
            &copy;Crédito.vc 2015 - Todos os direitos reservados – Midia100 Processamento de Dados LTDA<br />
            CNPJ: 10.472.656/0001-60 - Endereço Calçada das Papoulas, 133 - Barueri - SP, Brasil - CEP: 06454-020
             
        </p>
        
    </div>
      
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

    
    
    
    
</body>

</html>




