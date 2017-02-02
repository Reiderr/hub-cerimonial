<!DOCTYPE html>
<html>
  <head>
    <?php 
        include_once '../../backend/eventFesta.php';
        include_once '../../backend/functions.php';
        $nome = ($_REQUEST['nome']);
        $festa = new Festa();
        $festa->initFesta($nome);
        verificaEventoAtivo($nome);// verifica se o evento está ativado, caso não esteja o usuário precisa logar para vizualiza-lo

    ?>
    <meta charset="utf-8">
    <!-- carrega o titulo do evento -->
    <title><?php echo $festa->getNome(); ?></title>
    <meta name="description" content="This is a free Bootstrap landing page theme created for BootstrapZero. Feature video background and one page design." />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/animate.min.css" />
    <link rel="stylesheet" href="./css/ionicons.min.css" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
  </head>
  <body>
    <nav id="topNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#first"><i class="fa fa-heart-o"></i> Página inicial</a>
            </div>
            <div class="navbar-collapse collapse" id="bs-navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="page-scroll" href="#one">O festa</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#two">Lista de Presentes</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#three">Mapa do evento</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#last">Contato</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" data-toggle="modal" title="A free Bootstrap video landing theme" href="#aboutModal">Sobre o Evento</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header id="first">
        <style> header{background-image: url('assets/casamento.jpg')};  </style>
        <div class="header-content">
            <div class="inner">
                <!-- mostra o nome do evento e o texto 1 -->
                <h1 class="cursive"><?php echo $festa->getNome(); ?></h1>
                <h4><?php echo $festa->getTexto1(); ?></h4>
                <hr>
                <a href="#one" class="btn btn-primary btn-xl page-scroll">Conheça mais</a>
            </div>
        </div>
    </header>
    <section class="bg-primary" id="one">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center">
                    <h2 class="margin-top-0 text-primary">Estamos muito felizes por ter você aqui!</h2>
                    <br>
                    <p class="text-faded">
                        <!-- mostra o texto 2 na tela -->
                        <?php echo $festa->getTexto2();?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="margin-top-0 text-primary">Torne este momento ainda mais especial!</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 text-center">
                    <h2> Quer nos presentear com algo? Temos algumas sujestões. </h2>
                    <hr class="primary">
                    <!-- link para a lista de presentes -->
                    <a class="btn btn-primary btn-xl page-scroll" href=<?php $lista = $festa->getFanpage();  echo "$lista"; ?>>Conheça mais</a>
                </div>
            </div>
        </div>
    </section>
    <section id="three" class="no-padding">
        <style>
           #map {
            height: 500px;
            width: 85%;
           }
        </style>
        <div class="col-lg-12 text-center">
            <h2 class = "text-primary">Mapa do Evento</h2>
            <hr class="primary">
        </div>
        <div class = "row">
            <div class = "col-lg-6 col-lg-offset-1" id="map"></div>
        </div>
        <script>
          function initMap() {
            var uluru = {lat: <?php echo $festa->getLatitude(); ?>, lng: <?php echo $festa->getLongitude();?> };
            var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 15,
              center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
          }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApzbVcgIb-qVPP3jNbCTB0TmxMmTHK0es&callback=initMap">
        </script>
     

    </section>
    <section id="last">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="margin-top-0 wow fadeIn">Fale Conosco</h2>
                    <hr class="primary">
                    <p>Alguma duvida? Mande um email para a gente!</p>
                </div>
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <form class="contact-form row">
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-4">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Phone">
                        </div>
                        <div class="col-md-12">
                            <label></label>
                            <textarea class="form-control" rows="9" placeholder="Your message here.."></textarea>
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                            <label></label>
                            <button type="button" data-toggle="modal" data-target="#alertModal" class="btn btn-primary btn-block btn-lg">Send <i class="ion-android-arrow-forward"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">
    <!-- colocar informações da empresa no footer -->
    </footer>
    <div id="galleryModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-body">
        		<img src="" id="galleryImage" class="img-responsive" />
        		<p>
        		    <br/>
        		    <button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">Close <i class="ion-android-close"></i></button>
        		</p>
        	</div>
        </div>
        </div>
    </div>
    <div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-body">
        		<h2 class="text-center">Dados Complementares</h2>
        		<h5 class="text-center">
        		    Não perca nada dessa data tão especial!
        		</h5>
        		<p class="text-justify">
                    O festa será realizado no dia <?php echo $festa->getDataEvento(); ?>,
                    no Local: <?php echo $festa->getLocal(); ?>
        		</p>
        		<button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true"> entendi! </button>
        	</div>
        </div>
        </div>
    </div>
    <div id="alertModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
        	<div class="modal-body">
        		<h2 class="text-center">Nice Job!</h2>
        		<p class="text-center">You clicked the button, but it doesn't actually go anywhere because this is only a demo.</p>
        		<p class="text-center"><a href="http://www.bootstrapzero.com">Learn more at BootstrapZero</a></p>
        		<br/>
        		<button class="btn btn-primary btn-lg center-block" data-dismiss="modal" aria-hidden="true">OK <i class="ion-android-close"></i></button>
        	</div>
        </div>
        </div>
    </div>
    <!--scripts loaded here -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/jquery.easing.min.js"></script>
    <script src="./js/wow.js"></script>
    <script src="./js/scripts.js"></script>
  </body>
</html>