<?php
session_start();

include "scriptBDD.php";

//var_dump($_POST);

if(isset($_SESSION['recherche'])){
	$_SESSION['recherche'] = $_POST['barreRecherche'];
} else {
	$_SESSION += ["recherche" => $_POST['barreRecherche']];
}

header('Location: products.php');