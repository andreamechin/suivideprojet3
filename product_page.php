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
            <div>
                <a href="profil.php" class='user'><i class="fas fa-user"></i></a>
                <a href="traitementDeco.php">Déconnexion</a>
            </div>
        </nav>
    </header>

  <?php if (isset($_SESSION['id'])) : 
    //var_dump($_GET['id']);
    $tabHebergeSel = getHebergeSel($_GET['id']);
    //var_dump($tabHebergeSel);
  ?>
    <main class="product_page">

        <!-- Left Column / Headphones Image -->
        <div class="container">
            <div class="column">
                <div class="row">
                    <img class="demo cursor"
                        src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large"
                        style="width:100%" onclick="currentSlide(1)">
                </div>
                <div class="row">
                    <img class="demo cursor"
                        src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large"
                        style="width:100%" onclick="currentSlide(2)">
                </div>
                <div class="row">
                    <img class="demo cursor"
                        src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large"
                        style="width:100%" onclick="currentSlide(3)">
                </div>
                <div class="row">
                    <img class="demo cursor"
                        src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large"
                        style="width:100%" onclick="currentSlide(4)">
                </div>
            </div>
            <div class="mySlides">
                <img src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large"
                    style="width:100%">
            </div>

            <div class="mySlides">
                <img src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large"
                    style="width:100%">
            </div>

            <div class="mySlides">
                <img src="https://a0.muscache.com/im/pictures/pro_photo_tool/Hosting-29700095-unapproved/original/77a34b8e-70e1-49c0-b112-0abaa7b38472.JPEG?aki_policy=xx_large"
                    style="width:100%">
            </div>

            <div class="mySlides">
                <img src="img/egal.png" style="width:100%">
            </div>


            <!-- Right Column -->
            <div class="right-column">
                <!-- Product Description -->
                <div class="product-description">
                    <h1><?php echo($tabHebergeSel[0]);?></h1>
                    <p><?php echo($tabHebergeSel[1]);?></p>
                    <p><?php echo($tabHebergeSel[2]);?>, <?php echo($tabHebergeSel[3]);?></p>
                    <p>Location pour <?php echo($tabHebergeSel[5]);?> personne(s) max.</p>
                </div>

                <!-- Product Pricing -->
                <div class="product-price">
                    <span><?php echo($tabHebergeSel[4]);?>€ par nuit</span>
                </div>
                <div>
                    <form action=<?php echo("traitementReservation.php?id=".$_GET['id']);?> method="post">
                        <p>Date début</p>
                        <input id="date" name="date" required="required" type="date">
                        <p>Nombre de jour</p>
                        <input id="nbJour" name="nbJour" required="required" type="number" min="1" placeholder="Nombre de jour"/> 
                        <button type="submit" name="reserver"/>Je réserve !</button>    
                    </form>
                </div>
            </div>
        </div>

    </main>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>

    <?php else :
        header('Location: connexion.php'); 
        endif;?>
</body>

</html>