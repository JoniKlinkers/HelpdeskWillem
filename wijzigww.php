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
  <link rel="stylesheet" href="./css/normalize.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/skeleton.css">
  <link rel="icon" type="image/png" href="../images/favicon.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="header">
           <div class="header-menu">
               <div class="logo">
                   <h4>MANGO'S</h4>
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
        <section class="wijzigww">
            <h2 class="wwtitle">Wachtwoord wijzigen</h2>
                <?php
                include "connect.php";
                session_start();
            
            $error;
            
                $sql = "SELECT GebruikerWW FROM TblGebruikers WHERE GebruikerId ='".$_SESSION['GebruikerId']."'";
                $ww = $conn->query($sql);
                if(isset($_POST['knop'])){
                    if($_POST['wachtwoord'] == '' || $_POST['checkww'] == '' || $_POST['nieuwww'] == ''){
                        printform();
                        echo "Gelieve alle velden in te vullen.";
                    }else{
                        while($row = $ww->fetch_assoc()) {
                            if(password_verify($_POST['wachtwoord'],$row['GebruikerWW'])){
                                if($_POST['checkww'] == $_POST['nieuwww']){
                                    $password_hash = password_hash($_POST['nieuwww'], PASSWORD_DEFAULT);
                                    $sql = "UPDATE TblGebruikers SET GebruikerWW ='".$password_hash."' WHERE GebruikerId ='".$_SESSION['GebruikerId']."'";
                                    if(mysqli_query($conn, $sql)){
                                         echo "Je hebt je wachtwoord succesvol gewijzigd.";
                                    }else{
                                        $error = "Er is een onverwachte fout gelopen bij het wijzigen.";
                                    }
                                }else{
                                    $error = "De wachtwoorden komen niet overeen.";
                                }
                            }else{
                                $error = "Foutief wachtwoord";
                            }
                        }
                    }
                }else{
                    printform();
                }
                function printform(){
                
                }
                ?>
            
            <?php
            if(!empty($error)) {
                echo "<div class='error'>" . $error . "</div>";
            }
            ?>
             <table class='wwtable'>
                 <form action='wijzigww.php' method='post'>
                <tr><td>Huidig wachtwoord</td></tr><tr><td><input type='password' name='wachtwoord'></td></tr>
                <tr><td>Nieuw wachtwoord</td></tr><tr><td><input type='password' name='nieuwww'></td></tr>
                <tr><td>Opnieuw invullen</td></tr><tr><td><input type='password' name='checkww'></td></tr>
                <tr><td><input type='submit' value='Wijzig wachtwoord' name='knop'></td></tr>
                 </form>
            </table>
        </section>
        
        </div>
        <footer>
            Copyright Mango's 2018. All right reserved.
        </footer>
    </body>
</html>
