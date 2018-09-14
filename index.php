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
        <div class="header">
           <div class="header-menu">
               <div class="logo">
                   <h4>MANGO'S</h4>
               </div>
               <div class="menu">
                   <a href="./databank/login.php"><button type="submit" value="Aanmelden" class="button">Aanmelden</button></a>
                  <a href="./Databank/registeren.php"><button type="submit" value="Aanmelden" class="button">Registeren</button></a>
               </div>
           </div>
            <div class="header-search">
               <h3 class="header-search--title">Zoek je vraag hier</h3>
                <form method="post" action="./databank/FAQ-overzicht.php">
                    <input type="text" name="zoekterm" placeholder="Begin je vraag te zoeken ...">
                    <input type="submit" value="Zoeken" class="button-blue">
                </form>
            </div>
        </div>
        <section class="options">
            <div class="row">
                <div class="four columns">
                    <i class="fas fa-question-circle"></i>
                    <h4>Maak een ticket</h4>
                </div>
                <div class="four columns">
                    <i class="fas fa-list-ul"></i>
                    <h4>Bekijk je tickets</h4>
                </div>
                <div class="four columns">
                    <i class="fas fa-camera"></i>
                    <h4>Stuur bijlages mee</h4>
                </div>
            </div>
        </section>
    </div>
    <footer>
        Copyright Mango's 2018. All right reserved.
    </footer>
</body>
</html>
