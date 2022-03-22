<?php
/*
Template Name: Admin Accueil

*/
wp_head();
get_header();
$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');
// ---------------------------------requete

$requete = $db->prepare("SELECT cv.id,user_infos.user_name,user_infos.user_firstname,user_infos.user_email,user_infos.user_tel,cv.lien FROM `cv` INNER JOIN user ON cv.id_user = user.id INNER JOIN `user_infos` ON cv.id_user=user_infos.id_user;");
$requete->execute();
$requete = $requete->fetchall();

?>

<head>
    <style>

    </style>
</head>
<script>
    let selection2d = []
    let selection = []
    var requete =
        <?php echo json_encode($requete); ?>;
    // console.log(requete)
</script>
<!-- --------------------------- -->

<h1>Admin Accueil</h1>
<div id="containerAdmin">
    <!-- ------------------------------------------partie CV -->
    <div id="containerCVAdmin">
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
                // console.log(selection)

            }
            // ----------------------------------------------------fonction show

            function show(element) {
                let pdfShow = document.getElementById('pdfShow');
                // alert(element.classList[1].match(/\d+/g)[0])    
                requete.forEach(function(elem, e) {
                    // console.log("foreach")
                    if (elem[0] == (element.classList[1].match(/\d+/g)[0])) {
                        // alert(elem[7])
                        pdfShow.innerHTML = "<object data=" + elem[5] + "type='application/pdf' width='2500' height='600' zoom='50'> </object>"
                    }
                });
            }
            // http://localhost/projCV/wordpress/wp-content/themes/write_cv/inc/cv/pdf-exemple.pdf'
            // ----------------------------------------------------function sendMail------------------------------------
            function sendMail(element) {
                console.log(element.classList[0].slice(2))

                console.log("mail")
                console.log("mail")
                console.log("mail")
                sessionStorage.setItem("email", element.classList[0].slice(2));
                window.location.replace("http://localhost/projCV/wordpress/wp-content/themes/write_cv/assets/Formulaire%20contact/")
            }
            // ----------------------------------------------------fonction d'envoi de download en csv------------------------------------


            // transformation de la selection en multidimensionnal array [[...][...]]
            function selectionToExcel() {

                selection.forEach(function(elem, e) {
                    // boucle pour rechercher les info contact
                    for (let i = 0; i < requete.length; i++) {
                        if (requete[i][0] == elem) {

                            push = Object.keys(requete[i]).map((k) => requete[i][k])
                            selection2d.push(push.splice(0, 5))
                            console.log("excel" + selection2d)
                            break
                        }
                    }

                });
                //create CSV file data in an array  
                var csvFileData = selection2d
                console.log("selec")
                console.log(selection2d)
                console.log("csvfile")
                console.log(csvFileData)
                // console.log(requete)
                // csv------

                //headers
                var csv = 'id; nom; prenom; mail; tel\n';

                //merge the data with CSV  
                csvFileData.forEach(function(row) {
                    csv += row.join(';');
                    csv += "\n";
                });

                //display the created CSV data on the web browser   
                // document.write(csv);  

                var hiddenElement = document.createElement('a');
                hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                hiddenElement.target = '_blank';

                //provide the name for the CSV file to be downloaded  
                hiddenElement.download = 'cv.csv';
                hiddenElement.click();


                // let csvContent = "data:text/csv;charset=utf-8,";

                // selection2d.forEach(function(rowArray) {
                //     // console.log(rowArray)
                //     let row = rowArray.join(";");
                //     csvContent += row + "\r\n";
                // });

                // --------------CSV content a telecharger (à faire)
                // console.log(csvContent)
                // ---------

                selection2d = []
                selection = []
            }

            let containerCV = document.getElementById('containerCVAdmin');

            for (y = 0; y < Object.keys(requete).length; y++) {
                containerCV.innerHTML += "<div class=cvBloc><div onclick='testClass(this)' class='cvAdmin cv" + requete[y]['id'] + "'>" + requete[y]['id'] + requete[y]['user_firstname'] + " " + requete[y]['user_name'] + "</div> <div onclick='show(this)' class='boutonShow show" + requete[y]['id'] + "'>Voir le cv</div><div onclick='sendMail(this)' class='cv" + requete[y]['user_email'] + "'> envoyer un message</div></div >"


            }
        </script>
    </div>
    <!-- ------------------------------------------partie selection -->


    <div id='pdfShow'></div>
</div>
<?php
// echo "<pre>";
// print_r($requete);
// echo "</pre>";
?>
</section>

<?
/*test test */
?>

<?php get_footer(); ?>