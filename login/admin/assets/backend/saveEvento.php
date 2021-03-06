<?php
if(isset($_POST['criarEvento'])){
  //iniciar sessão
  session_start();
  $user = $_SESSION['user_session'];


 //conexão com o banco de dados
  include 'eventFesta.php';
  include 'eventCasamento.php';
  $con = connectDB();
  //recuepera o email do usuário logado para vincular ao evento
  $user_logado = getEmailSessao($user);

  $tipo_evento = ($_POST['tipo']);
  $nome_evento = trim($_POST['nomeEvento']);
  $URL = trim($_POST['URL']);
  $dataEvento = trim($_POST['dataEvento']);
  $publicado = 1;

  $layout = '1';//alterar para entrada dinâmica antes da produção, incluir um formulário para escolha do layout!

 //query para criação do evento
  $stmt = $con->prepare("INSERT INTO evento (nomeEvento, url, user_Email, layout, published, data_evento, tipo_evento) 
    VALUES (:nome_evento, :URL, :email_logado, :layout, :publicado, :dataEvento, :tipoEvento)");
  
  $stmt-> bindParam(':nome_evento', $nome_evento);
  $stmt-> bindParam(':URL', $URL);
  $stmt-> bindParam(':dataEvento', $dataEvento);
  $stmt-> bindParam(':email_logado', $user_logado);
  $stmt-> bindParam(':layout', $layout);
  $stmt-> bindParam(':tipoEvento', $tipo_evento);
  $stmt-> bindParam(':publicado', $publicado);

 if (!$stmt->execute()) {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysql_error();
      echo "erro!";
      exit;
  }
      else{
        if($tipo_evento == 'festa'){// verifica qual o tipo do evento para saber qual das tabelas preencher
            $festa = new Festa();// no momento em que o evento é criado, também cria uma entrada para festa
            $festa->saveFesta($URL);// assim é possivel apenas dar um UPDATE para atualizar os dados, podendo usar a mesma tela para edição
        }
        if($tipo_evento == 'casamento'){
            $casamento = new Casamento();// no momento em que o evento é criado, também cria uma entrada para festa
            $casamento->saveCasamento($URL);// assim é possivel apenas dar um UPDATE para atualizar os dados, podendo usar a mesma tela para edição
        }
        echo json_encode(array($tipo_evento,$URL, 'success')); // retorna o tipo do evento e a url para customização
      }
}


?>
