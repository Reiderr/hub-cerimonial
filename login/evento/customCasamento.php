<!doctype html>
<html lang="en">
<head>
    <?php
        // recupera o nome do usuário logado na sessão, aqui também será criada a verificação de login para
        // acesso posteriormente
        include_once 'assets/backend/event.php';
        session_start();
        $user = $_SESSION['user_session'];
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
                    <a href="table.html">
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
                    <a href="upgrade.html">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
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
                            <a href="#">
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
                                <h4 class="title">Customizar Casamento</h4>
                            </div>
                            <div class="content">
                                <form method="POST" id="custom-casamento" name = "custom-casamento">
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
                                                        $evento = new Evento();
                                                        $evento->initEvento($url);
                                                        $user_email = getEmailSessao($user);//recebe email do usuário logado para verificar a integridade do sistema
                                                        if ($user_email != $evento->getUserEmail()){header( "Location: 403.php" );}//verifica se o usuário logado é dono do evento
                                                        $evento_id = $evento->getId();
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
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Lista de presentes</label>
                                                    <input type="text" id="listaPresentes" name = "listaPresentes" class="form-control" placeholder="link para sua lista de presentes virtual">
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

                                    <div class ="row">
                                        <button name = "salvarCasamento" id ="salvarCasamento" class="btn btn-info btn-fill pull-right">Salvar Dados</button>
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

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Scripts de validação -->

    <script src="jquery-validation-1.11.1/jquery.validate.js"></script>
    <script src="assets/js/casamento.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>


</html>
