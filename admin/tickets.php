<?php
session_start();
include('Databank/connect.php');
if(!isset( $_SESSION['GebruikerId'])) {
    echo header('location: index.php');
}

$userEmail = $_SESSION['GebruikerEmail'];
$resultaat = $conn->query("select *  from tblgebruikers where GebruikerEmail = '{$userEmail}'");
        $row = $resultaat->fetch_assoc();
   
?>

<html lang="nl">
    <head>
        <meta charset="utf-8">
        <title>Dashboard</title>
        <meta name="description" content="">
        <meta name="author" content="Willem Vansteyvoort">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/skeleton.css">
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/queries.css">
        <link rel="stylesheet" href="css/icons.css">
        <link rel="icon" type="image/png" href="images/favicon.ico">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    </head> 
    <body>
        <div class="container">
            <div class="mobile">
                <a href="#mobile"><i class="fas fa-bars"></i></a>
            </div>
            <nav>
                <div class="nav-user">
                    <div class="nav-user--box float-right">
                        <label class="dropdown">
                            <div class="dd-button">
                                Welkom, <?php echo $row['GebruikerNaam']; ?>
                            </div>
                            <input type="checkbox" class="dd-input test">
                            <div class="dd-menu">
                                <div class="nav-user--box_text float-left">
                                  <img title="Tom Boon" class="u-max--ful-width float-left" width="110px" src="<?php echo $row['GebruikerAvatar']; ?>">

                                    <b>Willem Vansteyvoort</b> <br />
                                    <a href="#">Profiel wijzigen</a>
                                    <br />
                                    <a href="loguit.php">Uitloggen</a>
                                </div>
                                    
                            </div>
                        </label>
                    </div>
                </div>
                <div class="nav-sidebar" id="mobile">
                    <ul>
                        <li id="active"> <i class="fas fa-tachometer-alt"></i> Dashboard</li>
                        <a href="tickets.php"><li> <i class="far fa-newspaper"></i> Tickets</li></a>
                        <li> <i class="fas fa-play"></i> Tickets</li>
                    </ul>
                </div>
                </nav>
            <main>
                <h4>Open Tickets</h4>
                <div class="row">
                    <div class="twelve columns">
                        <div class="box-large"> 
                            <?php


$SortBy = "TicketId";

if(isset ($_POST["SortBy"])){
    $SortBy = $_POST['SortBy'];
}

$sql = "SELECT * FROM tblticket ORDER BY " . $SortBy;
$result = $conn->query($sql);
?>
<div class="row">
    <div class="seven columns">
        <h1>Mijn tickets</h1>
        <div class="tickets">
                <table class="u-max-full-width">
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
        echo "<td>#" . $row["TicketId"]. "</td><td>" . $row["Vraag"]. "</td><td>" . $row["CategorieId"]. "</td><td>" . $row["TicketDatum"]. "</td><td>" . $row["Status"]. "</td><td>" . $row["Prioriteit"]. "</td><td>" . $row["Moeilijk"]. "</td><td>" . $row["Feedback"]. "</td>";
        echo"</tr>";
    }
} else {
    echo "<tr><th>No tickets found.</th></tr>";
}
?>

</table>
        </div>
    </div>
    <div class="five columns">
        <div class="sorteer">
             <h1>Sorteer tickets</h1>
<form method="post">
    <input type="radio" name="SortBy" value="TicketId">TicketId
    <input type="radio" name="SortBy" value="CategorieId">CategorieId
    <input type="radio" name="SortBy" value="TicketDatum">TicketDatum
    <input type="radio" name="SortBy" value="Status">Status
    <input type="radio" name="SortBy" value="Moeilijk">Moeilijk
    <input type="submit" value="Sorteer!">
</form>
        </div>
       
    </div>
</div>
 
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>