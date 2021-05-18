<?php

$hostname = "localhost";
$database = "elarwika";
$username = "root";
$password = "";
/*
$hostname = "localhost";
$database = "c1582487c_arwika2DB";
$username = "c1582487c_usruser2";
$password = "w2w}LGP=X*wD";
*/

$base = @mysqli_connect($hostname, $username, $password) or trigger_error(mysqli_connect_error(),E_USER_ERROR); 
mysqli_select_db ($base,$database);

?>