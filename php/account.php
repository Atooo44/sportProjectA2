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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"
        integrity="sha256-x3YZWtRjM8bJqf48dFAv/qmgL68SI4jqNWeSLMZaMGA=" crossorigin="anonymous"></script>


        <link href="../css/default.css" rel="stylesheet">
        <link href="../css/account.css" rel="stylesheet">
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
                            <a href="account.php">PROFIL </a> <div class="circle"></div>
                        </div>
                        <div class="row">
                        <a href="notifications.php">NOTIFICATIONS</a>
                        </div>
                        <div class="row"><a href="match.php">MATCHS</a></div>
                        
                    </div>
                </div>

                <div class="div2">
                    <div class="identity">
                        <div class="photo">
                            <img src="../ressources/pp1.png">
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
                                    <div class="vide">

                                    </div>       
                                </div>
                        </div>
                        <div class="personal">
                            <div class="name"  id="user_name">
                                
                            </div>
                            <div class="mail" id="user_mail">
                                <span> </span> 
                            </div>
                            <div class="password">
                            <span>Mot de passe : </span> <input type="password" readonly value="**************" id="user_password"> 
                            </div>
                        </div>

                    </div>
                    <div class="complementary">
                        <div class="age column">
                            <span>Age</span>
                            <input id="user_age" type="text" readonly >
                        </div>
                        <div class="city column">
                            <span>Ville</span>
                            <input id="user_city" type="text" readonly >
                        </div>
                        <div class="fit column">
                            <span>Forme physique</span>
                            <input id="user_fit" type="text" readonly >
                        </div>
                    </div>
                    <div class="mark">
                        <span> Noter l'Application</span>
                        <div class="note">
                            <div class="stars">
                                <i class="fa-solid fa-star star" id="star1" value="1"></i>
                                <i class="fa-solid fa-star star" id="star2" value="2"></i>
                                <i class="fa-solid fa-star star" id="star3" value="3"></i>
                                <i class="fa-solid fa-star star" id="star4" value="4"></i>
                                <i class="fa-solid fa-star star" id="star5" value="5"></i>
                            </div>   
                            <input type="number" id="mark" readonly min="1" max="5">   
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="modify">
                <button id="edit_btn">Editez le profil</button>
            </div>
            

        </section>
<script src="../js/mark.js"></script>
<script src="../js/events.js"></script>
<script src="../js/ajax.js"></script>
<script src="../js/utils.js"></script>           
<script>
    window.onload = function(){
        loadUser();
    }
    window.onbeforeunload = function(){
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
<script src="https://kit.fontawesome.com/7f6d2012d0.js" >
    </body>
</html>

