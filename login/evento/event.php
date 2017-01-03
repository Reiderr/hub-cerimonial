

<?php
// exemplo de como puxar o link para o php e carregar páginas dinamicamente... exemplo de link : event.php?nome=joaoemaria
// carrega apenas o 'joaoemaria', dai é possivel carregar a página baseada nessa entrada do banco de dados
    $id = ($_REQUEST['nome']);
    echo ($id);
?>