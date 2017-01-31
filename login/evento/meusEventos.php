<!doctype html>
<html lang="en">
<head>
    <?php
        // recupera o nome do usuário logado na sessão, aqui também será criada a verificação de login para
        // acesso posteriormente
        include_once '../dbconfig.php';
        session_start();
        $user = $_SESSION['user_session'];
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
                <li >
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
                <li class="active">
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
                    <a class="navbar-brand" href="#">Meus Eventos</a>
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
                                <h4 class="title">Gerenciar Meus Eventos</h4>
                            </div>
                            <div class="content">
                               <!-- conteudo da página aqui -->
                                <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Data</th>
                                        <th>Local</th>
                                        <th>Gerenciar</th>
                                    </thead>
                                    <tbody>
                                            <?php
                                            // carrega os eventos criados por um respectivo usuário, permite edição
                                                $user_email = getEmailSessao($user);    
                                                $con = connectDB();
                                                $stmt = $con->prepare("SELECT * FROM evento WHERE user_Email = :user_email");
                                                $stmt->bindParam(':user_email', $user_email);
                                                $stmt->execute();

                                                if ($stmt->rowCount() == 0){
                                                    echo '<tr>';
                                                    echo "<td> você ainda não possui nenhum evento criado </td>";
                                                    echo '</tr>';
                                                }

                                                foreach($stmt as $row){
                                                    echo '<tr>';
                                                    echo "<td>".$row['idEvento']."</td>";
                                                    echo"<td>".$row['nomeEvento']."</td>";
                                                    echo"<td>".$row['data_evento']."</td>";
                                                    echo"<td>".$row['local']."</td>";
                                                    if ($row['tipo_evento'] == "casamento"){
                                                        echo<<<EOT
                                                        <td> <button onclick="window.location.href='customCasamento.php?url={$row['url']}'" 
                                                        class ="btn btn-primary">Editar</button>
                                                        <button onclick="window.location.href='changeTemplate.php?url={$row['url']}'" 
                                                        class ="btn btn-warning">Alterar Template</button>
                                                        <button onclick="window.location.href='eventos.php?nome={$row['url']}'" 
                                                        class ="btn btn-success btn-fill">Vizualizar</button>
                                                        <button onclick="window.location.href='assets/backend/deleteEvento.php?url={$row['url']}'" 
                                                        class ="btn btn-danger btn-fill">delete</button> 
                                                        </td>
EOT;
                                                    }
                                                    if ($row['tipo_evento'] == "festa"){
                                                        echo<<<EOT
                                                        <td> <button onclick="window.location.href='customEvento.php?url={$row['url']}'" 
                                                        class ="btn btn-primary">Editar</button> 
                                                        <button onclick="window.location.href='changeTemplate.php?url={$row['url']}'" 
                                                        class ="btn btn-warning">Alterar Template</button>
                                                        <button onclick="window.location.href='eventos.php?nome={$row['url']}'" 
                                                        class ="btn btn-success btn-fill">Vizualizar</button>
                                                        <button onclick="window.location.href='assets/backend/deleteEvento.php?url={$row['url']}'" 
                                                        class ="btn btn-danger btn-fill">delete</button> 
                                                        </td>
EOT;
                                                    }


                                                    echo '</tr>';
                                                }
                                            ?>
                                    </tbody>
                                </table>

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

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
    <script src="assets/js/evento.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>


</html>
