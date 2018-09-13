
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
                                Welkom, Willem
                            </div>
                            <input type="checkbox" class="dd-input test">
                            <div class="dd-menu">
                                <img title="Tom Boon" class="u-max--ful-width float-left" width="110px" src="images/member.png">
                                <div class="nav-user--box_text float-left">
                                    <b>Willem Vansteyvoort</b> <br />
                                    <a href="#">Profiel wijzigen</a>
                                    <br />
                                    <a href="#">Uitloggen</a>
                                </div>
                                    
                            </div>
                        </label>
                    </div>
                </div>
                <div class="nav-sidebar" id="mobile">
                    <ul>
                        <li id="active"> <i class="fas fa-tachometer-alt"></i> Dashboard</li>
                        <li> <i class="far fa-newspaper"></i> Artikels</li>
                        <li> <i class="fas fa-play"></i> Tickets</li>
                        <li> <i class="fas fa-calendar"></i> Categorieën</li>
                    </ul>
                </div>
                </nav>
            <main>
                <h4>Dashboard</h4>
                <div class="row">
                    <div class="twelve columns">
                        <div class="box-large"> 
                            <h5>Welkom op het adminpaneel!</h5>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra mauris tristique metus volutpat, quis malesuada est blandit. Mauris consectetur, sem vitae porta auctor, justo leo posuere ex, rutrum pretium augue ipsum ut lorem. Curabitur at feugiat purus. Donec molestie, metus ac imperdiet scelerisque, velit justo porttitor diam
                            </p>
                            <button class="button-primary"><i class="fas fa-wrench"></i> Instellingen</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="four columns">
                        <div class="box-large stats"> 
                            <h5>Statistieken</h5>
                            <div class="row">
                                <div class="six columns">
                                    Aantal nieuwsberichten
                                </div>
                                <div class="six columns">
                                    <span class="span-green float-right">20</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    Aantal evenementen
                                </div>
                                <div class="six columns">
                                    <span class="span-green float-right">2</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    Actieve landen
                                </div>
                                <div class="six columns">
                                    <span class="span-green float-right">98</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    Spelers in databank
                                </div>
                                <div class="six columns">
                                    <span class="span-green float-right">260</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="four columns">
                        <div id="test" class="box-large notitions">   
                            <h5>Snelle notitie</h5>
                            <form>
                                <input type="text" name="title" placeholder="Titel">
                                <textarea placeholder="inhoud"></textarea>
                                <input class="button-primary" type="submit" value="Opslagen">
                            </form>
                        </div>
                    </div>
                    <div class="four columns">
                        <div class="box-large activities"> 
                            <h5>Laatste activiteiten</h5>
                            <table>
                                <tr>
                                    <td>Nieuw artikel aangemaakt door Willem</td>
                                    <td id="bold">25 minuten geleden</td>
                                </tr>
                                <tr>
                                    <td>Nieuwe wedstrijd gestart door Willem</td>
                                    <td id="bold">3 uur geleden</td>
                                </tr>
                                <tr>
                                    <td>Willem heeft de ranking aangepast</td>
                                    <td id="bold">2 dagen geleden</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>