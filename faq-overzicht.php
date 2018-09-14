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
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="header">
           <div class="header-menu">
               <div class="logo">
                   <h4>MANGO'S</h4>
               </div>
               <div class="menu">
                  <a href="login.php"><button type="submit" value="Aanmelden" class="button">Aanmelden</button></a>
                  <a href="registeren.php"><button type="submit" value="Aanmelden" class="button">Registeren</button></a>
               </div>
           </div>
            <div class="header-search">
               <h3 class="header-search--title">Zoek een andere vraag</h3>
                <form method="post" action="FAQ-overzicht.php">
                    <input type="text" placeholder="Begin je vraag te zoeken ..." name="zoekterm">
                    <input type="submit" value="Zoeken" class="button-blue">
                </form>
            </div>
        </div>
        <section class="tabel">
           <div class="accordion">
              <?php
              include 'connect.php';
              $vraag = $_POST['zoekterm'];
              $sql = "select * from tblfaq where FAQVraag like '%".$vraag."%'";
              $resultaat = $conn->query($sql);
              $i=0;
              while ($row = $resultaat->fetch_assoc()) {
                $i++;
                  echo'<div class="accordion--element">';
                    echo'<div class="accordion--head">';
                      echo'<a href="#accordion'.$i.'" aria-expanded="false" aria-controls="accordion'.$i.'" class="accordion-title accordionTitle js-accordionTrigger">'.$row['FAQVraag'].'</a>';
                      echo'</div>';
                    echo'<div class="accordion-content accordionItem is-collapsed">';
                      echo'<p style="text-align:center">'.$row['FAQAntwoord'].'</p>';
                  echo'</div>';
              echo'</div>';
              } 
            ?>
          </div>
        </section>
    </div>
    <footer>
        Copyright Mango's 2018. All right reserved.
    </footer>
    <script src="../js/script.js"></script>
</body>
</html>
