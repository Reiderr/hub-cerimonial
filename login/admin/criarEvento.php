<!doctype html>
<html lang="en">
<head>
    <?php
        // recupera o nome do usuário logado na sessão, aqui também será criada a verificação de login para
        // acesso posteriormente
        include_once 'assets/backend/dbconfig.php';
        include_once 'assets/backend/functions.php';
        $user = iniciarSessao();
    ?>

	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/modernizr.js" type="text/javascript"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <link rel="stylesheet" href="assets/css/jquery-ui.css">




    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                    <?php
                    // imprime o nome do usuário logado na sidebar
                    $user_logado = getNomeSessao($user);
                    echo 'Bem Vindo, ', $user_logado;
                    ?>
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="tipoEvento.php">  
                        <i class="pe-7s-pen"></i>
                        <p>Criar Evento</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>Editar Perfil</p>
                    </a>
                </li>
                <li>
                    <a href="meusEventos.php">
                        <i class="pe-7s-note2"></i>
                        <p>Meus Eventos</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
                <li class="active-pro">
                    <p><?php getVersion(); ?></p>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Criar Evento</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="assets/backend/logout.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Vamos Criar seu evento, iremos customiza-lo em seguida!</h4>
                            </div>
                            <div class="content">
                                <form method="POST" id="cadastroEvento" name = "cadastroEvento">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Nome do Evento</label>
                                                <input type="text" name='nomeEvento' class="form-control" placeholder="Nome do Evento" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label >Data do evento</label>
                                                <input type="date" id="dataEvento" name='dataEvento' class="form-control">
                                            </div>
                                            <script>
                                                  $(function(){           
                                                    if (!Modernizr.inputtypes.date) {
                                                        $('input[type=date]').datepicker({
                                                              dateFormat : 'yy-mm-dd'
                                                            }
                                                         );
                                                    }
                                                 });
                                            </script>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Endereço da página do evento (URL)</label>
                                                <input type="text" name = "URL" class="form-control" placeholder="este será o endereço do seu site: Ex meu_site = tbd.com/evento/meu_site">
                                            </div>
                                        </div>
                                    </div>


                                    <input name = "tipo" type="text" id="tipo" value= <?php 

                                    if (!isset($_REQUEST['tipo'])) 

                                        {echo "erro!";}  // verificar se a url de entrada não foi alterada, caso esse isso resulte em erro, retornar para página de criação

                                    else

                                        {$tipo = $_REQUEST['tipo']; echo "$tipo";} 

                                    ?> style= "visibility:hidden"  ></input>

                                    <div> será adicionado aqui uma escolha para template, também será criada uma tela para escolher
                                        individualmente depois! (acredito que será um função bem utilizada)</div>


                                    <!-- exibe mensagem de erro ou sucesso #trabalhar esses outputs no javascript conforme desenvolvimento -->
                                    <div id = "success"></div>
                                    <div id = "error"></div>

                                    <div class ="row">
                                        <button name = "criarEvento" id ="criarEvento" class="btn btn-success btn-fill pull-right">Criar Evento</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
<footer>
    alpha build 1.0
</footer>



	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Scripts de validação -->

    <script src="jquery-validation-1.11.1/jquery.validate.js"></script>
    <script src="assets/js/evento.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>


</html>
