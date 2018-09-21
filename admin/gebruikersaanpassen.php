<?php
session_start();
include('Databank/connect.php');
if(!isset( $_SESSION['GebruikerId'])) {
    echo header('location: index.php');
}

$userEmail = $_SESSION['GebruikerEmail'];
$resultaat = $conn->query("select *  from tblgebruikers where GebruikerEmail = '{$userEmail}'");
$row = $resultaat->fetch_assoc();
if(isset($_POST['aanpassen'])){
$ins = "SELECT * FROM TblGebruikers WHERE GebruikerId =''";
$res = $conn->query($ins);
}
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
                <h4 style="text-align: center;">Gebruikers</h4>
                    <?php
                    if(isset($_POST['zoekenGebruiker'])){
                        $sql = "SELECT * FROM TblGebruikers WHERE GebruikerNaam LIKE '%".$_POST['naam']."%'";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="columns gebruikers">
                        <div class="box-large stats"> 
                            <div class="row">
                                <div class="six columns">
                                    <h5><?php echo "".$row['GebruikerNaam']."" ?></h5>
                                </div>
                                <div class="six columns">
                                    <form action='aanpassengebr.php' method='post' style="float: right;">
                                    <input type="hidden" value="<?php $row['GebruikerId']?>" name="aanpassenId">
                                    <input type='submit' value='Gebruikergegevens Aanpassen' name='aanpassen'>
                                    </form>
                                    <?php
                                        if(isset($_POST['aanpassen'])){
                                        $_SESSION['aanpassenId'] = $row['GebruikerId'];
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    GebruikerID
                                </div>
                                <div class="six columns">
                                    <span class="span-green float-right"><?php echo "".$row['GebruikerId']."" ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    E-mail
                                </div>
                                <div class="six columns">
                                    <span class="span-green float-right"><?php echo "".$row['GebruikerEmail']."" ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    Type Gebruiker
                                </div>
                                <div class="six columns">
                                    <span class="span-green float-right"><?php if($row['GebruikerType'] == 1){echo "Beheerder";}else{echo "Gebruiker";} ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    Aantal Tickets
                                </div>
                                <div class="six columns">
                                    <span class="span-green float-right"><?php echo "".$row['GebruikerPrestatie']."" ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                    }else{
                        echo "<form action='gebruikersaanpassen.php' method='post'>
                        <input type='text' placeholder='Zoek een gebruiker' name='naam'>
                        <input type='submit' value='Zoeken' name='zoekenGebruiker'>
                        </form>";
                    }
                    ?>
            </main>
        </div>
    </body>
</html>