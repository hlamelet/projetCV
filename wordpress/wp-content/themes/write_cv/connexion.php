<?php
/*
Template Name: Connexion

*/

$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');

wp_head();
get_header();

get_header(); ?>

<h1>Se Connecter</h1>



<?php get_footer(); ?>