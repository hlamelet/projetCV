<?php
include('fonctions.php');
session_start();
$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');

$date_choice = $_POST['date_choice'];

$requete = $db->prepare(
    "DELETE FROM brouillon_user WHERE brouillon_user.date = '$date_choice';");
$requete->execute();

$requete = $db->prepare(
    "DELETE FROM brouillon_cv WHERE brouillon_cv.date = '$date_choice';");
$requete->execute();

$requete = $db->prepare(
    "DELETE FROM brouillon_experience WHERE brouillon_experience.date = '$date_choice';");
$requete->execute();
