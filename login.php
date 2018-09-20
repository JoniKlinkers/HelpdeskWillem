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
                   <a href="registeren.php"><button type="submit" value="Aanmelden" class="button">Registeren</button></a>
               </div>
           </div>
            <div class="header-search">
               <h3 class="header-search--title">Zoek je vraag hier</h3>
                <form method="post" action="FAQ-overzicht.php">
                    <input type="text" placeholder="Begin je vraag te zoeken ...">
                    <input type="submit" value="Zoeken" class="button-blue">
                </form>
            </div>
        </div>
             <?php
    include('connect.php');
        session_start();

    if(isset( $_SESSION['GebruikerId'])) {
    echo header('location: dashboard.php');
}
        $error;
        if(isset($_POST['GebruikerEmail'])) {
            $GebruikerEmail = $_POST['GebruikerEmail'];
    $password = $_POST['GebruikerWW'];
    if($_POST['GebruikerEmail'] == null){
        echo "Fout ingevuld probeer opnieuw.";
        echo '</br> <a href="index.php">back</a>';
    }else{



    if($stmt = $conn->prepare( "select GebruikerWW, GebruikerType, GebruikerId from tblgebruikers where GebruikerEmail = ?")){
        $stmt->bind_param("s", $GebruikerEmail);
        $stmt->execute();
        $stmt->bind_result($GebruikerWW, $GebruikerType, $GebruikerId);
        $stmt->fetch();

        if(password_verify($password, $GebruikerWW )){
            $_SESSION['GebruikerEmail'] = $GebruikerEmail;
            $_SESSION['GebruikerType'] = $GebruikerType;
            $_SESSION['GebruikerWW'] = $GebruikerWW;
            $_SESSION['GebruikerId'] =  $GebruikerId;

            header('location: dashboard.php');
        }else {
            $error = "De combinatie komt niet overeen.";
        }
    } else {
        echo "Fout ingevuld probeer opnieuw.";
        echo '</br> <a href="login.html">back</a>';
    }
    }
        }

?>

        <section class="login">
            <h1>Login</h1>
               <?php
            if(!empty($error)) {
                echo "<div class='error'>" . $error . "</div>";
            }
            ?>
                <form method="post" action="login.php">
                    <div>Email</div>
                    <input type="email" name="GebruikerEmail" required="required">
                    <div>Password</div>
                    <input type="password" name="GebruikerWW" required="required">
                    <div></div>
                    <input type="submit" value="Login">
                </form>
            </section>
        </div>
        <footer>
            Copyright Mango's 2018. All right reserved.
        </footer>
    </body>
</html>















    


