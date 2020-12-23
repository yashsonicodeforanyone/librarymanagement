<?php


include "include/header.php";
include "include/dbh.php";

if(isset($_GET['taken'])){

$token=$_GET['taken'];
if(isset($_POST['resetpass']))
{
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    if($pass===$cpass){
        $pass=password_hash($pass,PASSWORD_BCRYPT);
        $cpass=$pass;
        $sql="UPDATE form SET password='$pass',cpassword='$cpass' WHERE token='$token'";
        $res=mysqli_query($conn,$sql);
        if($res){
            $_SESSION['message']="<div class='chip red yellow-text'>password change successful</div>";
            header("Location:signinform.php");
        }
    }else{
        ?>
<script>alert("conform password is not match")</script>
        <?php
    }

}
}
else{
if(isset($_GET['token'])){
$token=$_GET['token'];

if(isset($_SESSION['last_time'])){

if((time()-$_SESSION['last_time'])>180){
    $_SESSION['message']="your have loss time";
    header("Location:adminsignin.php");
}else{


    ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?taken=<?php echo $token ?>" method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="input-field col l6 m6 s6 offset-l3 offset-m3 offset-s3">
        <input type="password" name="pass" id="em">
        <label for="em">enter password</label>
        
</div>
</div>

<div class="row">
    <div class="input-field col l6 m6 s6 offset-l3 offset-m3 offset-s3">
        <input type="password" name="cpass" id="tele">
        <label for="tele">conform password</label>


    </div>
    </div>

    

<div class="col l6 m6 s6 offset-l3 offset-m3 offset-s3" style="text-align: center;">
    <input type="submit" value="Password reset" name="resetpass" style="padding:10px 25px; border-radius:20px; background-image:linear-gradient(to right,blue,yellow,pink); font-size:large; font-weight:300; color:teal;">
    


    </div>
    
</form>

<?php
}

}
}
}
include "include/footer.php";
?>