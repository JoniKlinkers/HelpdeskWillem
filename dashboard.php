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
    <section class="welcome">
        <h3>Welkom <?php echo $row['GebruikerNaam']; ?></h3>
        <p>Etiam pretium ante et accumsan porttitor. Duis cursus quis lorem quis faucibus. Quisque aliquam, lorem eget rutrum facilisis, eros neque commodo elit, at tincidunt justo dui hendrerit mi. Cras lacinia nisi mauris, sed bibendum dolor sagittis non. In ut pharetra sapien. Nulla quis interdum massa, aliquet hendrerit quam. Vivamus maximus sagittis pharetra. Fusce pretium tristique mauris, ut dignissim metus mattis sit amet. Nam dolor purus, semper eget imperdiet </p>
        <button class="button">Maak een nieuw ticket</button>
    </section>
    <div class="new-ticket">   
    <p></p> 
    </div>
    <section>
        <div class="header-search2">
               <h3 class="header-search--title">Zoek je vraag hier</h3>
                <form method="post" action="faq-overzicht.php">
                    <input type="text" placeholder="Begin je vraag te zoeken ...">
                    <input type="submit" value="Zoeken" class="button-blue">
                </form>
            </div>
    </section>
     <section class="options">
            <div class="row">
                <div class="four columns">
                    <a href="tickets.php"><i class="fas fa-list-ul"></i></a>
                    <h4>Bekijk je tickets</h4>
                </div>
                <div class="four columns">
                    <a href=""><i class="fas fa-user-alt"></i></a>
                    <h4>Bekijk mijn profiel</h4>
                </div>
                <div class="four columns">
                    <a href="faq-overzicht.php"><i class="fas fa-search"></i></a>
                    <h4>Zoek een vraag</h4>
                </div>
            </div>
        </section>
    <footer>
        Copyright Mango's 2018. All right reserved.
    </footer>
</body>
</html>