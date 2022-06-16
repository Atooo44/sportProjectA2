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
                    <div class="add">
                        <img src="../ressources/plus.svg">
                    </div>

                    <div class="card_event">
                        <form>
                            <div class="first">
                                <select>
                                    <option value="football">Football</option>
                                    <option value="tennis">Tennis</option>
                                    <option value="babyfoot">Babyfoot</option>
                                    <option value="rugby">Rugby</option>
                                    <option value="basketball">Basketball</option>
                                    <option value="volleyball">Volleyball</option>
                                </select>
                                <div class="number">
                                    <input type="number" placeholder="9">
                                        <span>personnes</span>
                                    </input>
                                </div>
                                <div class="price">
                                    <input type="text" placeholder="12">
                                    €
                                    </input>
                                </div>
                            </div>
                            <div class="second">
                                <input type="text" placeholder="Ville">
                                </input>
                                <input  type="date">
                                <input type="time">
                            </div>
                            <div class="third">
                                <input type="text" placeholder="90">
                                min
                                </input>
                                <button>
                                    CRÉER L'ÉVÈNEMENT
                                </button>
                                
                            </div>
                            
                        </form>
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
    </body>
</html>

