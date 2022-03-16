<?php
/*
Template Name: User Accueil

*/

$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');
wp_head(); ?>


<div id="bloc_principal_user">

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>


        <div id="overlay-content1">
            <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" width="50px" alt=""></a>
            <a href="#"><i class="fi fi-rr-apps"></i></a>
            <a href="#"><i class="fi fi-rr-text"></i></a>
            <a href="#"><i class="fi fi-rr-add"></i></a>
            <a href=""><i class="fi fi-rr-trash"></i></a>
        </div>

        <div id="overlay-content2">
            <div id="barre_recherche">
                <?php echo do_shortcode('[ivory-search id="18" title="Rechercher des thèmes"]'); ?>
            </div>
            <div id="box_templates">
                <a href="#" class="base" draggable="true"><img src="<?php echo get_template_directory_uri() ?>/assets/img/template1.png" width="auto" alt=""></a>
                <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/template2.png" width="auto" alt=""></a>
                <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/template1.png" width="auto" alt=""></a>
                <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/template1.png" width="auto" alt=""></a>
            </div>
        </div>
        <div id="overlay-content3">
        </div>
    </div>

    <span id="bouton_rideau" onclick="openNav()"><i class="fas fa-bars"></i></span>
    <div id="white"></div>
    <div id="feuille_cv" class="case">
    </div>
    <div id="telechargement">

        <a href="#" id="btn_telecharger">TELECHARGER</a>

    </div>
</div>




<?php wp_footer(); ?>