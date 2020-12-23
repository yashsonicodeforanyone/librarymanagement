<?php
include "include/header.php";
include "include/dbh.php";




if(isset($_POST['login'])){


    $_SESSION['last_time']=time();

$email=$_POST['email'];
$email=mysqli_real_escape_string($conn,$email);
$email=htmlentities($email);



$phone=$_POST['phonee'];
$phone=mysqli_real_escape_string($conn,$phone);
$phone=htmlentities($phone);


$first4=$_POST['first4'];
$first4=mysqli_real_escape_string($conn,$first4);
$first4=htmlentities($first4);

$branchroll=$_POST['branchroll'];
$branchroll=mysqli_real_escape_string($conn,$branchroll);
$branchroll=htmlentities($branchroll);


$last6=$_POST['last6'];
$last6=mysqli_real_escape_string($conn,$last6);
$last6=htmlentities($last6);



$sql="SELECT * FROM form WHERE email='$email'";
    $res=mysqli_query($conn,$sql);
    
    
    if($res){
     $data=mysqli_fetch_assoc($res);
     $rollnum=$data['rollnumber'];
     $roll=$first4.$branchroll.$last6;
     if($rollnum==$roll){
        $mobilenum=$data['phone'];

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

  http://localhost/library/formforgetpasswordcheck.php?token=$token  
  this link is active only three minute"  ; $mail->MsgHTML($content);
  $mail->IsHTML(true);
  if(!$mail->Send()) {

    
    header("Location:message.php?di");
    
}
else {
    
    $_SESSION['message']="<div class='chip green black-text'>please check your email linkk activate only three minutes</div>";
    
  
}
}else{
    $_SESSION['message']="<div class='chip green black-text'>phone number does not match</div>";
    
}
}else{
    $_SESSION['message']="<div class='chip green black-text'>roll number does not match</div>";
    
}
}else{
    $_SESSION['message']="<div class='chip green black-text'>email is not register</div>";

    }
}
?>




<div class="row" style="padding-top:100px">
    
    <div class="col l6 m8 s12 offset-l3 offset-m2">
        
        <div class="card">
            <h3 style="text-align: center;">Forget password</h3>
        <?php
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
        ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
<div class="row">
    <div class="input-field col l6 m6 s6">
        <input type="email" name="email" id="em">
        <label for="em">enter email</label>

</div>
    
    <div class="input-field col l6 m6 s6">
        <input type="tel" name="phonee" id="tele">
        <label for="tele">Enter number</label>


    </div>
</div>

<div class="row">
<div class="input-field col s4">
                            <input type="tel" name="first4" id="number" maxlength="4" required>
                            <label for="number">Roll No first 4</label>

                        </div>

                        <div class="input-field col s4">
                            <select name="branchroll">
                                <option value="" disabled selected id="branched">Select brach</option>
                                <option value="cs">cs</option>
                                <option value="me">me</option>
                                <option value="ce">ce</option>
                                <option value="ec">ec</option>
                            </select>

                        </div>

                        <div class="input-field col s4">
                            <input type="tel" name="last6" id="last" maxlength="6">
                            <label for="last">Roll for last digit</label>

                        </div>


</div>


<div class="row" >
    <div class="col l6 m6 s6 offset-l3 offset-m3 offset-s3" style="text-align: center;">
    <input type="submit" value="Login" name="login" style="padding:10px 25px; border-radius:20px; background-image:linear-gradient(to right,blue,yellow,pink); font-size:large; font-weight:300; color:teal;">



    </div>
</div><br>





</form>
</div>


</div>
</div>




<?php
include "include/footer.php";
?>


