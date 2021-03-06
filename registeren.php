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
<?php
include('./connect.php');
session_start();
if(isset( $_SESSION['GebruikerId'])) {
    echo header('location: dashboard.php');
}
if(isset($_POST['GebruikerNaam'])) {
    $GebruikerEmail = $_POST['GebruikerEmail'];
    $GebruikerNaam = $_POST['GebruikerNaam'];
    $GebruikerWW =$_POST['GebruikerWW'];
    $GebruikerAvatar =$_POST['GebruikerAvatar'];
    $password_hash = password_hash($GebruikerWW, PASSWORD_DEFAULT);
    $sql = "INSERT INTO tblgebruikers (GebruikerEmail, GebruikerNaam, GebruikerWW, GebruikerAvatar) VALUES (
            '".$GebruikerEmail."', 
            '".$GebruikerNaam."',
            '".$password_hash."',
            '".$GebruikerAvatar."'
            )";
        $resultaat = $conn->query("select count(*) as aantal from tblgebruikers where GebruikerEmail = '".$GebruikerEmail."'");
        $row = $resultaat->fetch_assoc();
        if ($row['aantal'] == 0){
            if ($conn->query($sql)) {
                session_start();
                $_SESSION["GebruikerEmail"] = $GebruikerEmail;
                header("Location: stuurbevestigingmail.php");
            } else {
                echo "Error record toevoegen: ". $conn->error."<br>";
            }
        }else{
            echo "Email bestaat al probeer opnieuw<br>";
        }
        
}
?>    
    <div class="container">
        <div class="header">
           <div class="header-menu">
               <div class="logo">
                   <h4>MANGO'S</h4>
                </div>
                <div class="menu">
                  <a href="login.php"><button type="submit" value="Aanmelden" class="button">Aanmelden</button></a>
                </div>
           </div>
            <div class="header-search">
               <h3 class="header-search--title">Zoek je vraag hier</h3>
                <form method="post" action="FAQ-overzicht.php">
                    <input type="text" placeholder="Begin je vraag te zoeken ..." name="zoekterm">
                    <input type="submit" value="Zoeken" class="button-blue">
                </form>
            </div>
        </div>
        <section class="register">
            <h2>Registeren</h2>
            <form method="post" action="">
                <label>Naam</label>
                <input type="text" name="GebruikerNaam" placeholder="Gerrit Wijnske" required="">
                <label>Email</label>
                <input type="Email" name="GebruikerEmail" placeholder="wijnske@hotmail.com" required="">
                <label>Avatar url</label>
                <input type="text" name="GebruikerAvatar" placeholder="https://www.website.com/image.png" required="">
                <label>Wachtwoord</label>
                <input type="password" name="GebruikerWW" placeholder="azerty123" required="">
                <label>Herhaal wachtwoord</label>
                <input type="password" name="GebruikerWW2" placeholder="azerty123" required="">
                <input type="submit" value="Registeren" class="button-blue">
            </form>
        </section>
    </div>
    <footer>
        Copyright Mango's 2018. All right reserved.
    </footer>
</body>
</html>
