<?php

    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "cvtheque";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");

    if(!$conn){
        die('Could not Connect MySql Server');
    }
 
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
 
 
    if(mysqli_query($conn, "INSERT INTO cv (nom) VALUES('" . $name . "')")) {
     echo '1';
    } else {
       echo "Error: " . $sql . "" . mysqli_error($conn);
    }
 
    mysqli_close($conn);
 
?>