<p>Sorteer volgens:</p>
<form method="post">
	<input type="radio" name="SortBy" value="TicketId">TicketId
	<input type="radio" name="SortBy" value="CategorieId">CategorieId
	<input type="radio" name="SortBy" value="TicketDatum">TicketDatum
	<input type="radio" name="SortBy" value="Status">Status
	<input type="radio" name="SortBy" value="Moeilijk">Moeilijk
	<input type="submit" value="Sorteer!">
</form>
<?php
include ("connect.php");

session_start();

$SortBy = "TicketId";

if(isset ($_POST["SortBy"])){
	$SortBy = $_POST['SortBy'];
}

$sql = "SELECT * FROM tblticket ORDER BY " . $SortBy;
$result = $conn->query($sql);
?>

<table>
	<tr>
		<td>TicketId</td>
		<td>Vraag</td>
		<td>CategorieId</td>
		<td>TicketDatum</td>
		<td>Status</td>
		<td>Prioriteit</td>
		<td>Moeilijk</td>
		<td>Feedback</td>
	</tr>
<?php
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
    	echo "<td>" . $row["TicketId"]. "</td><td>" . $row["Vraag"]. "</td><td>" . $row["CategorieId"]. "</td><td>" . $row["TicketDatum"]. "</td><td>" . $row["Status"]. "</td><td>" . $row["Prioriteit"]. "</td><td>" . $row["Moeilijk"]. "</td><td>" . $row["Feedback"]. "</td>";
    	echo"</tr>";
	}
} else {
	echo "<tr><th>No tickets found.</th></tr>";
}
?>

</table>