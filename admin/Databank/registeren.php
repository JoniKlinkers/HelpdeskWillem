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
                   <a href="login.php"><button type="submit" value="Aanmelden" class="button">Aanmelden</button></a>
                  <a href="registeren.php"><button type="submit" value="Aanmelden" class="button">Registeren</button></a>
               </div>
           </div>
            <div class="header-search">
               <h3 class="header-search--title">Zoek je vraag hier</h3>
                <form method="post">
                    <input type="text" placeholder="Begin je vraag te zoeken ...">
                    <input type="submit" value="Zoeken" class="button-blue">
                </form>
            </div>
        </div>
        <section class="register">
            <h2>Registeren</h2>
            <div class="error">Foutief wachtwoord ingevoerd</div>
            <form method="post" action="">
                <label>Naam</label>
                <input type="text" placeholder="Gerrit Wijnske">
                <label>Email</label>
                <input type="text" placeholder="wijnske@hotmail.com">
                <label>Wachtwoord</label>
                <input type="text" placeholder="wijnske@hotmail.com">
                <label>Herhaal wachtwoord</label>
                <input type="password" placeholder="wijnske@hotmail.com">
                <input type="submit" value="Registeren" class="button-blue">
            </form>
        </section>
    </div>
    <footer>
        Copyright Mango's 2018. All right reserved.
    </footer>
</body>
</html>
