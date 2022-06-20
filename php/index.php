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
                <form action="" method="post" class="search_form" id="searchForm" >
                        <input type="text" name="search" placeholder="Football, Tennis, Nantes, Caen..." class="searchbar" id="searchbar">
                        <div class="btn" id="searchButton">
                            <i class="submit_button fas fa-search fa-2xl"></i>
                        </div>
                        </input>
                </form>
                <div class="result" id="result">
                    <ul class="sport_result" id="sport_result">
                        <li>Football</li>
                        <li>Tennis</li>
                        <li>Babyfoot</li>
                        <li>Basketball</li>
                        <li>Volleyball</li>
                        <li>Rugby</li>
                        
                    </ul>
                    <hr>
                    <ul class="cities" id="cities">
                    </ul>
                </div>
                <div class="img">
                    <img src="../ressources/football.png">
                    <img src="../ressources/basketball.png">
                    <img src="../ressources/babyfoot.png">
                    <img src="../ressources/rugby.png">
                    <img src="../ressources/tennis.png">
                    <img src="../ressources/volleyball.png">
                </div>
            </div>
        </section>
<script src="../js/searchbar.js"></script>     
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

