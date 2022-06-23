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
        <link href="../css/sport.css" rel="stylesheet">
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

                <div class="search">
                    <form action="" method="post" class="search_form" id="searchForm" >
                            <input type="text" name="search" placeholder="Football, Tennis, Nantes, Caen..." class="searchbar" id="searchbar">
                            <div class="btn" id="searchButton">
                                <i class="submit_button fas fa-search fa-xl" id="search_btn"></i>
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
                    <ul id="cities">
                    </ul>
                </div>
                </div>
                
                <div class="parent">
                    <div class="div1">
                        <div class="filter">
                            <h2>Sport</h2>
                            <select id="sport_list">Tous les sports <img src="../ressources/arrow.svg" class="arrow"></select>
                            <h2>Ville</h2>
                            <select id="city_list">Toutes les villes <img src="../ressources/arrow.svg" class="arrow"></select>
                            <h2>Période</h2>
                            <select id="date_list">Sans <img src="../ressources/arrow.svg" class="arrow"></select>
                            <h2>Prix</h2>
                            <p>0 - <span id="demo"></span>€</p>    
                            <input type="range" id="price_list" class="form-range" min="0" max="120" value="120" >
                            <h2>Places</h2>
                                <div class="places">
                                    <input type="checkbox" id="place_list" >
                                    <p>Complet</p>
                                </div> 
                            <button id="delete_filters">Retirer les filtres </button>
                        </div>
                    </div>
                    <div class="div2" id="cards_group"> 
                        
                    </div>
                </div>


        </section>
<script src="../js/ajax.js"></script>
<script src="../js/slider.js"></script>
<script src="../js/events.js"></script>                     
<script src="../js/utils.js"></script>    
<script src="../js/searchbar.js"></script>   
<script>
    window.onload = function(){
        loadUser();
        displaySports();
        displayDates();
        ajaxRequest('GET', 'request.php/cities', displayCities, undefined)

    }
    window.onbeforeunload = function(){
        loadUser();
        displaySports();
        displayDates();
        
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
    function show(x){
        let card = document.getElementsByClassName('players');
        let arrow = document.getElementsByClassName('arrow_show');
        if (card[x].style.display === "none") {
            card[x].style.display = "flex";
        } else {
            card[x].style.display = "none";
        }
    }
</script>
<script src="https://kit.fontawesome.com/7f6d2012d0.js" >
    </body>
</html>

