<?php
/*
Template Name: User Accueil

*/

include('fonctions.php');
$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');



//Compte User
session_start();
$id = $_SESSION["id"];
$requestUtilisateur = $db->prepare("SELECT * FROM user WHERE id = '$id'");
$requestUtilisateur->execute();
$users = $requestUtilisateur->fetch();


wp_head(); ?>



<div id="bloc_principal_user">

    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>


        <div id="overlay-content1">
            <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" width="70px" alt=""></a>
            <a href="#" class="style_bouton" onclick="changeCvtheque()"><i class="fi fi-rr-edit"></i><br>CVthèque</a>
            <a href="#" class="style_bouton" onclick="changeModele()"><i class="fi fi-rr-apps"></i><br>Modèles</a>
            <a href="#" onclick="changeStyle()" class="style_bouton"><i class="fi fi-rr-pencil"></i><br>Style</a>
            <a href="#" class="style_bouton"><i class="fi fi-rr-picture"></i><br>Importer</a>
            <a href="#" id="telecharger" class="style_bouton"><i class="fi fi-rr-download"></i><br>Télécharger</a>
            <a href="#" class="style_bouton" value="Rafraîchir" onclick="history.go(0)"><i class="fi fi-rr-add"></i><br>Nouveau</a>
        </div>

        <div id="overlay-content2">
            <h5 style="color: white;">Ma Cvthèque</h5>
        </div>
        <div id="overlay-content3">
        </div>
    </div>

    <div id="bouton_rideau" onclick="openNav()"><i class="fi fi-rr-magic-wand"></i></div>

    <div id="white"></div>


    <!-- THEO -->
    <div id="feuille">

        <h4>Informations personnelles</h4>

        <div class="form-group">
            <input type="text" name="name" id="name" placeholder="Nom*">
            <div id="name__error" class="error"></div>
        </div>

        <div class="form-group">
            <input type="text" name="firstname" id="firstname" placeholder="Prénom*">
            <div id="firstname__error" class="error"></div>
        </div>

        <div class="form-group">
            <input type="text" name="address" id="address" placeholder="Ville & Code Postale*">
        </div>

        <div class="form-group">
            <input type="text" name="phone" id="phone" placeholder="Téléphone*">
            <div id="phone__error" class="error"></div>
        </div>

        <div class="form-group">
            <input type="text" name="email" id="email" placeholder="E-mail *">
            <div id="email__error" class="error"></div>
        </div>

        <div class="form-group">
            <textarea name="about" id="about" placeholder="Trois ou quatre phrases sur votre personnalité, éthique professionnelle, intérêts... *"></textarea>
        </div>

        <div class="form-group">
            <textarea name="career" id="career" placeholder="Une ou deux phrases sur ce que vous souhaitez accomplir durant votre carrière *"></textarea>
        </div>

        <div class="form-group">
            <textarea name="education" id="education" placeholder="Listez tout lycée, université, école ou autre programme éducatif que vous auriez suivi *"></textarea>
        </div>

        <div class="line-break"></div>

        <h4>Expérience professionnelle</h4>

        <h5>Mon dernier emploi</h5>

        <div class="form-date-group">
            <div class="form-group">
                <label for="job-1__start">Du</label>
                <input type="date" name="job-1__start" id="job-1__start" placeholder="début">
            </div>
            <div class="form-group">
                <label for="job-1__end">au</label>
                <input type="date" name="job-1__end" id="job-1__end">
            </div>
        </div>

        <div class="form-group">
            <textarea name="job-1__details" id="job-1__details" placeholder="Détails concernant ce poste"></textarea>
        </div>

        <div class="line-break"></div>

        <h5>Emploi précédent</h5>

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
            <textarea name="job-2__details" id="job-2__details" placeholder="Détails concernant ce poste"></textarea>
        </div>

        <div class="line-break"></div>

        <h5>Un autre emploi précédent</h5>

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
            <textarea name="job-3__details" id="job-3__details" placeholder="Détails concernant ce poste"></textarea>
        </div>

        <div class="line-break"></div>

        <div class="form-group">
            <textarea name="references" id="references" placeholder="Notes supplémentaires"></textarea>
        </div>

        <div class="line-break"></div>

        <!-- Fin THEO -->

    </div>

    <div id="telechargement">

        <button id="create-resume" class="cursor" title="Attention: Cela va envoyer ton CV au recruteur">Sauvegarder & Envoyer</button>
        <button class="cursor" title="Sauvegarder mon CV dans ma CVthèque">Sauvegarder le brouillon</button>
        <button onclick="printCV()" class="cursor" class="btn background">Imprimer <i class="fi fi-rr-print"></i></button>
    </div>

    <!-- Modification Compte -->
    <div id="compte_user">
        <button id="mon_compte"><i class="fi fi-rr-user" onclick="openProfil()"></i></button>
        <div id="myNav" class="overlay overAccount">


            <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" width="50px" alt=""></a>

            <div class="overlayProfil">
                <p><?php echo $users["user_surname"] . " " . $users["user_name"]; ?></p>
                <a href="javascript:void(0)" class="closebtn" onclick="closeProfil()">&times;</a>
                <a href="#" class="button-modif" onclick=""><i class=""></i><br>Modifier Compte</a>
                <a href="#" class=" button-deconnexion" onclick="location.href='localhost/projCV/wordpress/accueil'"><i class=""></i><br>Deconnexion</a>

            </div>
        </div>
        </body>

    </div>

    <?php wp_footer(); ?>