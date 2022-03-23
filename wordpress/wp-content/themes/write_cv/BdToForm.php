<?php

// Le but de ce script est de générer un json sous la forme d'un tableau sous la forme
// champ du formulaire => valeur

include('fonctions.php');
session_start();

if (!empty($_POST['date_choice'])) {
    $date_choice = $_POST['date_choice'];
}

$db = new PDO('mysql:host=localhost;dbname=cvtheque;charset=utf8', 'root', '');

if (!$db) {
    die('Could not Connect MySql Server');
}

$name = '';
$firstname = '';
$address = '';
$email = '';
$phone = '';
$about = '';
$career = '';
$creationDate = '';
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


// Compter le nombre de jobs entrés en BDD
$requete = $db->prepare(
    "SELECT brouillon_experience.id 
     FROM brouillon_experience 
     INNER JOIN user ON brouillon_experience.id_user = user.id 
     WHERE brouillon_experience.date = '$date_choice'
    ;"
);
$requete->execute();
$requete_result = $requete->fetchall(PDO::FETCH_ASSOC);
foreach ($requete_result as $result) {
    $nb_jobs++;
}

// Requêtes

if ($nb_jobs == 1) {

    $requete = $db->prepare(
        "SELECT                     brouillon_cv.intro,
                                    brouillon_cv.objectifs,
                                    brouillon_cv.education,
                                    brouillon_experience.debut,
                                    brouillon_experience.fin,
                                    brouillon_experience.info,
                                    brouillon_user.user_name,
                                    brouillon_user.user_firstname,
                                    brouillon_user.user_email,
                                    brouillon_user.user_tel,
                                    brouillon_user.user_adresse,
                                    brouillon_cv.id_user,
                                    brouillon_experience.id_user,
                                    brouillon_user.id_user,
                                    user.id, 
                                    brouillon_cv.date, 
                                    brouillon_user.date,
                                    brouillon_experience.date
    
                FROM       brouillon_cv 
                INNER JOIN user                 ON brouillon_cv.id_user         = user.id
                INNER JOIN brouillon_experience ON brouillon_experience.id_user = user.id
                INNER JOIN brouillon_user       ON brouillon_user.id_user       = user.id
                WHERE brouillon_cv.date = '$date_choice'
                AND brouillon_user.date = '$date_choice'
                AND brouillon_experience.date = '$date_choice'
        ;"
    );

    $requete->execute();
    $requete_result = $requete->fetchall(PDO::FETCH_ASSOC);

    if (!empty($requete_result)) {

        $data_final = array_fill_keys(array_keys($requete_result[0]), '');

        if (!empty($requete_result[0]['intro'])) {
            $data_final['intro'] = $requete_result[0]['intro'];
        }
        if (!empty($requete_result[0]['objectifs'])) {
            $data_final['objectifs'] = $requete_result[0]['objectifs'];
        }
        if (!empty($requete_result[0]['education'])) {
            $data_final['education'] = $requete_result[0]['education'];
        }
        if (!empty($requete_result[0]['user_name'])) {
            $data_final['user_name'] = $requete_result[0]['user_name'];
        }
        if (!empty($requete_result[0]['user_firstname'])) {
            $data_final['user_firstname'] = $requete_result[0]['user_firstname'];
        }
        if (!empty($requete_result[0]['user_email'])) {
            $data_final['user_email'] = $requete_result[0]['user_email'];
        }
        if (!empty($requete_result[0]['user_tel'])) {
            $data_final['user_tel'] = $requete_result[0]['user_tel'];
        }
        if (!empty($requete_result[0]['user_adresse'])) {
            $data_final['user_adresse'] = $requete_result[0]['user_adresse'];
        }
        if (!empty($requete_result[0]['debut'])) {
            $data_final['debut'] = $requete_result[0]['debut'];
        }
        if (!empty($requete_result[0]['fin'])) {
            $data_final['fin'] = $requete_result[0]['fin'];
        }
        if (!empty($requete_result[0]['info'])) {
            $data_final['info'] = $requete_result[0]['info'];
        }
    }
    unset($data_final['id']);
    unset($data_final['id_user']);
    print(json_encode($data_final));
}

