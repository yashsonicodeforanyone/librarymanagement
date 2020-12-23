<?php
include "include/header.php";

if(isset($_GET['gots'])){
    
    $_SESSION['message'] = "<div class='chip green black-text'>please signin easily</div>";
    
    header("Location:signinform.php");
    

}else{








if(isset($_GET['gitu'])){
    
    $_SESSION['message']="<div class='chip green black-text'>register success wait for verification</div>"; 
    header("Location:adminsignin.php");
    
}else{



if($_SESSION['name']){



if(isset($_GET['id'])){
    $id=$_GET['id'];
    $_SESSION['message']="<div class='chip yellow' >Book is add now</div>";
    header("Location:index.php?id=$id");

}









}else{




if(isset($_GET['di'])){
    $_SESSION['message']="<div class='chip green black-text'>plese check your internet connetion</div>";
    header("Location:signinform.php");

}
else{




if(isset($_GET['dik'])){
    $_SESSION['message']="<div class='chip green black-text'>plese check your internet connetion</div>";
    header("Location:adminsignin.php");

}else{




if(isset($_GET['dikes'])){
    $_SESSION['message']="<div class='chip green black-text'>please check your email</div>";
    header("Location:adminsignin.php");

}
}
}
}
}

}



?>