<?php

include 'connect.php';

session_start();

if (isset($_POST['submit']) && !isset($_SESSION['u_id'])) {
	$sql = "SELECT * FROM tblgebruikers WHERE GebruikerEmail = '".$_POST['Email']."' AND GebruikerWW = '".$_POST['passwoord']."';";
	$result = mysqli_query($conn, $sql);
	$numberRows = mysqli_num_rows($result);

	if ($numberRows == 1) {
		if ($row = mysqli_fetch_assoc($result)) {
			$_SESSION['u_id'] = $row['GebruikerId'];
			$_SESSION['u_uid'] = $row['GebruikerEmail'];
            $_SESSION['u_naam'] = $row['GebruikerNaam'];
            $_SESSION['u_avatar'] = $row['GebruikerAvatar'];
			$_SESSION['u_type'] = $row['GebruikerType'];
		}	

		header("Location: index.php");
		exit();
	}else{
		header("Location: index.php");
		exit();
	}
}else{
	header("Location: index.php");
	exit();
}
