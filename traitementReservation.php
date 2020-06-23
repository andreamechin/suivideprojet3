<?php
session_start();
include "scriptBDD.php";

$field = array('dateDebut','dureeJour','idUtili','idLogem');

$value = array();
array_push($value, $_POST['date']);
array_push($value, $_POST['nbJour']);
array_push($value, $_SESSION['id']);
array_push($value, $_GET['id']);

insertDB('location', $field, $value);

$error = 'ma réservation est fé!!';



header('Location: profil.php');