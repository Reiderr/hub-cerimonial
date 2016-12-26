<?php

 function connectDB(){
	if (!$link = mysql_connect('localhost', 'root', '')) {
	    echo 'Could not connect to mysql';
	    exit;
	}

	if (!mysql_select_db('evento', $link)) {
	    echo 'Could not select database';
	    exit;
	}

	return $link;
}

?>