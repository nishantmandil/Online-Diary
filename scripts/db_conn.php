<?php

$sname= "sql208.epizy.com";
$uname= "epiz_27141180";
$password = "yNju4IkHKKNGN";

$db_name = "epiz_27141180_onlineDiary";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
?>