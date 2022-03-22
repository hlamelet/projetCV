<?php
/*
Template Name: Home
*/
$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');
$erreur = false;
$erreurchamp = false;
session_start();
session_destroy();


// CONNEXION

if (!empty($_POST["email"]) && !empty($_POST["mdp"])) {
    $email = $_POST["email"];
    $password = $_POST["mdp"];

    $requestUtilisateur = $db->prepare("SELECT * FROM user WHERE user_email = '$email'");
    $requestUtilisateur->execute();
    $users = $requestUtilisateur->fetch();



    if ((!empty($users)) && (password_verify($password, $users["user_mdp"]))) {
        session_start();
        $_SESSION["id"] = $users["id"];
        $_SESSION["admin"] = $users["admin_role"];
        $_SESSION["user"] = $users["user_role"];

        if (($users["user_role"]) == 1) {
            header("Location: http://localhost/projCV/wordpress/espace-utilisateur/");
        }
        if (($users["admin_role"]) == 1) {
            header("Location: http://localhost/projCV/wordpress/espace-administrateur/");
        }
    } else {
        $erreur = true;
    }
}

// INSCRIPTION 



if (empty($_POST["name-register"]) || empty($_POST["surname-register"]) || empty($_POST["email-register"]) || empty($_POST["mdp-register"])) {

    $erreurchamp = true;
} else {
    $nameReg = $_POST["name-register"];
    $surnameReg = $_POST["surname-register"];
    $emailReg = $_POST["email-register"];
    $passwordReg = $_POST["mdp-register"];
    $passwordRegConf = $_POST["mdp-register-confirm"];
    $passwordHash = password_hash($passwordReg, PASSWORD_DEFAULT);
    $roleUser = 1;

    if (($passwordReg == $passwordRegConf) && (strlen($passwordReg) >= 8) && (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $passwordReg))) {

        $req = $db->prepare("INSERT INTO user (user_name, user_surname,user_email,user_mdp,user_role) VALUES ('$nameReg', '$surnameReg', '$emailReg', '$passwordHash','$roleUser')");
        $req->execute();
    }
}

wp_head();
get_header();

?>


<body onload="myFunction()">
    <div class="center">
        <div class="laptop">
            <img src="/projCV/wordpress/wp-content/themes/write_cv/assets/img/logo.png" alt="logo" id="loading">

            <div class="container-login">
                <div class="img-laptop">
                    <img src="/projCV/wordpress/wp-content/themes/write_cv/assets/img/pen.gif" alt="logo" id="pen">
                </div>
                <div class="login-text">

                    <form action="" method="post" class="form-login">
                        <h1>Bienvenue sur<br> Bertolluci Agency</h1>
                        <h2>Le site de création de CV en ligne de notre agence</h2>
                        <h3>Connexion</h3>
                        <label for="name">E-mail: </label>
                        <input type="email" name="email" id="email">

                        <label for="email">mot de passe: </label>
                        <input type="password" name="mdp" id="mdp">
                        <div id="erreur-text" class="erreur"></div>

                        <input type="submit" value="Entrez" id="submit-login">
                        <p id="button-register">Vous n'avez pas de compte ?</p>

                    </form>

                </div>

            </div>

            <div class="container-register">
                <div class="title-inscription">
                    <h3>Inscription</h3>
                </div>
                <div class="register-text ">

                    <form action="" method="post" class="form-register" onsubmit="return validateForm()" name="register" id="register">

                        <label for="name-register">Nom: </label>
                        <input type="text" name="name-register" id="name-register">
                        <div id="demo"></div>
                        <label for="email-register">Prenom: </label>
                        <input type="text" name="surname-register" id="surname-register">

                        <label for="email-register">E-mail: </label>
                        <input type="email" name="email-register" id="email-register">

                        <label for="mdp-register">Mot de passe: </label>
                        <input type="password" name="mdp-register" id="mdp-register">
                        <div id="erreur-mdp">
                            <p>Votre mot de passe doit contenir au moins 8 caractères ainsi qu’une majuscule, une minuscule, un chiffre et un symbole.</p>
                        </div>

                        <label id="label-mdpconf" for="mdp-register-confirm"> Confirmation Mot de passe: </label>
                        <input type="password" name="mdp-register-confirm" id="mdp-register-confirm">
                        <div id="erreurChamp-text" class="erreur"></div>

                        <input type="submit" value="Valider" id="submit-register" name="submit-register">
                        <p id="button-login">Vous avez déja un compte ?</p>


                    </form>
                </div>


            </div>

        </div>
        <div class="keyboard"></div>
    </div>


</body>
<script>
    var myVar;
    var erreurchamp = document.getElementById("erreurChamp-text");
    var erreur = document.getElementById("erreur-text");
    var register = document.getElementById("button-register");
    var login = document.getElementById("button-login");

    const name = document.getElementById("name-register");
    const surname = document.getElementById("surname-register");
    const email = document.getElementById("email-register");
    const mdp = document.getElementById("mdp-register");
    const mdpConf = document.getElementById("mdp-register-confirm");
    const erreurmdp = document.getElementById("erreur-mdp");


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
                            $('#erreurChamp-text').html("");
                            emailvalid = false;
                        }


                    }
                });


            })
        }

    );


    register.addEventListener("click", pageRegister);
    login.addEventListener("click", showPage);
    mdp.addEventListener('input', passwordChange);


    function validateForm() {
        var x = document.forms["register"]["name-register", "surname-register", "email-register", "mdp-register", "mdp-register-confirm"].value;

        if (x == "") {
            erreurchamp.innerHTML = "<p>Tout les champs ne sont pas remplies</p>";
            return false;
        }
        if (mdpConf.value != mdp.value) {
            erreurchamp.innerHTML = "<p>Les mots de passes sont différents</p>";
            return false;
        }

        if (emailvalid == true) {
            return false;
        }
    }

    function passwordChange() {

        if ((mdp.value.length >= 8) && (hasLowerCase(mdp.value) == true) && (hasUpperCase(mdp.value) == true) &&
            (hasNumber(mdp.value) == true) && (hasSpecial(mdp.value) == true)) {

            erreurmdp.style.color = "green";
        } else {
            erreurmdp.style.color = "red";
        }
    }

    function hasLowerCase(str) {
        return (/[a-z]/.test(str));
    }

    function hasUpperCase(str) {
        return (/[A-Z]/.test(str));
    }

    function hasNumber(str) {
        return (/[0-9]/.test(str));
    }

    function hasSpecial(str) {
        return (/[!-/]|[:-@]|[[-`]|[{-~]/.test(str));

    }






    function myFunction() {
        myVar = setTimeout(showPage, 000);
    }

    function showPage() {
        document.getElementById("loading").style.display = "none";
        document.getElementsByClassName("container-login")[0].style.display = "flex";
        document.getElementsByClassName("container-register")[0].style.display = "none";
    }



    function pageRegister() {
        document.getElementsByClassName("container-login")[0].style.display = "none";
        document.getElementsByClassName("container-register")[0].style.display = "flex";
    }




    <?php if ($erreur == true) {
    ?> erreur.innerHTML = "<p>E-mail ou mot de passe incorrect</p>";
    <?php } ?>
</script>

<?php
get_footer();
?>