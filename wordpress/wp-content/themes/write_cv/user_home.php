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

                <!-- couleurs -->
                <h5>Couleur du CV</h5>
                <button onclick="gfg_Run()" class="yellow_color"></button>
                <button onclick="gfg_Run()" id="yellow_color"></button>
                <button onclick="blue_Run()" id="blue_color"></button>
                <button onclick="green_Run()" id="green_color"></button>
                <button onclick="grey_Run()" id="grey_color"></button>
                <button onclick="pink_Run()" id="purple_color"></button>

                <!-- fin couleurs -->
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


    <!-- THEO -->
    <div id="feuille_cv">
        <div id="javascript_header"></div>
        <form method="POST">
            <div class="form__header">
                <h1>Fabriquez votre CV</h1>
                <p>Remplissez les champs demandés</p>
            </div>

            <h2>Informations personnelles</h2>

            <div class="form-group">
                <label for="name">Nom<span>*</span></label>
                <input type="text" name="name" id="name" placeholder="Robert">
                <div id="name__error" class="error"></div>
            </div>

            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" placeholder="Robert">
                <div id="name__error" class="error"></div>
            </div>

            <div class="form-group">
                <label for="address">Addresse</label>
                <input type="text" name="address" id="address" placeholder="12 rue du Renard, 75001 Paris">
            </div>

            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="text" name="phone" id="phone" placeholder="+33 2 35 76 80 91">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="example@mail.com">
                <div id="email__error" class="error"></div>
            </div>

            <div class="form-group">
                <label for="about">A propos de vous</label>
                <textarea name="about" id="about" placeholder="Trois ou quatre phrases sur votre personnalité, éthique professionnelle, intérêts..."></textarea>
            </div>

            <div class="form-group">
                <label for="career">Objectifs de carrière</label>
                <textarea name="career" id="career" placeholder="Une ou deux phrases sur ce que vous souhaitez accomplir durant votre carrière"></textarea>
            </div>

            <div class="form-group">
                <label for="education">Education</label>
                <textarea name="education" id="education" placeholder="Listez tout lycée, université, école ou autre programme éducatif que vous auriez suivi"></textarea>
            </div>

            <div class="line-break"></div>

            <h2>Expérience professionnelle</h2>

            <h3>Mon dernier emploi</h3>

            <div class="form-date-group">
                <div class="form-group">
                    <label for="job-1__start">Date de début</label>
                    <input type="date" name="job-1__start" id="job-1__start">
                </div>
                <div class="form-group">
                    <label for="job-1__end">Date de fin</label>
                    <input type="date" name="job-1__end" id="job-1__end">
                </div>
            </div>

            <div class="form-group">
                <label for="job-1__details">Détails concernant ce poste</label>
                <textarea name="job-1__details" id="job-1__details"></textarea>
            </div>

            <div class="line-break"></div>

            <h3>Emploi précédent</h3>

            <div class="form-date-group">
                <div class="form-group">
                    <label for="job-2__start">Date de début</label>
                    <input type="date" name="job-2__start" id="job-2__start">
                </div>
                <div class="form-group">
                    <label for="job-2__end">Date de fin</label>
                    <input type="date" name="job-2__end" id="job-2__end">
                </div>
            </div>

            <div class="form-group">
                <label for="job-2__details">Détails concernant ce poste</label>
                <textarea name="job-2__details" id="job-2__details"></textarea>
            </div>

            <div class="line-break"></div>

            <h3>Un autre emploi précédent</h3>

            <div class="form-date-group">
                <div class="form-group">
                    <label for="job-3__start">Date de début</label>
                    <input type="date" name="job-3__start" id="job-3__start">
                </div>
                <div class="form-group">
                    <label for="job-3__end">Date de fin</label>
                    <input type="date" name="job-3__end" id="job-3__end">
                </div>
            </div>

            <div class="form-group">
                <label for="job-3__details">Détails concernant ce poste</label>
                <textarea name="job-3__details" id="job-3__details"></textarea>
            </div>

            <div class="line-break"></div>

            <div class="form-group">
                <label for="references">Recommandations</label>
                <textarea name="references" id="references"></textarea>
            </div>

            <div class="line-break"></div>


        </form>
        <!-- Fin THEO -->



    </div>
    <div id="telechargement">
        <input type="submit" value="Prévisualiser" id="create-resume">
        <button onclick="printCV()" class="btn background">Imprimer</button>
        <button class="btn background" id="download">Télécharger</button>
    </div>

    </body>
</div>



<?php wp_footer(); ?>