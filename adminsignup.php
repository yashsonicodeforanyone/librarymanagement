<?php
include "include/header.php";
include "include/dbh.php";

if(isset($_POST['sign'])){

$pass=$_POST['pass'];
$pass=mysqli_real_escape_string($conn,$pass);
$pass=htmlentities($pass);


$cpass=$_POST['cpass'];
$cpass=mysqli_real_escape_string($conn,$cpass);
$cpass=htmlentities($cpass);
    

if($pass==$cpass){

    $email=$_POST['email'];
$email=mysqli_real_escape_string($conn,$email);
$email=htmlentities($email);





$sql2="SELECT * FROM `admin` WHERE email='$email'";
$res2=mysqli_query($conn,$sql2);
$noofrow=mysqli_num_rows($res2);
if($noofrow<1){
    
    
    
    
    $fname=$_POST['fname'];
    $fname=mysqli_real_escape_string($conn,$fname);
    $fname=htmlentities($fname);
    
    $lname=$_POST['lname'];
    $lname=mysqli_real_escape_string($conn,$lname);
    $lname=htmlentities($lname);
    
    
    $name=$fname." ".$lname ;
    
    $libname=$_POST['libname'];
    $libname=mysqli_real_escape_string($conn,$libname);
    $libname=htmlentities($libname);
    
    
    $telephone=$_POST['telephone'];
    $telephone=mysqli_real_escape_string($conn,$telephone);
    $telephone=htmlentities($telephone);
    



    $sql4="SELECT * FROM `admin` WHERE mobile='$telephone'";
    $res3=mysqli_query($conn,$sql4);
    $noofrowss=mysqli_num_rows($res3);
    if($noofrowss<1){

    
    




$addr=$_POST['addr'];
$addr=mysqli_real_escape_string($conn,$addr);
$addr=htmlentities($addr);



$gender=$_POST['gender'];
$gender=mysqli_real_escape_string($conn,$gender);
$gender=htmlentities($gender);


$token=bin2hex(random_bytes(15));


    require 'mailfolder/PHPMailerAutoload.php';
    $mail = new PHPMailer();
   // $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port     = 587;  
    $mail->Username = "Enter your gmail";
    $mail->Password = "Enter gmail password";
    $mail->Host     = "smtp.gmail.com";
    $mail->Mailer   = "smtp";
    $mail->SetFrom("enter gmail", "yash soni");
    $mail->AddReplyTo("enter gmail");
    $mail->AddAddress("enter gmail);      #this email to verify collage chairmen to activate her library 
    $mail->Subject =  "Please verify for library professor";
    $mail->WordWrap   = 80;
    $content = "hi ,$name click here to activate for library account
    http://localhost/library/adminsignupcheck.php?token=$token"  ; $mail->MsgHTML($content);
    $mail->IsHTML(true);
    if(!$mail->Send()) {
      $_SESSION['message']="<div class='chip green black-text'>plese check your internet connetion</div>";
      
      
    }
    else{
        $password=password_hash($pass,PASSWORD_BCRYPT);
        $cpassword=$password;
        // echo $password;
    

        $sql="INSERT INTO admin(`token`, `status`, `name`, `email`, `mobile`, `libraryname`, `address`, `gender`, `password`, `cpassword`) VALUES ('$token','unactive','$name','$email','$telephone','$libname','$addr','$gender','$password','$cpassword')";
        $res=mysqli_query($conn,$sql);
        if($res){
        
          
            header("location:message.php?gitu");  
        }
    }


}else{
    $_SESSION['message']="<div class='chip green black-text'>phone number is already register chage phone number</div>";

}

}

else{
    $_SESSION['message']="<div class='chip green black-text'>email is already register</div>";
    
}
}else{
    
    $_SESSION['message']="<div class='chip green black-text'>conform password is not match</div>";
    }
}

















?>


<body class="backs">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
<h2>Signup to Admin</h2>
<?php
if(isset($_SESSION['message']))   #this is check a seesion message create or not
{
echo $_SESSION['message']; # this  is print a session mssage joo signup.php me hai
unset( $_SESSION['message']);  #this is unset a seesion of message 
}

?>



<div class="row">
<div class="col l6 m8 s10 offset-l3 offset-m2 offset-s1" style="border: 1px solid black;">



<div class="row">
<div class="input-field col l6 m6 s6">
    <input type="text" name="fname" id="name" required>
    <label for="name">Enter first name</label>





</div>

<div class="input-field col l6 m6 s6">
<input type="text" name="lname" id="lname" required>
<label for="lname">Enter last name</label>
</div>
</div>


  
<div class="input-field col l12 m12 s12">
<input type="email" name="email" id="em" required>
<label for="em">Enter email</label>

</div>


<div class="row">
<div class="input-field col l6 m6 s6">
<input type="tel" name="telephone" id="tele" required>
<label for="tele">Enter mobile number</label>
</div>

<div class="input-field col l6 m6 s6">
<input type="tel" name="libname" id="tele" required>
<label for="tele">Enter library name</label>
</div></div>


<div class="row">
    <div class="input-field col l6">
        <input type="text" name="addr" id="addr" required>
        <label for="addr">Enter addreess</label>
</div>
<div class="col l6">
    <p> Select gender
  <input name="gender" value="male"  type="radio" id="test1" required />
  <label for="test1" >Male</label>

  <input name="gender" value="female" type="radio" id="test2" required />
  <label for="test2">Female</label>
  </p>
  </div>
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
    



<!-- 
<div class="row">
<div class="col l12 m12 s12">
<p>upload Library card
<input type="file" name="f12" id="" value="Select file">
    </p>
    </div>
</div> -->







<div class="col l6 offset-l3" style="text-align:center">
    <input type="submit" name="sign" value="Submit"  style="padding: 10px 30px;">
</div>
<br>
<br>



<p>have you alreagy register?<a href="adminsignin.php">Admin Sign in</a><br>
have you Student register?<a href="signinform.php">Student login</a></p>

















</div>



</div>




</form>
<br>







<?php
include "include/footer.php";
?>



