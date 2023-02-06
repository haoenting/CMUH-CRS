<?php
    $server_name = 'localhost';
    $username = 'root';
    $password = '12345678';
    $db_name = 'cmuh crs cancer database';

    $link = mysqli_connect($server_name, $username, $password, $db_name);
    if(!$link){
      header("Location: wrong.html");
    }

    $link->query('SET NAMES UTF8'); 
    $link->query('SET time_zone = "+8:00"'); 
?>