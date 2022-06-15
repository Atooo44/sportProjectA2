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
        <link href="../css/homepage.css" rel="stylesheet">
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
            <div class="main">
                <h2>Trouver un <span>match</span><br> près de chez vous</h2><br>
                <form action="" method="post" class="search_form" >
                        <input type="text" name="search" placeholder="Football, Tennis, Nantes, Caen..." class="searchbar" id="searchbar">
                        <div class="btn">
                            <i class="submit_button fas fa-search fa-2xl"></i>
                        </div>
                        </input>
                </form>

                <div class="carousel">
                    <div class="row">
                        <div class="swiper">
                            <ul>
                                <li>
                                    <div class="sport">
                                        <div class="detail">
                                            <div class="rating"></div>
                                            <h3>Football</h3>
                                        </div>
                                        <div class="minia">
                                            <a href="#">
                                                <img src="../ressources/football.png">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sport">
                                        <div class="detail">
                                            <div class="rating"></div>
                                            <h3>Tennis</h3>
                                        </div>
                                        <div class="minia">
                                            <a href="#">
                                                <img src="../ressources/tennis.png">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sport">
                                        <div class="detail">
                                            <div class="rating"></div>
                                            <h3>Babyfoot</h3>
                                        </div>
                                        <div class="minia">
                                            <a href="#">
                                                <img src="../ressources/babyfoot.png">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sport">
                                        <div class="detail">
                                            <div class="rating"></div>
                                            <h3>Rugby</h3>
                                        </div>
                                        <div class="minia">
                                            <a href="#">
                                                <img src="../ressources/rugby.png">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sport">
                                        <div class="detail">
                                            <div class="rating"></div>
                                            <h3>Voleyball</h3>
                                        </div>
                                        <div class="minia">
                                            <a href="#">
                                                <img src="../ressources/volleyball.png">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="sport">
                                        <div class="detail">
                                            <div class="rating"></div>
                                            <h3>Basketball</h3>
                                        </div>
                                        <div class="minia">
                                            <a href="#">
                                                <img src="../ressources/basketball.png">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="dots">
                                <span class="current"></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<script src="../js/ajax.js"></script>       
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
<script src="https://kit.fontawesome.com/7f6d2012d0.js" ></script>
    </body>
</html>

