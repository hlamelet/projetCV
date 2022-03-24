<?php
/*
Template Name: Admin Accueil

*/
session_start();
if (isset($_SESSION["admin"]) && ($_SESSION["admin"] == 1)) {

    $db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');
    // ---------------------------------requete

    $requete = $db->prepare("SELECT                                         
                                cv.id,
                                user_infos.user_name,
                                user_infos.user_firstname,
                                user_infos.user_email,
                                user_infos.user_tel,
                                cv_pdf.file_url,       
                                user_infos.user_adresse
                            FROM cv INNER JOIN user ON cv.id_user = user.id 
                            INNER JOIN user_infos ON cv.id_user = user_infos.id_user
                            INNER JOIN cv_pdf ON cv_pdf.id_user = user.id
                            WHERE user_infos.id_cv = cv.id AND cv_pdf.id_cv = cv.id");
    $requete->execute();
    $requete = $requete->fetchall();

    wp_head();
?>

    <script>
        let selection2d = []
        let selection = []
        var requete =
            <?php echo json_encode($requete); ?>;
        // console.log(requete)
    </script>
    <!-- --------------------------- -->

    <!--Requete dataTable --->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <div id="bloc1admin">

        <div id="logorec"><img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" alt=""></div>

        <div id="titre_re">
            <h3>Espace Recruteur</h3>
        </div>
        <div id="deco" onclick="location.href='localhost/projCV/wordpress/accueil'">
            <p>Deconnexion <br><i class="fi fi-rr-sign-out"></i></p>
        </div>
    </div>

    <div id="containerAdmin">
        <!-- ------------------------------------------partie CV -->
        <div id="div_gauche">
            <div onclick="selectionToExcel()" class="selectionToExcelBtn">
                <p> Export format excel <br> <i class="fi fi-rr-download"></i></p>
            </div>
            <div  class="selectionToExcelBtn" onclick="myFunction()">
                <p> Darkmode <br> <i class="fi fi-rr-bulb"></i></p>
            </div>
        </div>
        <div id="containerCVAdmin">
            <!-- bouton pour envoyer en excel -->



            <script>
                // --------------------------------------------function
                function testClass(element) {

                    if (element.classList.contains("selected")) { //enleve la class selected de la selection []
                        element.classList.remove("selected")
                        var push = element.classList[0].match(/\d+/g)[0]

                        for (let a = 0; selection.length > a; a++) {
                            if (selection[a] == push) {
                                selection.splice(a, 1)
                            }
                        }

                    } else { //ajoute la class selected et recupere l'id du cv pour le mettre dans la selection []
                        var push = element.classList[0].match(/\d+/g)[0]
                        element.classList.add("selected")
                        selection.push(push)

                    }
                    console.log(selection)

                }
                // ----------------------------------------------------fonction show

                function show(element) {
                    console.log("show")
                    let pdfShow = document.getElementById('pdfShow');
                    // alert(element.classList[1].match(/\d+/g)[0])    
                    requete.forEach(function(elem, e) {

                        if (elem[0] == (element.classList[1].match(/\d+/g)[0])) {

                            pdfShow.innerHTML = "<object data='http://localhost/projCV/wordpress/" + elem[5] + "' type='application/pdf' width='2500' height='600' zoom='50'> </object>"
                        }
                    });
                }
                // http://localhost/projCV/wordpress/wp-content/themes/write_cv/inc/cv/pdf-exemple.pdf'
                // ----------------------------------------------------function sendMail------------------------------------
                function sendMail(element) {
                    console.log(element.classList[0].slice(2))

                    sessionStorage.setItem("email", element.classList[1].slice(2));
                    window.location.replace("http://localhost/projCV/wordpress/wp-content/themes/write_cv/assets/Form/")
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
                let table = document.getElementById('table_id')



                // containerCV.innerHTML += "<table id='table_id'>" +
                //         "<thead>" +
                //             "<tr>" +
                //                 "<th> Column 1 </th>" +
                //                 "<th> Column 2 </th>" +
                //                 "<th> Column 2 </th>" +
                //             "</tr>" +
                //         "</thead>" +
                //         "<tbody id='tbody'>" +
                //         "</tbody>" +
                //     "</table>"


                // let tbody = document.getElementById('tbody')
                // for (y = 0; y < Object.keys(requete).length; y++) {
                //     // containerCV.innerHTML += "<div class=cvBloc><div onclick='testClass(this)' class='cvAdmin cv" + requete[y]['id'] + "'>" + requete[y]['id'] + requete[y]['user_firstname'] + " " + requete[y]['user_name'] + "</div> <div onclick='show(this)' class='boutonShow show" + requete[y]['id'] + "'>Voir le cv</div><div onclick='sendMail(this)' class='cv" + requete[y]['user_email'] + "'> envoyer un message</div></div >"
                //     table.tbody += "<tr>" +
                //         "<td>" + requete[y]['user_firstname'] + "</td>" +
                //         // "<td>" + requete[y]['user_name'] + "</td>" +
                //         // "<td>" + requete[y]['id'] + "</td>" +
                //         "</tr>"
                // }
            </script>
            <table id='table_id' class="display">
                <thead>
                    <tr>

                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>E-Mail</th>
                        <th>Téléphone</th>
                        <th>Adresse</th>
                        <th style='width: 10px;'>CV</th>
                        <th style='width: 10px;'>Mail</th>
                        <th style='width: 10px;'>Import Excel</th>
                        <th style='width: 10px;'>Supprimer</th>
                    </tr>
                </thead>
                <tbody id='tbody'>
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable({
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json"
                        }
                    })
                });
                let tbody = document.getElementById('tbody')
                for (y = 0; y < Object.keys(requete).length; y++) {
                    // containerCV.innerHTML += "<div class=cvBloc><div onclick='testClass(this)' class='cvAdmin cv" + requete[y]['id'] + "'>" + requete[y]['id'] + requete[y]['user_firstname'] + " " + requete[y]['user_name'] + "</div> <div onclick='show(this)' class='boutonShow show" + requete[y]['id'] + "'>Voir le cv</div><div onclick='sendMail(this)' class='cv" + requete[y]['user_email'] + "'> envoyer un message</div></div >"
                    tbody.innerHTML += "<tr>" +

                        "<td>" + requete[y]['user_firstname'] + "</td>" +
                        "<td>" + requete[y]['user_name'] + "</td>" +
                        "<td>" + requete[y]['user_email'] + "</td>" +
                        "<td>" + requete[y]['user_tel'].match(/\d+/g) + "</td>" +
                        "<td>" + requete[y]['user_adresse'] + "</td>" +
                        "<td><button style='color: #d1557c; cursor:pointer; background-color: #7ea4a400;' onclick='show(this)' class='boutonShow show" + requete[y]['id'] + "'><i class='fi fi-rr-eye'></i> </td>" +
                        "<td><button style='color: #929bff; cursor:pointer; background-color: #7ea4a400;' onclick='sendMail(this)' class='boutonShow show" + requete[y]['user_email'] + "'><i class='fi fi-rr-envelope'></i></td>" +
                        "<td><button style='border:none; border-radius:50%; padding:5px' onclick='testClass(this)' class='cv" + requete[y]['id'] + "'><i class='fi fi-rr-check'></i>" +
                        "<td ><button style='color: red; cursor:pointer; background-color:#7ea4a400; border:none;' class='delete-cv' id='" + requete[y]['id'] + "'" + "><i class='fi fi-rr-trash'></i></td>" +
                        "</tr>"
                }

                $(".delete-cv").click(function() {
                    let current_id = $(this)[0].attributes[2].nodeValue;
                    $.ajax({
                        type: "POST",
                        url: "/ProjCV/wordpress/wp-content/themes/write_cv/delete_cv.php",
                        data: {
                            current_id: current_id
                        },
                        cache: false,
                        success: function(data) {
                            console.log(data);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        }
                    });
                });
            </script>

        </div>
        <!-- ------------------------------------------partie selection -->


        <div id='pdfShow'></div>
    </div>

    </section>


<?php get_footer();
} else
    header("Location: http://localhost/projCV/wordpress/accueil/"); ?>

<style>
    footer {
        display: none;
    }

    html {
        margin-top: 0px !important;
        background-color: white;
    }
</style>
