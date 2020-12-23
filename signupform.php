
    <?php

include "include/header.php";
include "include/dbh.php";
if(isset($_POST['sub'])){
    $branch=$_POST['branch'];
    $branch=mysqli_real_escape_string($conn,$branch);
    $branch=htmlentities($branch);
    
    
    
    
    $brachname=$_POST['branchroll'];
    $brachname=mysqli_real_escape_string($conn,$brachname);
    $brachname=htmlentities($brachname);
    
    
    
    
    
    
    
    if($brachname==$branch){
  
        
        $password=$_POST['password'];
        $password=mysqli_real_escape_string($conn,$password);
        $password=htmlentities($password);
        
        $cpassword=$_POST['cpassword'];
        $cpassword=mysqli_real_escape_string($conn,$cpassword);
        $cpassword=htmlentities($cpassword);



        
$image=$_FILES['f12'];
    // print_r($image);
    $file_name = $_FILES['f12']['name'];
    $file_size =$_FILES['f12']['size'];
    $file_tmp =$_FILES['f12']['tmp_name'];
    $file_type=$_FILES['f12']['type'];
    if($file_type=="image/jpeg" || $file_type=="image/jpg" || $file_type=="image/png"){
       


if($file_size<=2097152){

        
  
  
  
        if($password===$cpassword){
            
            $fname=$_POST['firstname'];
            $fname=mysqli_real_escape_string($conn,$fname);
            $fname=htmlentities($fname);
            
            $lname=$_POST['lastname'];
            $lname=mysqli_real_escape_string($conn,$lname);
            $lname=htmlentities($lname);
            $name=$fname." ".$lname;
            
            $email=$_POST['email'];
            $email=mysqli_real_escape_string($conn,$email);
            $email=htmlentities($email);
            
            
            $gender=$_POST['gender'];
            $gender=mysqli_real_escape_string($conn,$gender);
            $gender=htmlentities($gender);
            
            $phone=$_POST['telephone'];
            $phone=mysqli_real_escape_string($conn,$phone);
            $phone=htmlentities($phone);
            

            
            $lastroll=$_POST['lastroll'];
            $lastroll=mysqli_real_escape_string($conn,$lastroll);
            $lastroll=htmlentities($lastroll);
            
            
            
            
            $first4=$_POST['roll4'];
            $first4=mysqli_real_escape_string($conn,$first4);
            $first4=htmlentities($first4);
            
            // echo $rollnumber;
            $rollnumber=$first4.$brachname.$lastroll;
            
            $sql2="SELECT * FROM `form` WHERE rollnumber='$rollnumber'";
            $res2=mysqli_query($conn,$sql2);
            $row2=mysqli_num_rows($res2);

            if($row2==0){
            $sql1="SELECT * FROM `form` WHERE email='$email'";
            $res1=mysqli_query($conn,$sql1);
            $row=mysqli_num_rows($res1);
        // print_r($row);
        // $data=mysqli_fetch_assoc($res1);
        // $name=$data['name'];
        // echo $name;


        if($row==0){    
          $randomnum=bin2hex(random_bytes(15));
        
        $pass=password_hash($password,PASSWORD_BCRYPT);
        $cpassword=$pass;

  require 'mailfolder/PHPMailerAutoload.php';
                $mail = new PHPMailer();
               // $mail->IsSMTP();
                $mail->SMTPDebug = 0;
                $mail->SMTPAuth = TRUE;
                $mail->SMTPSecure = "tls";
                $mail->Port     = 587;  
                $mail->Username = "Enter gmail";     #this email is only used to practice purpose 
                $mail->Password = "Enter gmail password";
                $mail->Host     = "smtp.gmail.com";
                $mail->Mailer   = "smtp";
                $mail->SetFrom("Enter gmail", "yash soni");
                $mail->AddReplyTo("Enter gmail");
                $mail->AddAddress("$email");
                $mail->Subject =  "this is my subject";
                $mail->WordWrap   = 80;
                $content = "hi ,$name click here to activate your account 
                http://localhost/library/checkactivatesignup.php?token=$randomnum  
                and your library id no. is :$randomnum"  ; $mail->MsgHTML($content);
                $mail->IsHTML(true);
                if(!$mail->Send()) {
                  $_SESSION['message']="<div class='chip green black-text'>plese check your internet connetion</div>";
                  
                  
                }
                else {
                  $sql="INSERT INTO form(name,rollnumber,email,img_file,password,cpassword,branch,gender,phone,token,status) VALUES('$name','$rollnumber','$email','$file_name','$pass','$cpassword','$branch','$gender','$phone','$randomnum','inactive')";
                  $res=mysqli_query($conn,$sql);
                  if($res){
                    move_uploaded_file($file_tmp,"../library/studentimg/".$file_name);
                    $_SESSION['message'] = "<div class='chip green black-text'>successful registe check your email </div>";
                    // header("Location:signupform.php");
                    // $_SESSION['message']="<div class='chip green black-text'></div>";
                    // $_SESSION['message']="<div class='chip green black-text'></div>";
                    
                 
                    
                    


              }else{

                $_SESSION['message']="<div class='chip green black-text'>not register register</div>";
              }


              }
              
          
        }
          else{
            
            $_SESSION['message']="<div class='chip green black-text'>email is already register</div>";
            
          }
          
        }else{
          $_SESSION['message']="<div class='chip green black-text'>your roll number is already register</div>";
        }
        
      }else{
        $_SESSION['message']="<div class='chip green black-text'>password went wrong</div>";
      }
    }else{
      $_SESSION['message']="<div class='chip green black-text'>image size less than 2 mb</div>";
      
    }
  }else{
    
    $_SESSION['message']="<div class='chip green black-text'>only jpg,jpeg,png format allow</div>";
  }

    }
    else{
      $_SESSION['message']="<div class='chip green black-text'>please select correct brach name</div>";
    
}

}




 ?>


















