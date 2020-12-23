<?php

include "include/header.php";
if (isset($_SESSION['name'])) {
    include "include/nav.php";
    include "include/dbh.php";


    if (isset($_GET['yourid'])) {
        $yourid = $_GET['yourid'];
        $yourid = mysqli_real_escape_string($conn, $yourid);
        $yourid = htmlentities($yourid);

        if (isset($_POST['changepassword'])) {
            $password = $_POST['password'];
            $password = mysqli_real_escape_string($conn, $password);
            $password = htmlentities($password);

            $cpassword = $_POST['cpassword'];
            $cpassword = mysqli_real_escape_string($conn, $cpassword);
            $cpassword = htmlentities($cpassword);


            if ($password == $cpassword) {
                $newpassword = password_hash($password, PASSWORD_BCRYPT);


                $sql1 = "UPDATE `form` SET password='$newpassword',cpassword='$newpassword' WHERE token='$yourid'";
                $res1 = mysqli_query($conn, $sql1);
                if ($res1) {
                    $_SESSION['message'] = "<div class='chip yellow blue text'>password change successfully</div>";
                    header("Location:index.php?id=$yourid");
                }
            }
        }
    }else{

    



    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $id = mysqli_real_escape_string($conn, $id);
        $id = htmlentities($id);

        $sql = "SELECT * FROM form WHERE token='$id'";
        $res = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($res);
        $email = $data['email'];








        require 'C:\\xamppp\\htdocs\\library\\mailfolder\\PHPMailerAutoload.php';
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
        $content = "click here to Change your password http://localhost/library/passwordchange.php?myid=$id";
        $mail->MsgHTML($content);
        $mail->IsHTML(true);
        if (!$mail->Send()) {
            $_SESSION['message'] = "<div class='chip green black-text'>email not sent</div>";
            header("Location:index.php?id=$id");
        } else {

            $_SESSION['message'] = "<div class='chip green black-text'>check your email to change password</div>";
            header("Location:index.php?id=$id");
        }
    }else{

    


    
    if (isset($_GET['myid'])) {
        $id = $_GET['myid'];


    ?>


        <body>
            <div class="row">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>?yourid=<?php echo $id ?>" method="POST" enctype="multipart/form-data" class="col l6 offset-l3">



                    <h3 style="text-align: center;">Change your password</h3>







                    <div class="input-field col l6 offset-l3">
                        <input type="password" name="password" id="password">
                        <label for="password">Enter new password</label>


                    </div>
                    <div class="input-field col l6 offset-l3">
                        <input type="password" name="cpassword" id="cpassword">
                        <label for="cpassword">Enter conform password</label>
                    </div>

                    <div class="input-field col l6 offset-l3">
                        <input type="submit" value="Change Password" name="changepassword">

                    </div>
                </form>




            </div>

        <?php


    } else {
        $_SESSION['message'] = "<div class='chip red black-text'>Please sign in</div>";
        header("Location:signinform.php");
    }
     
}
}
     ?>


    <?php
    include "include/footer.php";

}
    ?>