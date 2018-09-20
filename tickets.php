
<?php
session_start();
include('connect.php');
if(!isset( $_SESSION['GebruikerId'])) {
    echo header('location: login.php');
}

$userEmail = $_SESSION['GebruikerEmail'];
$resultaat = $conn->query("select *  from tblgebruikers where GebruikerEmail = '{$userEmail}'");
        $row = $resultaat->fetch_assoc();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Helpdesk</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="header-small">
           <div class="header-menu">
               <div class="logo">
                   <h4>MANGO'S</h4>
               </div>
               <div class="menu">
                 <li><a href="">Home</a></li>
                 <li><a href="tickets.php">Mijn tickets</a></li>
                 <li><a href="faq-overzicht.php">FAQ</a></li>
                 <li><a href="wijzigww.php">Account</a></li>
                  <li><a id="red" href="loguit.php">Uitloggen</a></li>
               </div>
           </div>
        </div>
    </div>


<?php


$SortBy = "TicketId";

if(isset ($_POST["SortBy"])){
	$SortBy = $_POST['SortBy'];
}

$sql = "SELECT * FROM tblticket ORDER BY " . $SortBy;
$result = $conn->query($sql);
?>
<div class="row">
	<div class="seven columns">
		<h1>Mijn tickets</h1>
		<div class="tickets">
				<table class="u-max-full-width">
	<tr>
		<td>TicketId</td>
		<td>Vraag</td>
		<td>CategorieId</td>
		<td>TicketDatum</td>
		<td>Status</td>
		<td>Prioriteit</td>
		<td>Moeilijk</td>
		<td>Feedback</td>
	</tr>
<?php
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
    	echo "<td>#" . $row["TicketId"]. "</td><td>" . $row["Vraag"]. "</td><td>" . $row["CategorieId"]. "</td><td>" . $row["TicketDatum"]. "</td><td>" . $row["Status"]. "</td><td>" . $row["Prioriteit"]. "</td><td>" . $row["Moeilijk"]. "</td><td>" . $row["Feedback"]. "</td>";
    	echo"</tr>";
	}
} else {
	echo "<tr><th>No tickets found.</th></tr>";
}
?>

</table>
		</div>
	</div>
	<div class="five columns">
		<div class="sorteer">
			 <h1>Sorteer tickets</h1>
<form method="post">
	<input type="radio" name="SortBy" value="TicketId">TicketId
	<input type="radio" name="SortBy" value="CategorieId">CategorieId
	<input type="radio" name="SortBy" value="TicketDatum">TicketDatum
	<input type="radio" name="SortBy" value="Status">Status
	<input type="radio" name="SortBy" value="Moeilijk">Moeilijk
	<input type="submit" value="Sorteer!">
</form>
		</div>
	   
	</div>
</div>
 
    
    <footer>
        Copyright Mango's 2018. All right reserved.
    </footer>
</body>
</html>