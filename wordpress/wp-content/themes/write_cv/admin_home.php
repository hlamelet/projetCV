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

        .containerSelection {
            width: 49.5%;
            height: 1000px;
            background-color: red;
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
</script>
<!-- --------------------------- -->

$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');

wp_head();

<h1>Admin Accueil</h1>
<div id="container">
    <!-- ------------------------------------------partie CV -->
    <div id="containerCV">
        <div onclick="selectionToExcel()" class="selectionToExcelBtn"></div>
        <script>
            // --------------------------------------------function
            function testClass(element) {

                if (element.classList.contains("selected")) {
                    element.classList.remove("selected")
                    var push = element.classList[1].match(/\d+/g)[0]
                    // console.log(element.classList[1].match(/\d+/g)[0])
                    for (let a = 0; selection.length > a; a++) {
                        if (selection[a] == push) {
                            selection.splice(a, 1)
                        }
                    }

                } else {
                    var push = element.classList[1].match(/\d+/g)[0]
                    // console.log(element.classList[1].match(/\d+/g)[0])
                    element.classList.add("selected")
                    selection.push(push)

                }
                console.log(selection)

            }

            function selectionToExcel() {
                console.log(selection)
                selection.forEach(function(element, e) {
                    // console.log(selection2d)
                    let idCV = [element]
                    selection2d.push(idCV)
                    // console.log(selection2d)
                });
                selection2d.forEach(function(element, e) {


                });
                console.log(selection2d)
                selection2d = []
            }

            let containerCV = document.getElementById('containerCV');

            for (y = 0; y < Object.keys(requete).length; y++) {
                containerCV.innerHTML += "<div value='1' onclick='testClass(this)' class='cv cv" + requete[y]['id_user'] + "'>" + requete[y]['id'] + requete[y]['nom'] + " " + requete[y]['prenom'] + " :" + requete[y]['intro'] + "</div>"


            }
        </script>
    </div>
    <!-- ------------------------------------------partie selection -->

    <div class="containerSelection">

    </div>
</div>
<?php
echo "<pre>";
print_r($requete);
echo "</pre>";
?>
</section>

<?php get_footer(); ?>