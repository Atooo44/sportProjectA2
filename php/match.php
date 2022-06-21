<?php
  include("database.php");
  ini_set('display_errors',1);
  error_reporting(E_ALL);
  //$db = dbConnect();
?>
<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"
integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>

        <link href="../css/default.css" rel="stylesheet">
        <link href="../css/match.css" rel="stylesheet">
        <title> Sportmate</title>
    </head>
    <body>
        <section>
            <header>
                <a href="index.php"><img src="../ressources/logo_match.svg" class="logo"></a>
                <div class="toggle"></div>
                <ul class="navigation">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Sports</a></li>
                    <li><a href="connection.php">Inscription</a></li>
                    <li><span class="darkMode"></span></li>
                </ul>
            </header>
            <!-- commentaire -->
            <div class="parent">
                <div class="div1">
                    <div class="menu">
                        <div class="row">
                            <a href="account.php">PROFIL </a> 
                        </div>
                        <div class="row">
                        <a href="notifications.php">NOTIFICATIONS</a> 
                        </div>
                        <div class="row"><a href="">MATCHS</a> <div class="circle"></div></div>
                        
                    </div>
                </div>

                <div class="div2">
                    <div class="card_event" id="card_id">
                        <form id="form_ev">
                            <div class="first">
                                <select id="choosed_sport">
                                    <option value="Football">Football</option>
                                    <option value="Tennis">Tennis</option>
                                    <option value="Babyfoot">Babyfoot</option>
                                    <option value="Rugby">Rugby</option>
                                    <option value="Basketball">Basketball</option>
                                    <option value="Volleyball">Volleyball</option>
                                </select>
                                <div class="number">
                                    <input type="number" placeholder="9" min="1" id="choosed_amount_player">
                                        <span>personnes</span>
                                    </input>
                                </div>
                                <div class="price">
                                    <input type="number" placeholder="12" min="0" id="choosed_price">
                                    <span>€</span>
                                    </input>
                                </div>
                            </div>
                            <div class="second">
                                <input type="text" placeholder="Ville" class="city" id="choosed_city">
                                </input>
                                <input  type="date" class="date" id="choosed_date">
                                <input type="time" class="hour" id="choosed_hours">
                            </div>
                            <div class="third">
                                <div class="time">
                                    <input type="number" placeholder="90" min="0" id="choosed_duration">
                                    <span>min</span>
                                    </input>
                                </div>
                                <button id="search_evenement" type="button">
                                    CRÉER L'ÉVÈNEMENT
                                </button>
                                
                            </div>
                            
                        </form>
                    </div>
                    <div class="coming">
                        <h2> Mes matchs à venir</h2>
                        <div class="card_double">
                            <div class="visible">
                                <div class="column1">
                                    <div class="title">
                                        <img src="../ressources/logo_football.svg">
                                        &nbsp;Match de Football
                                    </div>
                                    <p>Le 25/07/2022 de 18h00 à 20h00</p>
                                    <p><span>Prix : </span> 22€ </p>
                                </div>
                                <div class="column2">
                                <p><span>Organisateur : </span> Pascal Dupras</p>
                                <p><span>Joueurs inscrits : </span> 9/22</p>
                                <div id="toggle" onclick="show()" class="arrow">
                                    <img src="../ressources/arrow.svg" >
                                </div>
                                </div>
                            </div>
                            
                            <div class="players">
                                <div class="column c1">
                                    <div class="name">Pascal Dupras</div>
                                    <div class="name">Pierre Caille</div>
                                    <div class="name">Justin Malon</div>
                                    <div class="name">Étienne Dupuis</div>
                                </div>
                                <div class="column c2">
                                    <div class="name">Maxime Lepas</div>
                                    <div class="name">Maxence Comil</div>
                                    <div class="name">Jules Foula</div>
                                    <div class="name">Julien Tomar</div>
                                </div>
                                <div class="column c3">
                                <div class="name">Maxime Lepas</div>
                                    <div class="name">Maxence Comil</div>
                                    <div class="name">Jules Foula</div>
                                    <div class="name">Julien Tomar</div>
                                </div>
                                <div class="column c4">
                                    <div class="name">Maxime Lepas</div>
                                    <div class="name">Maxence Comil</div>
                                    <div class="name">Jules Foula</div>
                                    <div class="name">Julien Tomar</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="passed">
                        <h2> Mes matchs passés</h2>
                            <div class="organizer">
                                <h3> Organisateur</h3>
                            </div>
                            <div class="player">
                                <h3> Joueur</h3>
                                
                            </div>
                    </div>
                    
                </div>
                                
            </div>

        </section>

    <script src="../js/card.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/search.js"></script>
    <script src="../js/events.js"></script>                     
    <script src="../js/utils.js"></script>        
<script>
    let darkmode = document.querySelector('.darkMode');
    let body = document.querySelector('body');
    darkmode.onclick = function(){
        darkmode.classList.toggle('active');
        body.classList.toggle('dark');
    }

    let menuToggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    menuToggle.onclick = function(){
        menuToggle.classList.toggle('active');
        navigation.classList.toggle('active');
    }
</script>
    </body>
</html>

