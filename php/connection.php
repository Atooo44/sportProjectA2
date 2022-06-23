<?php
  ini_set('display_errors',1);
  error_reporting(E_ALL);
?>

<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"
      integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
      integrity="sha256-x3YZWtRjM8bJqf48dFAv/qmgL68SI4jqNWeSLMZaMGA=" crossorigin="anonymous"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/connection.css">
        <title> </title>
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
        
            <div class="container">
                <form class="login form">
                    <h2 class="login_title">Se connecter</h2>
                    <div class="login_row">
                        <label class="login_label">Email</label>
                        <input class="login_input" id="email_input" type="email" placeholder="email@exemple.com">
                    </div>
                    <div class="login_row">
                        <label class="login_label">Mot de passe</label>
                        <input class="login_input" id="password_input" type="password" placeholder="**********">
                    </div>
                    <div class="login_row">
                        <button class="login_button" id="login_submit" type="button">S'IDENTIFIER</button>
                    </div>
                    <div class="create">
                         
                        <div class="test">
                        Pas encore de compte : <span class="new_account signup_trigger">Créer en un</span>
                        </div>
                    </div>
                </form>


                <form class="signup is-form-open form" id="signup">
                    <svg class="svg-icon signup_trigger signup_trigger-fixed" id="degage" viewBox="0 0 20 20">
                        <path d="M14.613,10c0,0.23-0.188,0.419-0.419,0.419H10.42v3.774c0,0.23-0.189,0.42-0.42,0.42s-0.419-0.189-0.419-0.42v-3.774H5.806c-0.23,0-0.419-0.189-0.419-0.419s0.189-0.419,0.419-0.419h3.775V5.806c0-0.23,0.189-0.419,0.419-0.419s0.42,0.189,0.42,0.419v3.775h3.774C14.425,9.581,14.613,9.77,14.613,10 M17.969,10c0,4.401-3.567,7.969-7.969,7.969c-4.402,0-7.969-3.567-7.969-7.969c0-4.402,3.567-7.969,7.969-7.969C14.401,2.031,17.969,5.598,17.969,10 M17.13,10c0-3.932-3.198-7.13-7.13-7.13S2.87,6.068,2.87,10c0,3.933,3.198,7.13,7.13,7.13S17.13,13.933,17.13,10"></path>
                    </svg>
                    <div class="signup_wrapper is-wrapper-open" id="signup-wrapper">
                        <div class="signup_row signup_row-flex">
                            <svg class="svg-icon signup_trigger" viewbox="0 0 20 20">
                                <path d="M10.185,1.417c-4.741,0-8.583,3.842-8.583,8.583c0,4.74,3.842,8.582,8.583,8.582S18.768,14.74,18.768,10C18.768,5.259,14.926,1.417,10.185,1.417 M10.185,17.68c-4.235,0-7.679-3.445-7.679-7.68c0-4.235,3.444-7.679,7.679-7.679S17.864,5.765,17.864,10C17.864,14.234,14.42,17.68,10.185,17.68 M10.824,10l2.842-2.844c0.178-0.176,0.178-0.46,0-0.637c-0.177-0.178-0.461-0.178-0.637,0l-2.844,2.841L7.341,6.52c-0.176-0.178-0.46-0.178-0.637,0c-0.178,0.176-0.178,0.461,0,0.637L9.546,10l-2.841,2.844c-0.178,0.176-0.178,0.461,0,0.637c0.178,0.178,0.459,0.178,0.637,0l2.844-2.841l2.844,2.841c0.178,0.178,0.459,0.178,0.637,0c0.178-0.176,0.178-0.461,0-0.637L10.824,10z"></path>
                            </svg>
                        </div>
                        <h2 class="signup_title">S'inscrire</h2>
                            <div class="signup_row">
                                <label class="signup_label">Prénom</label>
                                    <input class="signup_input" id="first_name" type="text" placeholder="Pierre"/>
                            </div>
                            <div class="signup_row">
                                <label class="signup_label">Nom</label>
                                <input class="signup_input" id="last_name" type="text" placeholder="Dupuis"/>
                            </div>
                            <div class="signup_row">
                                <label class="signup_label">Ville</label>
                                <input class="signup_input" id="city" type="text" placeholder="Paris"/>
                            </div>
                            <div class="signup_row">
                                <label class="signup_label">E-Mail</label>
                                <input class="signup_input" id="mail" type="email" placeholder="example@email.com"/>
                            </div>
                            <div class="signup_row">
                                <label class="signup_label">Mot de passe</label>
                                <input class="signup_input" id="password" type="password" placeholder="**********"/>
                            </div>
                            <div class="signup_row">
                                <label class="signup_label">Vérification du mot de passe</label>
                                <input class="signup_input" id="password_confirmation" type="password" placeholder="**********"/>
                            </div>
                            <div class="signup_row">
                                <label class="signup_label">Photo de profil</label>
                                <div class="profil_picture">
                                    <div class="pp">
                                        <img src="../ressources/pp1.png">
                                        <input type="radio" name="pp">
                                    </div>
                                    <div class="pp">
                                        <img src="../ressources/pp2.png">
                                        <input type="radio" name="pp">
                                    </div>
                                    <div class="pp">
                                        <img src="../ressources/pp3.png">
                                        <input type="radio" name="pp">
                                    </div>
                                    <div class="pp">
                                        <img src="../ressources/pp4.png">
                                        <input type="radio" name="pp">
                                    </div>
                                    <div class="pp">
                                        <img src="../ressources/pp5.png">
                                        <input type="radio" name="pp">
                                    </div>
                                    <div class="pp">
                                        <img src="../ressources/pp6.png">
                                        <input type="radio" name="pp">
                                    </div>
                                    <div class="pp">
                                        <img src="../ressources/pp7.png">
                                        <input type="radio" name="pp">
                                    </div>
                                    <div class="pp">
                                        <img src="../ressources/pp8.png">
                                        <input type="radio" name="pp">
                                    </div>
                                    <div class="pp">
                                        <img src="../ressources/pp9.png">
                                        <input type="radio" name="pp">
                                    </div>           
                                </div>
                            </div>
                            <div class="signup_row">
                                <button class="signup_button" id="signup_submit" type="button">S'inscrire</button>
                            </div>
                    </div>
                </form>
            </div>
    </section>


<script src="../js/connection.js"></script>
<script src="../js/events.js"></script>
<script src="../js/ajax.js"></script>
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