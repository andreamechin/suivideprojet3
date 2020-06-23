<?php session_start();
include "scriptBDD.php";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width initial-scale=1.0" />

    <!-- icones fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>suivi de projet 3</title>

    <!-- icone navigateur -->
    <link rel="icon" type="image/png" href="image.png" />

</head>

<body>
    <?php if (isset($_SESSION['id'])) :?>
    <header>
        <nav>
            <a class="logo"><img src="logo3.png"></a>
            <a href="index.php" class="titre">Blue Hotel</a>
            <a href="traitementDeco.php">Déconnexion</a>
        </nav>
    </header>
    <main>
        <div>
            <h1 class="titre">Je veux voyager</h1>
            <div class="flex">
                <div id="rechercheHeberge">
                    <form action="traitementRecherche.php" method="post">
                        <input id="barreRecherche" name="barreRecherche" required="required" type="text" placeholder="Ex : Nantes"/> 
                        <button type="submit" name="recherche"/>Go!</button>    
                    </form>
                </div>
            </div>
        </div>

        <div class="nouveaux">
            <h2>Les nouveautés</h2>
            <div class="container">
                <div class="product">
                    <img
                        src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large">
                    <p>Description</p>
                </div>
                <div class="product">
                    <img
                        src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large">
                    <p>Description</p>
                </div>
                <div class="product">
                    <img
                        src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large">
                    <p>Description</p>
                </div>
            </div>
        </div>
    </main>
    <?php else :
    header('Location: connexion.php');
    endif; ?>
    <footer></footer>

</body>