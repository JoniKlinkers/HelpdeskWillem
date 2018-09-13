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
include('\\connect.php');
if(isset($_POST['GebruikerNaam'])) {
    $GebruikerEmail = $_POST['GebruikerEmail'];
    $GebruikerNaam = $_POST['GebruikerNaam'];
    $GebruikerWW =$_POST['GebruikerWW'];
    $GebruikerAvatar =$_POST['GebruikerAvatar'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
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
                header("Location: index.php");
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
                   <a href="login.html"><button type="submit" value="Aanmelden" class="button">Aanmelden</button></a>
                  <a href="registeren.html"><button type="submit" value="Aanmelden" class="button">Registeren</button></a>
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
            <form method="post" action="">
                <label>Naam</label>
                <input type="text" name="GebruikerNaam" placeholder="Gerrit Wijnske">
                <label>Email</label>
                <input type="text" name="GebruikerEmail" placeholder="wijnske@hotmail.com">
                <label>Avatar url</label>
                <input type="text" name="GebruikerAvatar" placeholder="https://vignette.wikia.nocookie.net/blogclan-2/images/b/b9/Random-image-15.jpg/revision/latest?cb=20160706220047">
                <label>Wachtwoord</label>
                <input type="password" name="GebruikerWW" placeholder="azerty123">
                <label>Herhaal wachtwoord</label>
                <input type="password" name="GebruikerWW2" placeholder="azerty123">
                <input type="submit" value="Registeren" class="button-blue">
            </form>
        </section>
    </div>
    <footer>
        Copyright Mango's 2018. All right reserved.
    </footer>
</body>
</html>