if ($nb_jobs == 0) {
    $requete = $db->prepare(
        "SELECT                     brouillon_cv.intro,
                                    brouillon_cv.objectifs,
                                    brouillon_cv.education,
                                    brouillon_user.user_name,
                                    brouillon_user.user_firstname,
                                    brouillon_user.user_email,
                                    brouillon_user.user_tel,
                                    brouillon_user.user_adresse,
                                    brouillon_cv.id_user,
                                    brouillon_user.id_user,
                                    user.id,
                                    brouillon_cv.date, 
                                    brouillon_user.date
    
                FROM       brouillon_cv 
                INNER JOIN user                 ON brouillon_cv.id_user         = user.id
                INNER JOIN brouillon_user       ON brouillon_user.id_user       = user.id
                WHERE brouillon_cv.date = '$date_choice'
                AND brouillon_user.date = '$date_choice'
        ;"
    );

    $requete->execute();
    $requete_result = $requete->fetchall(PDO::FETCH_ASSOC);

    if (!empty($requete_result)) {

        $data_final = array_fill_keys(array_keys($requete_result[0]), '');

        if (!empty($requete_result[0]['intro'])) {
            $data_final['intro'] = $requete_result[0]['intro'];
        }
        if (!empty($requete_result[0]['objectifs'])) {
            $data_final['objectifs'] = $requete_result[0]['objectifs'];
        }
        if (!empty($requete_result[0]['education'])) {
            $data_final['education'] = $requete_result[0]['education'];
        }
        if (!empty($requete_result[0]['user_name'])) {
            $data_final['user_name'] = $requete_result[0]['user_name'];
        }
        if (!empty($requete_result[0]['user_firstname'])) {
            $data_final['user_firstname'] = $requete_result[0]['user_firstname'];
        }
        if (!empty($requete_result[0]['user_email'])) {
            $data_final['user_email'] = $requete_result[0]['user_email'];
        }
        if (!empty($requete_result[0]['user_tel'])) {
            $data_final['user_tel'] = $requete_result[0]['user_tel'];
        }
        if (!empty($requete_result[0]['user_adresse'])) {
            $data_final['user_adresse'] = $requete_result[0]['user_adresse'];
        }
    }
    unset($data_final['id']);
    unset($data_final['id_user']);
    print(json_encode($data_final));
}

if ($nb_jobs == 2) {
    $requete = $db->prepare(
        "SELECT                     brouillon_cv.intro,
                                    brouillon_cv.objectifs,
                                    brouillon_cv.education,
                                    brouillon_experience.debut,
                                    brouillon_experience.fin,
                                    brouillon_experience.info,
                                    brouillon_user.user_name,
                                    brouillon_user.user_firstname,
                                    brouillon_user.user_email,
                                    brouillon_user.user_tel,
                                    brouillon_user.user_adresse,
                                    brouillon_cv.id_user,
                                    brouillon_user.id_user,
                                    user.id, 
                                    brouillon_cv.date, 
                                    brouillon_user.date, 
                                    brouillon_experience.date
    
                FROM       brouillon_cv 
                INNER JOIN user                 ON brouillon_cv.id_user         = user.id
                INNER JOIN brouillon_experience ON brouillon_experience.id_user = user.id
                INNER JOIN brouillon_user       ON brouillon_user.id_user       = user.id
                WHERE brouillon_cv.date = '$date_choice'
                AND brouillon_user.date = '$date_choice'
                AND brouillon_experience.date = '$date_choice'
        ;"
    );

    $requete->execute();
    $requete_result = $requete->fetchall(PDO::FETCH_ASSOC);

    if (!empty($requete_result)) {

        $data_final = array_fill_keys(array_keys($requete_result[0]), '');

        if (!empty($requete_result[0]['intro'])) {
            $data_final['intro'] = $requete_result[0]['intro'];
        }
        if (!empty($requete_result[0]['objectifs'])) {
            $data_final['objectifs'] = $requete_result[0]['objectifs'];
        }
        if (!empty($requete_result[0]['education'])) {
            $data_final['education'] = $requete_result[0]['education'];
        }
        if (!empty($requete_result[0]['user_name'])) {
            $data_final['user_name'] = $requete_result[0]['user_name'];
        }
        if (!empty($requete_result[0]['user_firstname'])) {
            $data_final['user_firstname'] = $requete_result[0]['user_firstname'];
        }
        if (!empty($requete_result[0]['user_email'])) {
            $data_final['user_email'] = $requete_result[0]['user_email'];
        }
        if (!empty($requete_result[0]['user_tel'])) {
            $data_final['user_tel'] = $requete_result[0]['user_tel'];
        }
        if (!empty($requete_result[0]['user_adresse'])) {
            $data_final['user_adresse'] = $requete_result[0]['user_adresse'];
        }
        if (!empty($requete_result[0]['debut'])) {
            $data_final['debut'] = $requete_result[0]['debut'];
        }
        if (!empty($requete_result[0]['fin'])) {
            $data_final['fin'] = $requete_result[0]['fin'];
        }
        if (!empty($requete_result[0]['info'])) {
            $data_final['info'] = $requete_result[0]['info'];
        }
        if (!empty($requete_result[1]['debut'])) {
            $newKey_start = 'debut_2';
            $data_final[$newKey_start] = $requete_result[1]['debut'];
        }
        if (!empty($requete_result[1]['fin'])) {
            $newKey_end = 'fin_2';
            $data_final[$newKey_end] = $requete_result[1]['fin'];
        }
        if (!empty($requete_result[1]['info'])) {
            $newKey_info = 'info_2';
            $data_final[$newKey_info] = $requete_result[1]['info'];
        }
    }
    unset($data_final['id']);
    unset($data_final['id_user']);
    print(json_encode($data_final));
}

