<?php 

include_once "dbconfig.php";

$user = $_SESSION['user_session'];
$url = $_REQUEST['url'];

$con = connectDB();
$stmt = $con->prepare("DELETE FROM evento WHERE url = :url");
$stmt->bindParam(':url', $url);
$stmt->execute();

header( "Location: ../../meusEventos.php" );



?>