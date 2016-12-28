<?php

 function connectDB(){
	if (!$link = new PDO('mysql:host=localhost;dbname=evento', 'root', '')) {
	    echo 'Could not connect to mysql';
	    exit;
	}
	return $link;
}

?>