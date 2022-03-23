<?php
$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');

$chosen_id = $_POST['current_id'];

$requete = $db->prepare(
    "DELETE FROM user_infos WHERE user_infos.id_cv = $chosen_id;");
$requete->execute();

$requete = $db->prepare(
    "DELETE FROM cv_pdf WHERE cv_pdf.id_cv = $chosen_id;");
$requete->execute();

$requete = $db->prepare(
    "DELETE FROM cv WHERE cv.id = $chosen_id;");
$requete->execute();
