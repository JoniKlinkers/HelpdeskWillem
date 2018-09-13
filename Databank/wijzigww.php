<?php
include "connect.php";
session_start();
$sql = "SELECT GebruikerWW FROM TblGebruikers WHERE GebruikerId ='1'";
$ww = $conn->query($sql);
if(isset($_POST['knop'])){
    while($row = $ww->fetch_assoc()) {
        if(password_verify($_POST['wachtwoord'], $row['GebruikerWW'])){
            if($_POST['checkww'] == $_POST['nieuwww']){
                $sql = "UPDATE TblGebruikers SET GebruikerWW ='".$_POST['nieuwww']."' WHERE GebruikerId ='1'";
                if(mysqli_query($conn, $sql)){
                    echo "Je hebt je wachtwoord succesvol gewijzigd.";
                }else{
                    printform();
                    echo "Er is een onverwachte fout gelopen bij het wijzigen.";
                }
            }else{
                printform();
                echo "De wachtwoorden komen niet overeen.";
            }
        }else{
            printform();
            echo "Foutief wachtwoord.";
        }
    }
}else{
    printform();
}
function printform(){
    echo "<table>";
    echo "<tr><td><form action='wijzigww.php' method='post'></tr></td>";
    echo "<tr><td>Huidig wachtwoord</tr></td><tr><td><input type='text' name='wachtwoord'></tr></td>";
    echo "<tr><td>Nieuw wachtwoord</tr></td><tr><td><input type='text' name='nieuwww'></tr></td>";
    echo "<tr><td>Opnieuw invullen</tr></td><tr><td><input type='text' name='checkww'></tr></td>";
    echo "<tr><td><input type='submit' value='Wijzig wachtwoord' name='knop'></tr></td>";
    echo "</table>";
}
?>