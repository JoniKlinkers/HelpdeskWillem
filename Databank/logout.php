<?php

include 'connect.php';

session_start();

if (isset($_SESSION['u_id'])) {
	session_destroy();
	header("Location: index.php");
	exit();
}else{
	header("Location: index.php");
	exit();
}