if ($nb_jobs == 3) {
    $requete = $db->prepare(
        "SELECT                     brouillon_cv.intro,
                                    brouillon_cv.objectifs,
                                    brouillon_cv.education,
                                    brouillon_experience.debut,
                                    brouillon_experience.fin,
                                    brouillon_experience.info,
                                    brouillon_user.user_name,
                                    brouillon_user.user_firstname,
                                    brouillon_user.user_email,
                                    brouillon_user.user_tel,
                                    brouillon_user.user_adresse,
                                    brouillon_cv.id_user,
                                    brouillon_user.id_user,
                                    user.id, 
                                    brouillon_user.date, 
                                    brouillon_cv.date,
                                    brouillon_experience.date
                
                FROM       brouillon_cv 
                INNER JOIN user                 ON brouillon_cv.id_user         = user.id
                INNER JOIN brouillon_experience ON brouillon_experience.id_user = user.id
                INNER JOIN brouillon_user       ON brouillon_user.id_user       = user.id
                WHERE brouillon_cv.date = '$date_choice'
                AND brouillon_user.date = '$date_choice'
                AND brouillon_experience.date = '$date_choice'
        ;"
    );

    $requete->execute();
    $requete_result = $requete->fetchall(PDO::FETCH_ASSOC);

    if (!empty($requete_result)) {

        $data_final = array_fill_keys(array_keys($requete_result[0]), '');

        if (!empty($requete_result[0]['intro'])) {
            $data_final['intro'] = $requete_result[0]['intro'];
        }
        if (!empty($requete_result[0]['objectifs'])) {
            $data_final['objectifs'] = $requete_result[0]['objectifs'];
        }
        if (!empty($requete_result[0]['education'])) {
            $data_final['education'] = $requete_result[0]['education'];
        }
        if (!empty($requete_result[0]['user_name'])) {
            $data_final['user_name'] = $requete_result[0]['user_name'];
        }
        if (!empty($requete_result[0]['user_firstname'])) {
            $data_final['user_firstname'] = $requete_result[0]['user_firstname'];
        }
        if (!empty($requete_result[0]['user_email'])) {
            $data_final['user_email'] = $requete_result[0]['user_email'];
        }
        if (!empty($requete_result[0]['user_tel'])) {
            $data_final['user_tel'] = $requete_result[0]['user_tel'];
        }
        if (!empty($requete_result[0]['user_adresse'])) {
            $data_final['user_adresse'] = $requete_result[0]['user_adresse'];
        }
        if (!empty($requete_result[0]['debut'])) {
            $data_final['debut'] = $requete_result[0]['debut'];
        }
        if (!empty($requete_result[0]['fin'])) {
            $data_final['fin'] = $requete_result[0]['fin'];
        }
        if (!empty($requete_result[0]['info'])) {
            $data_final['info'] = $requete_result[0]['info'];
        }
        if (!empty($requete_result[1]['debut'])) {
            $newKey_start = 'debut_2';
            $data_final[$newKey_start] = $requete_result[1]['debut'];
        }
        if (!empty($requete_result[1]['fin'])) {
            $newKey_end = 'fin_2';
            $data_final[$newKey_end] = $requete_result[1]['fin'];
        }
        if (!empty($requete_result[1]['info'])) {
            $newKey_info = 'info_2';
            $data_final[$newKey_info] = $requete_result[1]['info'];
        }
        if (!empty($requete_result[2]['debut'])) {
            $newKey_start = 'debut_3';
            $data_final[$newKey_start] = $requete_result[1]['debut'];
        }
        if (!empty($requete_result[2]['fin'])) {
            $newKey_end = 'fin_3';
            $data_final[$newKey_end] = $requete_result[1]['fin'];
        }
        if (!empty($requete_result[2]['info'])) {
            $newKey_info = 'info_3';
            $data_final[$newKey_info] = $requete_result[1]['info'];
        }
    }
    unset($data_final['id']);
    unset($data_final['id_user']);
    print(json_encode($data_final));
}
