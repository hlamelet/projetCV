<?php
                if(!empty($_POST["submit"])){
                    smtpMailer($_POST['email'], GMailUSER, 'Bertolucci Agency' , 'Retour candidature ',$_POST['message']);
                }
                ?>
