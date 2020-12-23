<?php
include "include/header.php";
include "include/dbh.php";




if(isset($_POST['login'])){

   $_SESSION['last_time_here']=time();



        
        

$email=$_POST['email'];
$email=mysqli_real_escape_string($conn,$email);
$email=htmlentities($email);





$sql="SELECT * FROM admin WHERE email='$email'";
$res=mysqli_query($conn,$sql);




if($res){

    $phone=$_POST['phonee'];
    $phone=mysqli_real_escape_string($conn,$phone);
    $phone=htmlentities($phone);
    // echo $phone;
    
    $library=$_POST['libid'];
    $library=mysqli_real_escape_string($conn,$library);
    $library=htmlentities($library);
     
    $data=mysqli_fetch_assoc($res);




     $rollnum=$data['libraryidnum'];
    //  echo $rollnum."=".$library;
     
     
     
     if($rollnum==$library){
        $mobilenum=$data['mobile'];
        // echo $mobilenum;

      if($phone==$mobilenum){
          $name=$data['name'];
        $token=$data['token'];


  require 'mailfolder/PHPMailerAutoload.php';
  $mail = new PHPMailer();
 // $mail->IsSMTP();
  $mail->SMTPDebug = 0;
  $mail->SMTPAuth = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port     = 587;  
  $mail->Username = "Enter gmail";
  $mail->Password = "Enter gmail password";
  $mail->Host     = "smtp.gmail.com";
  $mail->Mailer   = "smtp";
  $mail->SetFrom("Enter gmail", "yash soni");
  $mail->AddReplyTo("Enter gmail");
  $mail->AddAddress("$email");
  $mail->Subject =  "this is my subject";
  $mail->WordWrap   = 80;
  $content = "hi ,$name click here to reset password your account 
  http://localhost/library/adminformforgetpasswordcheck.php?token=$token  
  this link is only activate 3 minutes
  "  ; $mail->MsgHTML($content);
  $mail->IsHTML(true);
  if(!$mail->Send()) {

    
      $_SESSION['message']="<div class='chip green black-text'>email is not send check your connection</div>";
      
    }
    else {
        
        
        header("Location:message.php?dikes");
        
        
        
    }
    
}else{
    $_SESSION['message']="<div class='chip green black-text'>phone number is not match</div>";
    
}

}else{
    $_SESSION['message']="<div class='chip green black-text'>library id mumber not match</div>";
    
}

}


}else{
    
    $_SESSION['message']="<div class='chip green black-text'>library id mumber not match</div>";
    header("Location:adminsignin.php");
}
?>




<div class="row" style="padding-top:100px">
    
    <div class="col l6 m8 s12 offset-l3 offset-m2">
        
        <div class="card">
            <h3 style="text-align: center;">Forget Admin password</h3>
        <?php
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
        ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="input-field col l12 m12 s12">
        <input type="email" name="email" id="em">
        <label for="em">enter email</label>

</div>

   
</div>

<div class="row">

<div class="input-field col l6 m6 s6">
        <input type="text" name="libid" id="tele">
        <label for="tele">Enter library id number</label>


    </div>
 
    <div class="input-field col l6 m6 s6">
        <input type="tel" name="phonee" id="tele">
        <label for="tele">Enter mobile number</label>


    </div>

</div>


<div class="row" >
    <div class="col l6 m6 s6 offset-l3 offset-m3 offset-s3" style="text-align: center;">
    <input type="submit" value="Forget now" name="login" style="padding:10px 25px; border-radius:20px; background-image:linear-gradient(to right,blue,yellow,pink); font-size:large; font-weight:300; color:teal;">



    </div>
</div><br>





</form>
</div>


</div>
</div>




<?php

include "include/footer.php";
?>


