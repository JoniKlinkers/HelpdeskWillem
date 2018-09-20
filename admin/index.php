<?php
include 'Databank/connect.php';
?>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <title>Adminpaneel</title>
        <meta name="description" content="">
        <meta name="author" content="Willem Vansteyvoort">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/skeleton.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/queries.css">
        <link rel="stylesheet" href="css/icons.css">
        <link rel="icon" type="image/png" href="images/favicon.ico">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    </head> 
    <body>
        <div class="container">
            <div class="name">MANGOS</div>
            <div class="login-background float-left">
                <div class="login-circle"><i class="fas fa-lock"></i></div>
            </div>
            <div class="login-form float-left">
                    <?php
    session_start();
        $error;
        if(isset($_POST['GebruikerEmail'])) {
            $GebruikerEmail = $_POST['GebruikerEmail'];
    $password = $_POST['GebruikerWW'];
    if($_POST['GebruikerEmail'] == null){
        echo "Fout ingevuld probeer opnieuw.";
        echo '</br> <a href="index.php">back</a>';
    }else{
        $sql = "select * from tblgebruikers where GebruikerEmail = '".$GebruikerEmail."'";
 
    if($resultaat = $conn->query($sql)){
        $row = $resultaat->fetch_assoc();
        if(password_verify($password, $row['GebruikerWW']) && $row['GebruikerType'] == 1 ){
            $_SESSION['GebruikerEmail'] = $GebruikerEmail;
            $_SESSION['GebruikerType'] = $row['GebruikerType'];
            $_SESSION['GebruikerWW'] = $row['GebruikerWW'];
            $_SESSION['GebruikerId'] = $row['GebruikerId'];

            header('location: home.php');
        }else {
            $error = "Toegang geweigerd.";
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
                <form method="post" action="index.php">
                    <div>Email</div>
                    <input type="text" name="GebruikerEmail" required="required">
                    <div>Password</div>
                    <input type="password" name="GebruikerWW" required="required">
                    <div></div>
                    <input type="submit" value="Login" class="button-primary float-right" >
                </form>
            </div>
        </div>
    </body>
</html>