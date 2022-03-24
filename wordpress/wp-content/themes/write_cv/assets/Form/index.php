<?php
include("testphpMailer.php");
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <h1 class="brand"><span>Contact</span></h1>

        <div class="wrapper">


            <div class="company-info">
                <h3>Entreprise</h3>

                <ul>
                    <li><i class="fa fa-road"></i> 30 Pl. Henri Gadeau de Kerville, 76100 Rouen</li>
                    <li><i class="fa fa-phone"></i> 02 35 70 04 04</li>
                    <li><i class="fa fa-envelope"></i> contact@gmail.com</li>
                </ul>
            </div>


            <!-- CONTACT FORM -->
            <div class="contact">
                <h3>Contact</h3>

                <form id="contact-form" method="post">

                    <p>
                        <label>envoyer un mail à :</label>
                        <script>
                            let email_de_contact = sessionStorage.getItem('email').substring(2)
                            document.write("<input type = 'email' name = 'email' value ='" + email_de_contact + "'required ><br>")
                        </script>

                    </p>
                    <br>
                    <p>
                        <label>Message</label>
                        <textarea name="message" rows="5" id="message" placeholder="Bonjour, nous avons retenu votre candidature..."></textarea>
                    </p>
                    <p class="full">
                        <input  name="submit" type="submit">
                    </p>
                </form>
                <?php
                if(!empty($_POST["submit"])){
                    smtpMailer($_POST['email'], GMailUSER, 'Bertolucci Agency' , 'Retour candidature ',$_POST['message']);
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>