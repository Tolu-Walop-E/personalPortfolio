<?php
session_start();
if (!$_SESSION["loggedIn"]){
    header("Location: login.php");
    die; 
    }
else{
    header("Location: education.html");

}

?>