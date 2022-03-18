<?php

$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');
$mail = $_POST['email-register'];
$requestUtilisateur = $db->prepare("SELECT * FROM user WHERE user_email='$mail'");
$requestUtilisateur->execute();
$users = $requestUtilisateur->fetch();

if ($users) {
    echo ("1");
} else {
    echo ("0");
}
