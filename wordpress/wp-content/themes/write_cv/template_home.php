<?php
/*
Template Name: Home
*/
$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');
$erreur = false;
$erreurchamp = false;

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
        header("Location: http://localhost/projCV/wordpress/espace-utilisateur/");
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
    $passwordHash = password_hash($passwordReg, PASSWORD_DEFAULT);

    $req = $db->prepare("INSERT INTO user (user_name, user_surname,user_email,user_mdp) VALUES ('$nameReg', '$surnameReg', '$emailReg', '$passwordHash')");
    $req->execute();
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
                        <h1>Bienvenue sur CV WRITER</h1>
                        <h2>Le site de création de CV en ligne</h2>
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

                    <form action="" method="post" class="form-register">

                        <label for="name-register">Nom: </label>
                        <input type="text" name="name-register" id="name-register">

                        <label for="email-register">Prenom: </label>
                        <input type="text" name="surname-register" id="surname-register">

                        <label for="email-register">E-mail: </label>
                        <input type="mail" name="email-register" id="email-register">

                        <label for="mdp-register">Mot de passe: </label>
                        <input type="password" name="mdp-register" id="mdp-register">

                        <label for="mdp-register-confirm"> Confirmation Mot de passe: </label>
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


    function myFunction() {
        myVar = setTimeout(showPage, 000);
    }

    function showPage() {
        document.getElementById("loading").style.display = "none";
        document.getElementsByClassName("container-login")[0].style.display = "flex";
        document.getElementsByClassName("container-register")[0].style.display = "none";
    }
    register.addEventListener("click", pageRegister);
    login.addEventListener("click", showPage);


    function pageRegister() {
        document.getElementsByClassName("container-login")[0].style.display = "none";
        document.getElementsByClassName("container-register")[0].style.display = "flex";
    }




    <?php if ($erreur == true) {
    ?> erreur.innerHTML = "<p>E-mail ou mot de passe incorrect</p>";
    <?php } ?>

    <?php if ($erreurchamp == true) {
    ?> erreurchamp.innerHTML = "<p>Tout les champs ne sont pas remplies</p>";
    <?php } ?>
</script>

<?php
get_footer();
?>


