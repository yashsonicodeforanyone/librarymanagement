<?php
include "include/header.php";
if(isset($_GET['id'])){

    session_unset();
    $_SESSION['message']="<div class='chip red yellow-text'>You have successful logout</div>";
    header("Location:signinform.php");




}
?>