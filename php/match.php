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
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="sport.php">Sports</a></li>
                    <li><a href="connection.php" id="register_btn">Connexion</a></li>
                    <li><a href="connection.php" id="disconnect"></a></li>
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
                        <div class="row"><a href="match.php">MATCHS</a><div class="circle"></div></div>
                        
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
                    <div class="coming" id="coming">
                        <h2> Mes matchs à venir</h2>

                    </div>
                    <div class="passed">
                        <h2> Mes matchs passés</h2>
                            <div class="organizer" id="organizer">
                                <h3> Organisateur</h3>
                            </div>
                            <div class="player" id="player_placement">
                                <h3> Joueur</h3>
                                
                            </div>
                    </div>
                    
                </div>
                                
            </div>

        </section>

    <script src="../js/card.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/events.js"></script>                     
    <script src="../js/utils.js"></script>        
<script>
    window.onload = function(){
        loadUser();
    }
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

