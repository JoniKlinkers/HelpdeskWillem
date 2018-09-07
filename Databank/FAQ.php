<?php
	include 'connect.php';
    $sql = "select * from tblfaq";
    $resultaat = $mysqli->query($sql);
    echo"<table>";
    echo"<tr>";
    echo"<td>Productnummer</td>";
    echo"<td>Productnaam</td>";
    echo"<td>Prijs</td>";
    echo"<td>Stock</td>";
    echo"</tr>";
    while ($row = $resultaat->fetch_assoc()) {
        echo "<tr><td>". $row['Productnummer'] ."</td><td>". $row['Productnaam'] ."</td><td>€". $row['Prijs'] ."</td><td>". $row['Stock'] ."stuks</td><td><a href=wissenProduct.php?tewissen=". $row['Productnummer'].">Wissen</a></td><td><a href=wijzigProduct.php?teveranderen=". $row['Productnummer'].">Wijzigen</a></td></tr>";
    }
    echo "<table>";
    print "<a href=toevoegenProduct.php>Voeg een record toe</a>";

?>
?>
