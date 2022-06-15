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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Sports</a></li>
                    <li><a href="connection.php">Inscription</a></li>
                    <li><span class="darkMode"></span></li>
                </ul>
            </header>
            <!-- commentaire -->

                <div class="search">
                    <form action="" method="post" class="search_form" >
                            <input type="text" name="search" placeholder="Football, Tennis, Nantes, Caen..." class="searchbar" id="searchbar">
                            <div class="btn">
                                <i class="submit_button fas fa-search fa-xl"></i>
                            </div>
                            </input>
                    </form>
                </div>
                
                <div class="parent">
                    <div class="div1">
                        <div class="filter">
                            <h2>Sport</h2>
                            <button>Tous les sports <img src="../ressources/arrow.svg" class="arrow"></button>
                            <h2>Ville</h2>
                            <button>Toutes les villes <img src="../ressources/arrow.svg" class="arrow"></button>
                            <h2>Période</h2>
                            <button>Sans <img src="../ressources/arrow.svg" class="arrow"></button>
                            <h2>Prix</h2>
                            <input type="range" class="form-range" min="0" max="120" >
                            <h2>Places</h2>
                            <input type="range" class="form-range" min="0" max="120" >
                            <button>Retirer les filtres </button>
                        </div>
                    </div>
                    <div class="div2"> 
                        <div class="card">
                            <div class="left_card">
                                <div class="row_info title"><i class="fa-solid fa-futbol fa-xl"></i><h2>&nbsp;&nbsp;Football</h2></div><br>
                                <div class="row_info"><i class="fa-solid fa-location-dot"></i> <p>&nbsp; Nantes </p></div><br>
                                <div class="row_info"><i class="fa-solid fa-calendar"></i> <p>&nbsp; Le 25/07/2022 </p></div><br>
                                <div class="row_info"><i class="fa-solid fa-clock"></i> <p>&nbsp; De 18h00 à 20h00 </p></div>
                            </div>
                            <div class="right_card">
                                <p><span>Organisateur :</span> Pascal Dupras</p><br>
                                <p><span>Joueurs inscrits :</span> 9/22</p><br>
                                <p><span>Prix :</span> 12€</p><br>
                                <button>S'INSCRIRE</button>
                            </div>
                        </div>
                    </div>
                </div>


        </section>
           
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
<script src="https://kit.fontawesome.com/7f6d2012d0.js" >
    </body>
</html>

