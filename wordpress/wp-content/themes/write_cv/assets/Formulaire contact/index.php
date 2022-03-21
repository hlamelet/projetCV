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
            <li><i class="fa fa-phone"></i>  02 35 70 04 04</li>
            <li><i class="fa fa-envelope"></i> contact@gmail.com</li>
        </ul>
    </div>


    <!-- CONTACT FORM -->
    <div class="contact">
        <h3>Contact</h3>

        <form id="contact-form" method="post">

            <p>
            <label>Votre email</label>
        <input type="email" name="email" required><br>
            </p>
            <br>
            <p>
            <label>Message</label>
            <textarea name="message" rows="5" id="message"></textarea>
            </p>
            <p class="full">
            <input type="submit">
        </p>
        </form>
        <?php
    if (isset($_POST['message'])) {
        $retour = mail('gaggio880@gmail.com', 'Retour de votre cv', $_POST['message'], 'From: gaggio880@gmail.com' . "\r\n" . 'Reply-to: ' . $_POST['email']);
        if($retour)
            echo '<p>Votre message a bien été envoyé.</p>';
    }
    ?>
    </div>
</div>
</div>
</body>
</html>




















