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
                <button onclick="gfg_Run()" id="yellow_color"></button>
                <button onclick="blue_Run()" id="blue_color"></button>
                <button onclick="green_Run()" id="green_color"></button>
                <button onclick="grey_Run()" id="grey_color"></button>
                <button onclick="pink_Run()" id="purple_color"></button>

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


        <div id="javascript_header"></div>
        <form>
            <div class="form__header">
                <h1>Build Your Resume</h1>
                <p>Enter the fields below to generate an html resume</p>
            </div>

            <h2>Personal Details</h2>

            <div class="form-group">
                <label for="name">Nom<span>*</span></label>
                <input type="text" name="name" id="name" placeholder="Robert">
                <div id="name__error" class="error"></div>
            </div>

            <div class="form-group">
                <label for="name">Prenom<span>*</span></label>
                <input type="text" name="firstname" id="firstname" placeholder="Ross">
                <div id="name__error" class="error"></div>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="4059 Mt Lee Dr. Hollywood, CA 90068">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" placeholder="+1  123 456 7890">
            </div>

            <div class="form-group">
                <label for="email">Email <span>*</span></label>
                <input type="text" name="email" id="email" placeholder="example@mail.com">
                <div id="email__error" class="error"></div>
            </div>

            <div class="form-group">
                <label for="about">About You</label>
                <textarea name="about" id="about" placeholder="Three or four sentences about your personality, work ethic, interests, and/or more"></textarea>
            </div>

            <div class="form-group">
                <label for="career">Career Objectives</label>
                <textarea name="career" id="career" placeholder="One or two sentences about what you wish to accomplish in your career"></textarea>
            </div>

            <div class="form-group">
                <label for="education">Education</label>
                <textarea name="education" id="education" placeholder="List any completed high school, college, or other educational programs"></textarea>
            </div>

            <div class="line-break"></div>

            <h2>Work Experience</h2>

            <h3>Most Recent Job</h3>

            <div class="form-date-group">
                <div class="form-group">
                    <label for="job-1__start">Start Date</label>
                    <input type="date" name="job-1__start" id="job-1__start">
                </div>
                <div class="form-group">
                    <label for="job-1__end">End Date</label>
                    <input type="date" name="job-1__end" id="job-1__end">
                </div>
            </div>

            <div class="form-group">
                <label for="job-1__details">Position Details</label>
                <textarea name="job-1__details" id="job-1__details"></textarea>
            </div>

            <div class="line-break"></div>

            <h3>Past Job</h3>

            <div class="form-date-group">
                <div class="form-group">
                    <label for="job-2__start">Start Date</label>
                    <input type="date" name="job-2__start" id="job-2__start">
                </div>
                <div class="form-group">
                    <label for="job-2__end">End Date</label>
                    <input type="date" name="job-2__end" id="job-2__end">
                </div>
            </div>

            <div class="form-group">
                <label for="job-2__details">Position Details</label>
                <textarea name="job-2__details" id="job-2__details"></textarea>
            </div>

            <div class="line-break"></div>

            <h3>Another Past Job</h3>

            <div class="form-date-group">
                <div class="form-group">
                    <label for="job-3__start">Start Date</label>
                    <input type="date" name="job-3__start" id="job-3__start">
                </div>
                <div class="form-group">
                    <label for="job-3__end">End Date</label>
                    <input type="date" name="job-3__end" id="job-3__end">
                </div>
            </div>

            <div class="form-group">
                <label for="job-3__details">Position Details</label>
                <textarea name="job-3__details" id="job-3__details"></textarea>
            </div>

            <div class="line-break"></div>

            <div class="form-group">
                <label for="references">References</label>
                <textarea name="references" id="references"></textarea>
            </div>

            <div class="line-break"></div>

            <input type="submit" value="Create Resume" id="create-resume">
        </form>
        <!-- Fin THEO -->

        <div id="telechargement">
            <button onclick="printCV()" class="btn background">Print CV</button>
            <button class="btn background" id="download">Télécharger</button>
        </div>

    </div>
    


<?php  wp_footer(); ?>