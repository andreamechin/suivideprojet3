<?php
session_start();
include "scriptBDD.php";





$field = array('dateDebut','dureeJour','idUtili','idLogem');

$value = array();
array_push($value, $_POST['dateDebut']);
array_push($value, $_POST['nombreJour']);
array_push($value, $_SESSION['id']);
array_push($value, $_POST['idLogem']);

insertDB('location', $field, $value);

$error = 'ma réservation est fé!!';

