<?php
session_start();
include ("Databank/connect.php");

$sql = "SELECT * FROM ((tblticket
INNER JOIN tblgebruikers ON tblgebruikers.GebruikerId = tblticket.GebruikerId)
INNER JOIN tblcategorie ON tblcategorie.CategorieId = tblticket.CategorieId)";
if($result = $conn->query($sql)){
$row = $result->fetch_assoc();
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
                   <a href="./databank/login.html"><button type="submit" value="Aanmelden" class="button">Aanmelden</button></a>
                  <a href="registeren.php"><button type="submit" value="Aanmelden" class="button">Registeren</button></a>
               </div>
           </div>
        </div>
        <div>
          <table>
            <tr>
              <th><h2>Ticket #<?php echo $row['TicketId'];?></h2></th>
            </tr>
            <tr>
              <th><h2>Status: <?php echo $row['Status'];?></h2></th>
            </tr>
            <tr>
              <td>Gevraagd door</td><td><?php echo $row['GebruikerNaam'];?></td>
            </tr>
            <tr>
              <td>Gevraagd op</td><td><?php echo $row['TicketDatum'];?></td>
            </tr>
            <tr>
              <td>Prioriteit</td><td><?php echo $row['Prioriteit'];?></td>
            </tr>
            <tr>
              <td>Categorie</td><td><?php echo $row['CategorieNaam'];?></td>
            </tr>
            <tr>
              <td>Vraag</td><td><?php echo $row['Vraag'];?></td>
            </tr>
            <?php
            }else{
              echo "Error";
            }
            $sql = "SELECT * FROM ((tblbericht 
            INNER JOIN tblticket ON tblbericht.TicketId = tblticket.TicketId)
            INNER JOIN tblgebruikers ON tblbericht.GebruikerId = tblgebruikers.GebruikerId)";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<tr><th><h2>Bericht verzonden door: ".$row['GebruikerNaam']."</h2></th></tr>";
                echo "<tr><th><h3>Berichtinhoud</h3></th></tr>";
                echo "<tr><td>".$row['BerichtInhoud']."</td></tr>";
                echo "<tr><td>Verzonden op: ".$row['BerichtDatum']."</td></tr>";
              }
            } else {
              echo "<tr><th>Er zijn nog geen berichten verstuurd.</th></tr>";
            }
            ?>
          </table>
        </div>
    </div>
    <footer>
        Copyright Mango's 2018. All right reserved.
    </footer>
</body>
</html>