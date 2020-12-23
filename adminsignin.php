<?php


include "include/header.php";
include "include/dbh.php";

if(isset($_POST['sign'])){

$libidnum=$_POST['idlist'];
$libidnum=mysqli_real_escape_string($conn,$libidnum);
$libidnumf=htmlentities($libidnum);

$email=$_POST['email'];
$email=mysqli_real_escape_string($conn,$email);
$email=htmlentities($email);




$pass=$_POST['pass'];
$pass=mysqli_real_escape_string($conn,$pass);
$pass=htmlentities($pass);


$cpass=$_POST['cpass'];
$cpass=mysqli_real_escape_string($conn,$cpass);
$cpass=htmlentities($cpass);

if($pass==$cpass){

$sql="SELECT * FROM admin WHERE email='$email'";
$res=mysqli_query($conn,$sql);
$noofrow=mysqli_num_rows($res);

if($noofrow>0){


if($res){
    $data=mysqli_fetch_assoc($res);
    $emaildata=$data['email'];
    $token=$data['token'];
    $status=$data['status'];

    $passq=$data['password'];
    $libraryid=$data['libraryidnum'];

if($email==$emaildata){



    if($libidnumf==$libraryid){

    if(password_verify($pass,$passq)){

        if($status=='active'){
        $_SESSION['name']=$libraryid;


        header("Location:adminpanel.php?id=$token");
    }else{
        $_SESSION['message']="waiting for activation";
    }
    
}
    
    
    else{
        $_SESSION['mess']="password is wrong";
    }
}else{
    $_SESSION['mess']="library id number is wrong";
    
}
}else{
    
    $_SESSION['mess']="email is not register";
}


}
}
else{
    $_SESSION['mess']="email is not register";
    
    
}

}else{
    
    $_SESSION['mess']="conform password is wrong";
}
}
















?>


<body style="padding-top: 60px;">
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <h2>signin to Admin</h2>
    <?php
if(isset($_SESSION['mess']))   #this is check a seesion message create or not
{
    echo $_SESSION['mess']; # this  is print a session mssage joo signup.php me hai
    unset($_SESSION['mess']);  #this is unset a seesion of message 
}

if(isset($_SESSION['message']))   #this is check a seesion message create or not
{
    echo $_SESSION['message']; # this  is print a session mssage joo signup.php me hai
    unset($_SESSION['message']);  #this is unset a seesion of message 
}

?>



<div class="row">
<div class="col l6 m8 s10 offset-l3 offset-m2 offset-s1" style="border: 1px solid black;">


<div class="row">
<div class="input-field col l12 m12 s12">
    <input type="text" name="idlist" id="libid" required>
    <label for="libid">Enter library id number</label>
</div>

</div>

  
<div class="input-field col l12 m12 s12">
<input type="email" name="email" id="em" required>
<label for="em">Enter email</label>

</div>



<div class="row">
<div class="input-field col l6 m6 s6">
<input type="password" name="pass" id="pass1" required>
<label for="pass1">Enter password</label>
</div>

<div class="input-field col l6 m6 s6">
<input type="password" name="cpass" id="pass2" required>
<label for="pass2">conform password</label>


</div>

</div>
    


<div class="col l6 offset-l3" style="text-align:center">
    <input type="submit" name="sign" value="Submit"  style="padding: 10px 30px;">
</div>
<br>
<br>

<p>have you register?<a href="adminsignup.php">Admin Sign up</a><br>
forget Admin password?<a href="adminforgetpassword.php">forget password</a><br>

Student Sign in?<a href="signinform.php">Student Sign in</a></p>

















</div>



</div>




</form>
<br>




























<?php

include "include/footer.php";


?>