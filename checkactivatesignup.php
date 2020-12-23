<?php
include "C:\\xamppp\\htdocs\\library\\include\\dbh.php";

if(isset($_GET['token'])){
    $token=$_GET['token'];
    // echo "$token";


    $updatequer=" UPDATE form SET status='active' WHERE token='$token'";
    $res=mysqli_query($conn,$updatequer);
    if($res){
        
      
        header("Location:message.php?gots=");

        



    }



}

?>
