<?php
/*
Template Name: Admin Accueil

*/

$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');

wp_head();


get_header(); ?>


<!-- ---------------------temporaire-------------------------------------------------- -->
<head>


</head>
<!-- ---------------------temporaire-------------------------------------------------- -->
<h1>Admin Accueil</h1>
<?php
$requete = $db->prepare("SELECT * FROM `cv`");
$requete->execute();
$requete = $requete->fetchall();


?>
<div class="navBar">

</div>
<section class="contenu">
<?php
echo "<pre>";
print_r($requete);
echo "</pre>";
?>
</section>

<?php get_footer(); ?>