<?php
	include 'connect.php';
    $vraag = 'blabal'
    $sql = "select * from tblfaq where FAQVraag is ".$vraag."";
    $resultaat = $conn->query($sql);
    echo"<table>";
    echo"<tr>";
    echo"<td>VraagID</td>";
    echo"<td>Vraag</td>";
    echo"<td>Antwoord</td>";
    echo"</tr>";
    while ($row = $resultaat->fetch_assoc()) {
        echo "<tr><td>". $row['FAQId'] ."</td><td>". $row['FAQVraag'] ."</td><td>". $row['FAQAntwoord'] ."</td></tr>";
    }
    echo "<table>";
    print "<a href=toevoegenProduct.php>Voeg een record toe</a>";

?>