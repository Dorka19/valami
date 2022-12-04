<?php
session_start();
if(isset($_SESSION['felhasznaloID'])){
    session_destroy();
    header('Location: ../Filmimadok.php');
    exit();
}
?>