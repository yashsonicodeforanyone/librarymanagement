<?php
include "include/header.php";
include "include/dbh.php";



if(isset($_GET['token'])){
$token=$_GET['token'];



$randomid=bin2hex(random_bytes(4));

$sql1="SELECT * FROM admin where token='$token'";
$res1=mysqli_query($conn,$sql1);
if($res1){
    
$data=mysqli_fetch_assoc($res1);
$email=$data['email'];



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
    $mail->AddAddress($email);
    $mail->Subject =  "Please verify for library professor";
    $mail->WordWrap   = 80;
    $content = "You account is suucesful register 
    your library id=$randomid"  ; $mail->MsgHTML($content);
    $mail->IsHTML(true);
    if(!$mail->Send()) {
      $_SESSION['message']="<div class='chip green black-text'>plese check your internet connetion</div>";
      
      
    }
    else{        
        $sql="UPDATE admin SET libraryidnum='$randomid',status='active' WHERE token='$token'";
        $result=mysqli_query($conn,$sql);
        if($result){
            
            
            $_SESSION['message']="<div class='chip green black-text'>check your email and signin easily</div>";
            header("location:adminsignin.php");

}
}
}
}
?>


<?php
 include "include/footer.php";


 ?>