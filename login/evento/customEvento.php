<!doctype html>
<html lang="en">
<head>
    <?php
        include_once 'assets/backend/functions.php';
        $user = iniciarSessao();
        // recupera o nome do usuário logado na sessão, aqui também será criada a verificação de login para
        // acesso posteriormente
        include 'assets/backend/event.php';
        ob_start();
        error_reporting(0);
    ?>

    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Light Bootstrap Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


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
                                <h4 class="title">Customizar Evento</h4>
                            </div>
                            <div class="content">
                                <form method="POST" id="custom-festa" name = "custom-festa">
                                    <div id = "success"></div>
                                    <div id = "error"></div>
                                    <div class = "row">
                                        <div class ="col-md-2">
                                            <div class = "form-group">
                                                <!-- formulário para customização de evento aqui! -->
                                                <label> ID evento </label>
                                                <input name = "url" readonly type="text" id="url" class="form-control" value= <?php 
                                                // trecho responsável por recuperar a URL do evento sendo trabalhado, utilizar para pegar o ID evento
                                                if (!isset($_REQUEST['url'])) 
                                                    {echo "erro!";}  
                                                else
                                                    {
                                                        $url = $_REQUEST['url'];
                                                        $evento_id = verificaDono($user, $url);
                                                        echo "$evento_id";
                                                    } 
                                                ?>  ></input>
                                            </div>
                                        </div>
                                        <div class = "col-md-2">
                                            <div class ="form-group">
                                                <!-- Button trigger modal -->
                                                <label> *Mapa das posições do template </label>
                                                <input type="button" class="btn btn-info btn-fill" data-toggle="modal" data-target="#myModal" value="ver template"></input>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Endereço do Evento</label>
                                                <input type="text" name = "endereco" class="form-control" placeholder="endereço">
                                            </div>
                                        </div>
                                    </div>

                                    <div class ="row">
                                        <div class ="col-md-12">
                                            <label>Texto 1</label>
                                            <textarea rows="5" name = "mensagem1" id = "mensagem1" class ="form-control"> texto padrão(a fazer)</textarea>
                                        </div>
                                    </div>

                                    <div class ="row">
                                        <div class ="col-md-12">
                                            <label>Texto 2</label>
                                            <textarea rows="5" name = "mensagem2" id = "mensagem2" class ="form-control">texto padrão (a fazer) </textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>evento no facebook</label>
                                                    <input type="text" id="eventFacebook" name = "eventFacebook" class="form-control" placeholder="link do evento no facebook">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fanpage no facebook</label>
                                                    <input type="text" id="fanpageFacebook" name = "fanpageFacebook" class="form-control" placeholder="link da fanpage do evento no facebook">
                                                </div>
                                            </div>
                                    </div>

                                    <div class ="row">
                                        <div class ="col-md-6">
                                            <label>Imagem 1</label>
                                            <input type="file" name = "imagem1" id = "imagem1" class ="upload"></input>
                                        </div>

                                        <div class ="col-md-6">
                                            <label>Imagem 2</label>
                                            <input type="file" name = "imagem2" id = "imagem2" class ="upload"></input>
                                        </div>
                                    </div>
                                    <!-- gera o mapa para escolha do local, alterado apartir da página de criação do evento -->
                                    <style>
                                    #map-canvas {height: 400px}
                                    </style>
                                    <label>Escolha no mapa o local do seu evento! Arraste o marcador para indicar o local exato.</label>
                                    <div class = "row">
                                        <div class ="col-md-4">
                                            <div class ="form-group">
                                                <input id="search-txt" type="text" class="form-control" placeholder="Digite o Local do evento">
                                            </div>
                                        </div>
                                        <div class ="col-md-1">
                                            <div class ="form-group">
                                                <input id="search-btn" type="button" class = "btn btn-info btn-fill " value="Buscar">
                                            </div>
                                        </div>
                                        <div class ="col-md-6">
                                            <div class ="form-group">
                                                <input id="detect-btn" type="button" class = "btn btn-info btn-fill pull-left" value="Detectar minha localização">
                                            </div>
                                        </div>
                                    </div>
                                    <div class ="col-md-8" id="map-canvas"></div>
                                    <!-- Gambiarra!!! Cria um campo invizivel e o preenche com as coordenadas, daqui é possivel pegar os valores e enviar para o PHP  -->
                                    <input name = "latitude" class = "col-md-8" type="text" id="map-output" value="" style="visibility:hidden"></input>
                                    <input name = "longitude" class = "col-md-8" type="text" id="map-output2" value="" style="visibility:hidden"></input>

                                    <div class ="row">
                                        <button name = "salvarDados" id ="salvarDados" class="btn btn-info btn-fill pull-right">Salvar Dados</button>
                                        <div class ="clearfix"></div>
                                    </div>
                                </form>
                            <!-- end content-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

    <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modelo template</h4>
                    </div>
                    <div class="modal-body">
                        foto estará aqui
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  script google maps -->
    <script src = "assets/js/maps.js"></script>
    <script src="//maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;key=AIzaSyApzbVcgIb-qVPP3jNbCTB0TmxMmTHK0es&amp;callback=loadmap" defer></script>


    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Scripts de validação -->

    <script src="jquery-validation-1.11.1/jquery.validate.js"></script>
    <script src="assets/js/festa.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>


</html>
