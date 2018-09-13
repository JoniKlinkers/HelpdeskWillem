<?php
	include 'connect.php';
    $vraag = $_POST['zoekterm'];
    $sql = "select * from tblfaq where FAQVraag like '%".$vraag."%'";
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
?>