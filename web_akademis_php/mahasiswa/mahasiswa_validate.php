<?php
    session_start();
    $NIM = $_POST['nim'];
    $PASSWORD = $_POST['password'];

    include "../config/db_connection.php";
    $query = "SELECT * FROM mahasiswa WHERE NIM='$NIM' AND Password='$PASSWORD'";

    $res = $conn->query($query);

    if($row = $res->fetch_row()){
        echo $row[1];

        $_SESSION['logged-in'] = true;
        $_SESSION['nim'] = $row[0];
        $_SESSION['username'] = $row[1];
        header('Location: home_page.php?page=dashboard');
    }
    else{
        $_SESSION['salah'] = ['salah'];
        header('Location: index.php');
    }
?>