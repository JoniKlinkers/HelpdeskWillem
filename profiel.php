<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Profielpagina</title>
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
                 <li><a href="">Mijn tickets</a></li>
                 <li><a href="">FAQ</a></li>
               </div>
           </div>
        </div>
    </div>
    <h1>ProfielPagina</h1>
    <section class="profiel">
        <?php
        include "connect.php";
            session_start();
            $sql = "SELECT * FROM TblGebruikers WHERE GebruikerId ='".$_SESSION['GebruikerId']."'";
            $profiel = $conn->query($sql);
            while($row = $profiel->fetch_assoc()){
            echo "<h2>".$row['GebruikerNaam']."</h2>";
          ?>
      <div class="row">
        <div class="six columns">
          <div class="profiel-foto">
            <img class="u-max-full-width" src="https://www.db-m.nl/wp-content/uploads/2014/10/geenfoto-1024x683.jpg">
            <form class="wijzigprofiel" action='profielaanpassen.php' method='post'>
                <input type='submit' value='Gebruikergegevens Aanpassen' name='knop'>
            </form>
          </div>
        </div>
        <div class="six columns">
          <div class="profiel-info">
            <ul>
              <li id="bold">Naam</li>
                <?php
                echo "<li>".$row['GebruikerNaam']."</li>";
                ?>
                <li id="bold">E-mail</li>
                <?php
                echo "<li>".$row['GebruikerEmail']."</li>";
                ?>
                <li id="bold">GebruikerType</li>
                <?php
                echo "<li>".$row['GebruikerType']."</li>";
                ?>
                <li id="bold">Aantal tickets</li>
                <?php
                echo "<li>".$row['GebruikerPrestatie']."</li>";
                ?>
                <li id="bold">Online</li>
                <li id="green">Aanwezig</li>
            </ul>
              <?php 
            }
              ?>
          </div>
        </div>
      </div>
    </section>
    <footer>
        Copyright Mango's 2018. All right reserved.
    </footer>
</body>
</html>
