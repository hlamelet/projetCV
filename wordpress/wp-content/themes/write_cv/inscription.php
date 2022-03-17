<?php

$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');

$requestUtilisateur = $db->prepare("SELECT * FROM user");
$requestUtilisateur->execute();
$users = $requestUtilisateur->fetchAll();
print_r($users);
