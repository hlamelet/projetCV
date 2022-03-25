<?php
/*
Template Name: User Accueil

*/



include('fonctions.php');
$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');

//Compte User
session_start();
// debug($_SESSION);
if (isset($_SESSION["user"]) && ($_SESSION["user"] == 1)) {
    $id = $_SESSION["id"];
    $requestUtilisateur = $db->prepare("SELECT * FROM user WHERE id = '$id'");
    $requestUtilisateur->execute();
    $users = $requestUtilisateur->fetch();

    if (!empty($_POST["submit-modif"])) {
        $nameModif = $_POST["name-modif"];
        $surnameModif = $_POST["surname-modif"];
        $emailModif = $_POST["email-modif"];
        $req = $db->prepare("UPDATE user SET user_name='$nameModif',user_surname='$surnameModif',user_email='$emailModif' WHERE id = '$id'");
        $req->execute();
    }
    // affichage des brouillons dans la cvthèque

    $pdoStat = $db->prepare("SELECT * FROM brouillon_cv WHERE id_user = $_SESSION[id]");
    $executeIsOk = $pdoStat->execute();
    $brouillonCv = $pdoStat->fetchAll();

    // envoi d'un pdf en bdd

    if (!empty($_FILES)) {
        $file_name = $_FILES['fichier']['name'];
        $file_extension = strrchr($file_name, ".");

        $file_tmp_name = $_FILES['fichier']['tmp_name'];
        $file_dest = 'assets/cv/' . $file_name;

        $extentions_autorisees = array('.pdf', '.PDF');

        if (in_array($file_extension, $extentions_autorisees)) {
            if (move_uploaded_file($file_tmp_name, $file_dest)) {
                $req = $db->prepare('INSERT INTO cv_pdf(id_cv, id_user, cv_name, file_url) VALUES(?,?,?,?)');
                $req->execute(array($_SESSION['current_cv_id'], $_SESSION['id'], $file_name, $file_dest));
            } else {
                echo 'erreur lors de lenvoi';
            }
        } else 'erreur';
    }

    wp_head();
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <div id="bloc_principal_user">
        <div id="send_return"></div>

        <div id="myNav" class="overlay">



            <div id="overlay-content1">
                <a href="#" onclick="changeCouleurs()" class="style_bouton"><i class="fi fi-rr-palette"></i></a>
                <a href="#" onclick="changeFonts()" class="style_bouton"><i class="fi fi-rr-letter-case"></i></a>
                <a href="#" onclick="changeStickers()" class="style_bouton"><i class="fi fi-rr-grin"></i></a>
                <a href="#" onclick="changeFonts()" class="style_bouton"><i class="fi fi-rr-grin"></i></a>
                <a href="#" onclick="changeFonts()" class="style_bouton"><i class="fi fi-rr-grin"></i></a>
                <a href="#" onclick="changeFonts()" class="style_bouton"><i class="fi fi-rr-grin"></i></a>


            </div>

            <div id="overlay-content2">
                <h5 style="color: white; padding-bottom:15px">Couleur du CV</h5>
                <!-- pastels -->
                <button onclick="gfg_Run()" class="color_class" id="yellow_color"></button><br>

                <button onclick="blue_Run()" class="color_class" id="blue_color"></button>

                <button onclick="green_Run()" class="color_class" id="green_color"></button><br>

                <button onclick="grey_Run()" class="color_class" id="grey_color"></button>

                <button onclick="pink_Run()" class="color_class" id="purple_color"></button>

                <button onclick="marron_Run()" class="color_class" id="marron_color"></button><br>

                <br>
                <br>
                <!-- pétants -->
                <button onclick="rouge_Run()" class="color_class" id="rouge_color"></button><br>

                <button onclick="bleu_Run()" class="color_class" id="bleu_color"></button>

                <button onclick="jaune_Run()" class="color_class" id="jaune_color"></button><br>

                <button onclick="vert_Run()" class="color_class" id="vert_color"></button>

                <button onclick="rose_Run()" class="color_class" id="rose_color"></button>

                <button onclick="ciel_Run()" class="color_class" id="ciel_color"></button><br>
                <br>
                <br>
                <!-- monochromatique -->
                <button onclick="black_Run()" class="color_class" id="black_color"></button><br>

                <button onclick="grey1_Run()" class="color_class" id="grey1_color"></button>

                <button onclick="grey2_Run()" class="color_class" id="grey2_color"></button><br>

                <button onclick="grey3_Run()" class="color_class" id="grey3_color"></button>

                <button onclick="grey4_Run()" class="color_class" id="grey4_color"></button>

                <button onclick="white_Run()" class="color_class" id="white_color"></button><br>
            </div>
            <div id="overlay-content3"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            </div>
        </div>

        <div id="bouton_rideau">
            <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" width="70px" alt=""></a>
            <div class="magic" onclick="toggle('foo')"><i class="fi fi-rr-document" style="font-size: large;"></i><br>
                <h6>Brouillons</h6>
            </div>
            <div onclick="openNav()" class="magic"><i class="fi fi-rr-magic-wand" style="font-size: large;"></i><br>
                <h6>Style</h6>
            </div>

            <div class="magic" id="telecharger"><i class="fi fi-rr-download" style="font-size: large;"></i><br>
                <h6>Télécharger</h6>
            </div>
            <div class="magic" value="Rafraîchir" onclick="history.go(0)"><i class="fi fi-rr-add" style="font-size: large;"></i><br>
                <h6>Nouveau</h6>
            </div>
            <div id="myBtn" class="magic"><i class="fi fi-rr-interrogation" style="font-size: large;"></i><br>
                <h6>Tutoriel</h6>
            </div>
        </div>

        <div id="foo">
            <h5 style="color: black;">Mes Brouillons</h5>
            <?php $no = 1; ?>
            <?php foreach ($brouillonCv as $brouillon) : ?>
                <div id="brouillon_liste" style="cursor: pointer;">
                    <div class="brouillon">
                        <?= $brouillon['date'] ?>
                    </div>
                </div>
                <i id="<?= $no; ?>" style="color: red; cursor:pointer;" class="fi fi-rr-trash"></i>
                <?php $no += 3; ?>
                <br>
            <?php endforeach; ?>
        </div>

        <div id="feuille">
            <h2 style="text-align: center; color:brown">Objectif: Recherche d'un poste de Technicien du Web</h2>
            <div style="display: flex; flex-direction:row">
                <div id="information_cv">
                <h4 style=" padding-bottom:13%;">Informations personnelles 🧑🏽</h4>

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
                </div>
                <div id="personnalite">
                    <div class="form-group">
                        <h5>Ma personnalité...</h5>
                        <textarea name="about" id="about" placeholder="Trois ou quatre phrases sur votre personnalité, éthique professionnelle, intérêts... *"></textarea>
                    </div>

                    <div class="form-group">
                        <h5>J'aimerais...</h5>
                        <textarea name="career" id="career" placeholder="Une ou deux phrases sur ce que vous souhaitez accomplir durant votre carrière *"></textarea>

                    </div>
                    <div class="form-group">
                        <h3 style="margin-top: 15px;">FORMATIONS</h3>
                        <textarea name="education" id="education" placeholder="Listez tout lycée, université, école ou autre programme éducatif que vous auriez suivi *"></textarea>
                    </div>
                </div>
            </div>

            <h4 style="text-align: center;">Expériences professionnelles</h4>

            <h5 style="text-align: center;">Mon dernier emploi</h5>

            <div class="form-date-group" style="text-align: center;">
                <div class="form-group">
                    <label for="job-1__start">Du</label>
                    <input type="date" name="job-1__start" id="job-1__start" placeholder="début">
                    <div id="job-1_start__error" class="job_start__error"></div>
                </div>
                <div class="form-group">
                    <label for="job-1__end">au</label>
                    <input type="date" name="job-1__end" id="job-1__end">
                    <div id="job-1_end__error" class="job_end__error"></div>
                </div>
            </div>

            <div class="form-group">
                <textarea name="job-1__details" id="job-1__details" placeholder="Détails concernant ce poste"></textarea>
            </div>

            <h5 style="text-align: center;">Emploi précédent</h5>

            <div class="form-date-group" style="text-align: center;">
                <div class="form-group">
                    <label for="job-2__start">Date de début</label>
                    <input type="date" name="job-2__start" id="job-2__start">
                    <div id="job-2_start__error" class="job_start__error"></div>
                </div>
                <div class="form-group">
                    <label for="job-2__end">Date de fin</label>
                    <input type="date" name="job-2__end" id="job-2__end">
                    <div id="job-2_end__error" class="job_end__error"></div>
                </div>
            </div>

            <div class="form-group">
                <textarea name="job-2__details" id="job-2__details" placeholder="Détails concernant ce poste"></textarea>
            </div>

            <h5 style="text-align: center;">Un autre emploi précédent</h5>

            <div class="form-date-group" style="text-align: center;">
                <div class="form-group">
                    <label for="job-3__start">Date de début</label>
                    <input type="date" name="job-3__start" id="job-3__start">
                    <div id="job-3_start__error" class="job_start__error"></div>
                </div>
                <div class="form-group">
                    <label for="job-3__end">Date de fin</label>
                    <input type="date" name="job-3__end" id="job-3__end">
                    <div id="job-3_end__error" class="job_end__error"></div>
                </div>
            </div>

            <div class="form-group">
                <textarea name="job-3__details" id="job-3__details" placeholder="Détails concernant ce poste"></textarea>
            </div>

            <div class="line-break"></div>

            <div class="form-group">
                <textarea name="references" id="references" placeholder="Notes supplémentaires"></textarea>
            </div>

            <!-- Fin THEO -->

        </div>

        <div id="telechargement">

            <div>
                <div id="brouillon" class="cursor" title="Sauvegarder mon CV dans ma CVthèque">Sauvegarder le brouillon</div>
                <div id="print" onclick="printCV()" class="cursor" class="btn background">Imprimer <i class="fi fi-rr-print"></i></div>
            </div>
            <div id="envoi_recru">
                <p> ⚠️ Télécharge ton cv & dépose le ici avant d'envoyer</p>


                <form action="" method="POST" enctype="multipart/form-data">
                    <input id="input_file_pdf" type="file" name="fichier">
                    <div id="create-resume"><input type="submit" value="Envoyer le CV" title="Attention: Cela va envoyer ton CV au recruteur" style="cursor:pointer"></div>
                </form>

            </div>
            <!-- Trigger/Open The Modal -->
            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close"><i class="fi fi-rr-cross"></i></span>
                    <p style="font-weight: 600;">Comment envoyer son CV ?</p><br>
                    <p>1. Remplis tes informations directement sur la feuille en cliquant sur les éléments.</p><br>
                    <p>2. Stylise-le en changeant les couleurs et la police</p><br>
                    <p>3. Télécharge ton CV <i class="fi fi-rr-download"></i> (le bouton se trouve à gauche)</p><br>
                    <p>4. </p>

                </div>

            </div>
        </div>
    </div>
    <div id="zoom_box">
        <button type="button" id="zoom" onclick="zoomplus30()">
            +
        </button>
        <button type="button" id="zoom" onclick="zoomretour()">
            o
        </button>
        <button type="button" id="zoom" onclick="zoommoins30()">
            -
        </button>
    </div>


    <!-- Modification Compte -->
    <div id="compte_user">
        <img src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-color-vitaly-gorbachev/60/000000/external-man-love-vitaliy-gorbachev-lineal-color-vitaly-gorbachev.png" id="mon_compte" onclick="openProfil();" />
        <div id="myNav" class="overlay overAccount">


            <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" width="50px" alt=""></a>

            <div class="overlayProfil">
                <p><?php echo $users["user_surname"] . " " . $users["user_name"]; ?></p>
                <a href="javascript:void(0)" class="closebtn" id="closeprofil" onclick="closeProfil()">&times;</a>
                <a href="#" id="button-modif-open" onclick="ModifAccount()"><i class=""></i><br>Modifier mes informations</a>
                <a href="#" id="button-modif-close" onclick="ModifAccountClose()"><i class=""></i><br>Modifier Compte</a>
                <div class="modifProfil">
                    <form action="" method="post" class="formModif" onsubmit="return validateForm()">

                        <label for="name-modif">Nom: </label>
                        <input type="text" name="name-modif" id="name-modif" value="<?php echo $users["user_name"] ?>">

                        <label for="email-modif">Prenom: </label>
                        <input type="text" name="surname-modif" id="surname-modif" value="<?php echo $users["user_surname"] ?>">

                        <label for="email-modif">E-mail: </label>
                        <input type="email" name="email-modif" id="email-modif" value="<?php echo $users["user_email"] ?>">
                        <div id="erreurChamp-text" class="erreur"></div>

                        <input type="submit" value="Valider" id="submit-modif" name="submit-modif">
                    </form>
                </div>
                <a href="#" class=" button-deconnexion" onclick="location.href='localhost/projCV/wordpress/accueil'">Deconnexion<i class="fi fi-rr-sign-out"></i></a>
            </div>



            <script>
                const email = document.getElementById("email-modif");
                $(function ValideEmail() {
                    $(email).keyup(function() {
                        emailAjax = $(email).val();
                        $.ajax({
                            type: "POST",
                            url: "/projCV/wordpress/wp-content/themes/write_cv/inscriptionAjax.php",
                            data: "email-register=" + emailAjax,
                            success: function(data) {
                                if (data == 1) {
                                    $('#erreurChamp-text').html("<p>mail déja utilisé</p>");
                                    emailvalid = true;
                                } else {
                                    $('#erreurChamp-text').html(" ");
                                    emailvalid = false;
                                }
                            }
                        });
                    })
                });

                function validateForm() {
                    if (emailvalid == true) {
                        return false;
                    }
                }
            </script>



        </div>
    </div>
    </body>
    </div>
    <style>
        body {
            background-color: floralwhite;
            background-image: none;
            font-family: "Poppins", sans-serif;
        }
    </style>
<?php wp_footer();
} else
    header("Location: http://localhost/projCV/wordpress/accueil/"); ?>