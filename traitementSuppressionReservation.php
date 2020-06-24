<?php
session_start();
include "scriptBDD.php";

$field = array('idLoca');

$value = array();
array_push($value, $_GET['id']);

deleteLineDB('location', $field, $value);

$error = 'ma réservation est défé!!';



header('Location: profil.php');