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
                <!-- couleurs -->
                <button onclick = "gfg_Run()" id="yellow_color"></button>
                <button onclick = "blue_Run()" id="blue_color"></button>
                <button onclick = "green_Run()" id="green_color"></button>
                <button onclick = "grey_Run()" id="grey_color"></button>
                <button onclick = "pink_Run()" id="purple_color"></button>

                <!-- fin couleurs -->

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
    <div id="feuille_cv">

        <!-- THEO -->

        <div class="card mx-5 mt-3" id="invoice" class="invoice">
            <div class="card-header">

            </div>
            <div class="card-body">
                <div class="container">

                    <div class="row">
                        <div class="col-md-6">
                            <!-- premier col -->
                            <div class="form-group mt-3">
                                <label for="">Sélectionnez votre photo</label>
                                <input id="imgField" type="file" class="form-control" />
                            </div>
                            <!-- CHANGEMENT -->
                            <h3 class="text">Renseignements personnels</h3>

                            <div class="form-group">
                                <label for="nameField"></label>
                                <input type="text" id="nameField" placeholder="John Morroy" class="form-control" />
                            </div>

                            <div class="form-group mt-2">
                                <label for="contactField"></label>
                                <input type="text" id="contactField" placeholder="0658453623" class="form-control" />
                            </div>

                            <div class="form-group mt-2">
                                <label for="addressField"></label>
                                <textarea id="addressField" placeholder="189 avenue Jean rondeaux 76100 , France" class="form-control" rows="5"></textarea>
                            </div>


                            <p class="text-secondary my-3">Mes réseaux sociaux</p>

                            <div class="form-group mt-2">
                                <label for="fbField"></label>
                                <input type="text" id="fbField" placeholder="Facebook" class="form-control" />
                            </div>
                            <div class="form-group mt-2">
                                <label for="instaField"></label>
                                <input type="text" id="instaField" placeholder="Instagram" class="form-control" />
                            </div>
                            <div class="form-group mt-2">
                                <label for="linkedField"></label>
                                <input type="text" id="linkedField" placeholder="LinkedIn" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- seconde col -->
                            <h3>Information professionnelle</h3>

                            <div class="form-group mt-2">
                                <label for="">OBJECTIFS</label>
                                <textarea id="objectiveField" rows="5" placeholder="Présentation" class="form-control"></textarea>
                            </div>

                            <div class="form-group mt-2" id="we">
                                <label for="">
                                    EXPERIENCES</label>
                                <textarea placeholder="Enter here" class="form-control weField" rows="3"></textarea>

                                <!-- textarea -->

                                <div class="container text-center mt-2" id="weAddButton">
                                    <button onclick="addNewWEField()" class="btn btn-primary btn-sm">
                                        Ajouter
                                    </button>
                                </div>
                            </div>

                            <div class="form-group mt-2" id="aq">
                                <label for="">
                                    FORMATIONS</label>
                                <textarea placeholder="Enter here" class="form-control eqField" rows="3"></textarea>

                                <div class="container text-center mt-2" id="aqAddButton">
                                    <button onclick="addNewAQField()" class="btn btn-primary btn-sm">
                                        Ajouter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container text-center mt-3">
                        <button onclick="generateCV()" class="btn btn-primary btn-lg">
                            Créer mon CV
                        </button>
                    </div>
                </div>
            </div class="card-body">



            <div class="container mt-3 text-center">
            </div>
        </div>
    </div>
    <!-- Fin THEO -->

    <div id="telechargement">
        <button onclick="printCV()" class="btn background">Print CV</button>
        <button class="btn background" id="download">Télécharger</button>
    </div>

</div>
          
          
    </body> 


<?php wp_footer(); ?>