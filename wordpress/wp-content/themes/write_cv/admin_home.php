<?php
/*
Template Name: Admin Accueil

*/
wp_head();
get_header();
$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');
// ---------------------------------requete

$requete = $db->prepare("SELECT cv.id,id_user,intro,nom,prenom,user_email,user_tel FROM `cv` INNER JOIN `user` ON cv.id_user = user.id");
$requete->execute();
$requete = $requete->fetchall();


?>

<head>
    <style>
        #container {
            display: flex;
        }

        #containerCV {
            width: 49.5%;
            height: 1000px;
        }

        .pdf {
            width: 49.5%;
            height: 1000px;

        }

        .selectionToExcelBtn {
            width: 100%;
            height: 100px;
            background-color: green;
        }

        .cv {
            background-color: white;
            margin-bottom: 10px;
        }

        .selected {
            background-color: grey;
        }
    </style>
</head>
<script>
    let selection2d = []
    let selection = []
    var requete =
        <?php echo json_encode($requete); ?>;
    console.log(requete)
</script>
<!-- --------------------------- -->

<h1>Admin Accueil</h1>
<div id="container">
    <!-- ------------------------------------------partie CV -->
    <div id="containerCV">
        <!-- bouton pour envoyer en excel -->

        <div onclick="selectionToExcel()" class="selectionToExcelBtn">selection to excel</div>

        <script>
            // --------------------------------------------function
            function testClass(element) {

                if (element.classList.contains("selected")) { //enleve la class selected de la selection []
                    element.classList.remove("selected")
                    var push = element.classList[1].match(/\d+/g)[0]

                    for (let a = 0; selection.length > a; a++) {
                        if (selection[a] == push) {
                            selection.splice(a, 1)
                        }
                    }

                } else { //ajoute la class selected et recupere l'id du cv pour le mettre dans la selection []
                    var push = element.classList[1].match(/\d+/g)[0]
                    element.classList.add("selected")
                    selection.push(push)

                }
                console.log(selection)

            }
            // ----------------------------------------------------fonction d'envoi de download en csv------------------------------------


            // transformation de la selection en multidimensionnal array [[...][...]]
            function selectionToExcel() {

                selection.forEach(function(elem, e) {
                    // boucle pour rechercher les info contact
                    for (let i = 0; i < requete.length; i++) {
                        if (requete[i][0] == elem) {

                            push = Object.keys(requete[i]).map((k) => requete[i][k])
                            selection2d.push(push.splice(0, 7))
                            break
                        }
                    }

                });
                console.log(selection2d)
                // console.log(requete)
                // csv------

                let csvContent = "data:text/csv;charset=utf-8,";

                selection2d.forEach(function(rowArray) {
                    console.log(rowArray)
                    let row = rowArray.join(";");
                    csvContent += row + "\r\n";
                });

                // --------------CSV content a telecharger (à faire)
                console.log(csvContent)
                // ---------

                selection2d = []
                selection = []
            }

            let containerCV = document.getElementById('containerCV');

            for (y = 0; y < Object.keys(requete).length; y++) {
                containerCV.innerHTML += "<div value='1' onclick='testClass(this)' class='cv cv" + requete[y]['id'] + "'>" + requete[y]['id'] + requete[y]['nom'] + " " + requete[y]['prenom'] + " :" + requete[y]['intro'] + "</div>"


            }
        </script>
    </div>
    <!-- ------------------------------------------partie selection -->



    <object data='http://localhost/projCV/wordpress/wp-content/themes/write_cv/inc/cv/pdf-exemple.pdf' type="application/pdf" width="2500">
    </object>
    <?php echo  GET_THEME_FILE_URI() . "/inc/cv/pdf-exemple.pdf" ?>

</div>
<?php
echo "<pre>";
print_r($requete);
echo "</pre>";
?>
</section>

<?php get_footer(); ?>