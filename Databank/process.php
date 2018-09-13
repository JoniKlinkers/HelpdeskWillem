<?php
    session_start();
    include "connect.php";

    $GebruikerEmail = $_POST['GebruikerEmail'];
    $password = $_POST['GebruikerWW'];
    if($_POST['GebruikerEmail'] == null){
        echo "Fout ingevuld probeer opnieuw.";
        echo '</br> <a href="index.php">back</a>';
    }else{
        $sql = "select * from tblgebruikers where GebruikerEmail = '".$GebruikerEmail."'";
 
    if($resultaat = $conn->query($sql)){
        $row = $resultaat->fetch_assoc();
        if(password_verify($password, $row['GebruikerWW'])){
            $_SESSION['GebruikerEmail'] = $GebruikerEmail;
            $_SESSION['GebruikerType'] = $row['GebruikerType'];
            $_SESSION['GebruikerWW'] = $row['GebruikerWW'];
            $_SESSION['GebruikerId'] = $row['GebruikerId'];

            header('location: ../index.php');
        }else {
        echo "Fout ingevuld probeer opnieuw.";
        echo '</br> <a href="login.html">back</a>';
        }
    } else {
        echo "Fout ingevuld probeer opnieuw.";
        echo '</br> <a href="login.html">back</a>';
    }
    }
?>
