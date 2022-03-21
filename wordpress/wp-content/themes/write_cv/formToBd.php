<?php
    include('fonctions.php');
    session_start();

    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "cvtheque";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");

    if(!$conn){
        die('Could not Connect MySql Server');
    }

    $name = '';
    $firstname = '';
    $address = '';
    $email = '';
    $phone = '';
    $about = '';
    $career = '';
    $education = '';
    $job1__start = '';
    $job2__start = '';
    $job3__start = '';
    $job1__end = '';
    $job2__end = '';
    $job3__end = '';
    $job1__details = '';
    $job2__details = '';
    $job3__details = '';
    $nb_jobs = 0;
    $references = '';
    
    date_default_timezone_set('Europe/Paris');
    $myDateString = date('d/m/Y H:i:s');
    $date = DateTime::createFromFormat('d/m/Y H:i:s', $myDateString);
    $creationDate = $date->format('Y-m-d H:i:s');     
    
    if (!empty($_POST['name'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
    }
    if (!empty($_POST['firstname'])) {
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    }
    if (!empty($_POST['address'])) {
        $address = mysqli_real_escape_string($conn, $_POST['address']);
    }   
    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }
    if (!empty($_POST['about'])) {
        $about = mysqli_real_escape_string($conn, $_POST['about']);
    }
    if (!empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    }
    if (!empty($_POST['career'])) {
        $career = mysqli_real_escape_string($conn, $_POST['career']);
    }
    if (!empty($_POST['education'])) {
        $education = mysqli_real_escape_string($conn, $_POST['education']);
    }
    if (!empty($_POST['job1__start'])) {
        $job1__start = mysqli_real_escape_string($conn, $_POST['job1__start']);
        // debug($job1__start);
        // $myDateString = $job1__start;
        // debug($myDateString);
        // $date = DateTime::createFromFormat('Y-m-d', $myDateString);
        // debug($date);
        // $job1__start = $date->format('Y-m-d');
        // debug($job1__start);
    }
    if (!empty($_POST['job2__start'])) {
        $job2__start = mysqli_real_escape_string($conn, $_POST['job2__start']);
    }
    if (!empty($_POST['job3__start'])) {
        $job3__start = mysqli_real_escape_string($conn, $_POST['job3__start']);
    }
    if (!empty($_POST['job1__end'])) {
        $job1__end = mysqli_real_escape_string($conn, $_POST['job1__end']);
    }
    if (!empty($_POST['job2__end'])) {
        $job2__end = mysqli_real_escape_string($conn, $_POST['job2__end']);
    }
    if (!empty($_POST['job3__end'])) {
        $job3__end = mysqli_real_escape_string($conn, $_POST['job3__end']);
    }
    if (!empty($_POST['job1__details'])) {
        $job1__details = mysqli_real_escape_string($conn, $_POST['job1__details']);
    }
    if (!empty($_POST['job2__details'])) {
        $job2__details = mysqli_real_escape_string($conn, $_POST['job2__details']);
    }
    if (!empty($_POST['job3__details'])) {
        $job3__details = mysqli_real_escape_string($conn, $_POST['job3__details']);
    }
    if (!empty($_POST['references'])) {
        $references = mysqli_real_escape_string($conn, $_POST['references']);
    }

    if (!empty($_POST['job1__start']) && !empty($_POST['job1__end'])) {
        $nb_jobs++;
    }

    if (!empty($_POST['job2__start']) && !empty($_POST['job2__end'])) {
        $nb_jobs++;
    }

    if (!empty($_POST['job3__start']) && !empty($_POST['job3__end'])) {
        $nb_jobs++;
    }

    if (
           (mysqli_query($conn, "INSERT INTO cv (id_user, nom, prenom, intro, objectifs, education, date) VALUES ($_SESSION[id], '" . $name . "', '" . $firstname . "', '" . $about . "', '" . $career . "', '" . $education . "', '" . $creationDate . "')"))
        && (mysqli_query($conn, "INSERT INTO user (user_name, user_surname, adresse, user_email, user_tel) VALUES ('" . $name . "', '" . $firstname . "', '" . $address . "', '" . $email . "', '" . $phone . "')"))
        ) {
    } else {
       echo "Error: " . $sql . "" . mysqli_error($conn);
    }

    if ($nb_jobs == 1) {
        if ((mysqli_query($conn, "INSERT INTO experience (id_user, debut, fin, info) VALUES ($_SESSION[id], '" . $job1__start . "', '" . $job1__end . "', '" . $job1__details . "')"))) {
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
    }

    if ($nb_jobs == 2) {
        if (
               (mysqli_query($conn, "INSERT INTO experience (id_user, debut, fin, info) VALUES ($_SESSION[id], '" . $job1__start . "', '" . $job1__end . "', '" . $job1__details . "')"))
            && (mysqli_query($conn, "INSERT INTO experience (id_user, debut, fin, info) VALUES ($_SESSION[id], '" . $job2__start . "', '" . $job2__end . "', '" . $job2__details . "')"))
        ) {
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
    }

    if ($nb_jobs == 3) {
        if (
               (mysqli_query($conn, "INSERT INTO experience (id_user, debut, fin, info) VALUES ($_SESSION[id], '" . $job1__start . "', '" . $job1__end . "', '" . $job1__details . "')"))
            && (mysqli_query($conn, "INSERT INTO experience (id_user, debut, fin, info) VALUES ($_SESSION[id], '" . $job2__start . "', '" . $job2__end . "', '" . $job2__details . "')"))
            && (mysqli_query($conn, "INSERT INTO experience (id_user, debut, fin, info) VALUES ($_SESSION[id], '" . $job3__start . "', '" . $job3__end . "', '" . $job3__details . "')"))
        ) {
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }
    }
 
    mysqli_close($conn);
 
?>