<?php
include "connect.php";
session_start();
$sql = "SELECT * FROM TblGebruikers WHERE GebruikerId =".$_SESSION['GebruikerId']."";
$result = $conn->query($sql);
echo "<table>";
while($row = $result->fetch_assoc()) {
    echo "<tr><td>Naam: </td><td>".$row['GebruikerNaam']."</td></tr><tr><td>E-mail: </td><td>".$row['GebruikerEmail']."</td></tr>";
    echo "<tr><td>Type gebruiker: </td><td>".$row['GebruikerType']."</td></tr><tr><td>Aantal tickets: </td><td>".$row['GebruikerPrestatie']."</td></tr>";
}
echo "</table>";

?>