<?php
?>

    <body class="backs">
        <div class="back">
<div class="row" >
    <div id="firstrow"  class="col l6 m12 s12 offset-l3 " style="border: 3px solid lightgreen;">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
      <h2>Student Signup to library</h2>
        <?php
if(isset($_SESSION['message']))   #this is check a seesion message create or not
{
    echo $_SESSION['message']; # this  is print a session mssage joo signup.php me hai
    unset( $_SESSION['message']);  #this is unset a seesion of message 
  }

?>


            <div class="row">
      <div class="col m12">
          <div class="input-field col m4">
              
                <input id="rollno.1" type="tel" maxlength="4" min="0" class="validate" name="roll4" required>
                <label for="rollno.1">First 4 digit roll no.</label>
              </div>

        
              <div class="col m4" style="padding-top: 15px;" >
              <select name="branchroll">
      <option value="" disabled selected id="branched">Select brach</option>
      <option value="cs">cs</option>
      <option value="me">me</option>
      <option value="ce">ce</option>
      <option value="ec">ec</option>
    </select>
   
              </div>


    <div class="input-field col m4">
        
          <input id="rollno." type="tel" maxlength="6" class="validate" name="lastroll" required>
          <label for="icon_telephone2">last 6 digit roll no.</label>
        </div>
          </div>
      </div>
  



        <div class="row">
    <div class="col s12">
      <div class="row">
        <div id="namess" class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate" name="firstname" required>
          <label for="icon_prefix">First Name</label>
        </div>
        <div id="namess" class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_prefix1" type="text" name="lastname"  required>
            <label for="icon_prefix1">last name</label>
        </div>
    </div>
    
    <div class="input-field col s12">
        <input id="email" type="email" class="validate" name="email" required>
        <label for="email" data-error="wrong" data-success="right">Email</label>
    </div>
    
    
    
</div>



<div class="row">
    <div class="input-field col s6">
      <input id="icon_prefix" type="password" class="validate" name="password" required>
      <label for="icon_prefix">password</label>
    </div>
    <div class="input-field col s6">

        <input id="icon_prefix1" type="password" class="validate" name="cpassword" required>
        <label for="icon_prefix1">conform password</label>
    </div>
</div>



        
    
        <div class="input-field col s12">
    <select name="branch">
      <option value="" disabled selected>Choose your department</option>
      <option value="cs">cs</option>
      <option value="me">me</option>
      <option value="ce">ce</option>
      <option value="ec">ec</option>
    </select>
      


        </div>
        </div>
<div class="row">
    <div class="col s12">
    <div class="col s6">
    <p> Select gender
  <input name="gender" value="male"  type="radio" id="test1" required />
  <label for="test1" >Male</label>

  <input name="gender" value="female" type="radio" id="test2" required />
  <label for="test2">Female</label>
</p>
    </div>
    <div class="row">    
    <div class="input-field col s6" style="padding-top: -10px;">
          <i class="material-icons prefix">phone</i>
          <input id="icon_telephone12" type="tel" class="validate" name="telephone">
          <label for="icon_telephone12">Mobile no.</label>
        </div>
     
    </div>

        </div>
</div>



<div class="row">
<div class="col l12 m12 s12">
<p>upload photo
<input type="file" name="f12" id="" value="Select file">
    </p>
    </div>
</div> 
  

  <div class="row">
<div class="s12" >
    <div class="row" >
<div class="col s6 offset-s3" style="text-align:center;">
    <input id="buttion" type="submit" value="Register" name="sub" required>
</div>

</div></div>
  </div>

  <p>have you alreagy register?<a href="signinform.php">Sign in</a><br>
  have you Admin?<a href="adminsignup.php">Admin Sign up</a><br>
  have your forget password?
<a href="formforgetpassword.php">forget password</a></p>

</div>
    </form>
  </div>
  <br>
  </div>
    
  
        
  
  



        





<?php
include "include/footer.php";
?>