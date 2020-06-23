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
    <title>exercice creation site web</title>

    <!-- icone navigateur -->
    <link rel="icon" type="image/png" href="image.png" />

</head>

<body>

    <header>
        <nav>
            <a class="logo"><img src="logo3.png"></a>
            <a href="index.php" class="titre">Blue Hotel</a>
            <a href="traitementDeco.php">Déconnexion</a>
        </nav>
    </header>

    <?php if (isset($_SESSION['id'])) :
        $infoUser = getUser($_SESSION['id']);
        $infoLoca = getLoca($_SESSION['id']); ?>

    <main class="profil">
        <div class="container">

            <div class="left-column">
                <img src="pdp_H.png" alt="photo de profil">
            </div>

            <!-- Right Column -->
            <div class="right-column">
                <h2>
                    <p><?php echo($infoUser[1])?></p>
                    <p><?php echo($infoUser[0])?></p>
                </h2>
                <p><?php echo($infoUser[2])?></p>
            </div>
        </div>

        <div class="favoris">
            <div class="container">
                <?php //var_dump($infoLoca);
                if($infoLoca != 666) :?>
                    <h2>Mes Réservations</h2>
                    <?php for($ii = 0; $ii < sizeof($infoLoca); $ii++) :?>
                        <div class="product">
                            <img src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large">
                            <p><?php echo($infoLoca[$ii][0]); ?></p>
                            <p>A partir du <?php echo($infoLoca[$ii][5]);?> pendant <?php echo($infoLoca[$ii][6]);?> jours</p>
                        </div>
                    <?php endfor;
                else :?> 
                    <p>Vous n'avez aucune réservation</p>
                <?php endif;?>
               <!-- <div class="product">
                    <img
                        src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large">
                    <p>Description</p>
                </div>
                <div class="product">
                    <img
                        src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large">
                    <p>Description</p>
                </div> -->
            </div>
        </div>

    </main>

    <?php else :
    header('Location: connexion.php'); 
    endif; ?>
</body>

</html>