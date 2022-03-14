<?php
/*
Template Name: Admin Accueil

*/

$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');

wp_head();
get_header();

get_header(); ?>

<h1>Admin Accueil</h1>



<?php get_footer(); ?>