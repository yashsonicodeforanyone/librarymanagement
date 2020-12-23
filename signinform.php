<?php
include "include/header.php";
include "include/dbh.php";

if (isset($_POST['login'])) {
    $password = $_POST['password'];
    $password = mysqli_real_escape_string($conn, $password);
    $password = htmlentities($password);
    $cpassword = $_POST['cpassword'];
    $cpassword = mysqli_real_escape_string($conn, $cpassword);
    $cpassword = htmlentities($cpassword);
    if ($password == $cpassword) {
        $fist4 = $_POST['first4'];
        $fist4 = mysqli_real_escape_string($conn, $fist4);
        $fist4 = htmlentities($fist4);
        $branch = $_POST['branchroll'];
        $branch = mysqli_real_escape_string($conn, $branch);
        $branch = htmlentities($branch);
        $last6 = $_POST['last6'];
        $last6 = mysqli_real_escape_string($conn, $last6);
        $last6 = htmlentities($last6);
        $rollnum = $fist4 . $branch . $last6;
        $email = $_POST['email'];
        $email = mysqli_real_escape_string($conn, $email);
        $email = htmlentities($email);
        $sql = "SELECT * FROM form WHERE email='$email'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($res);
        // print_r($row);
        if ($row >= 1) {

            $data = mysqli_fetch_assoc($res);
            $datapassword = $data['password'];
            $dataroll = $data['rollnumber'];
            $databranch = $data['branch'];
            $datastatus=$data['status'];
            $dataid=$data['id'];
            $token=$data['token'];
            if (password_verify($password, $datapassword)) {
                if ($dataroll == $rollnum) {

                    if ($databranch == $branch) {
                       if($datastatus=='active'){
                    $_SESSION['name']=$dataid;
                           header("Location:index.php?id=$token");

                       }else{
                           $_SESSION['message'] = "<div class='chip green black-text'>link not active please check your email</div>";

                       }

                    } else {
                        $_SESSION['message'] = "<div class='chip green black-text'>please select correct branch</div>";
                    }
                } else {
                    $_SESSION['message'] = "<div class='chip green black-text'>roll number does not match</div>";
                }
                // $random=bin2hex(random_bytes(15));
            } else {

                $_SESSION['message'] = "<div class='chip green black-text'>password wrong</div>";
            }
        } else {
            $_SESSION['message'] = "<div class='chip green black-text'>email is not match</div>";
        }
    }else{
        $_SESSION['message'] = "<div class='chip green black-text'>conform password not match please check</div>";
        
    }
}
?>










<body style="background-image:url('img/formbackg.jpg'); height:110%; background-repeat:no-repeat; background-size:100% 100%; ">
    <div>
        <div class="row" style=" padding-top:70px;">
            <div id="firstrow" class="col l6 m12 s12 offset-l3 " style="border: 3px solid lightgreen; display:flex; align-items:center; justify-content:center;">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <h2>Student Sigin library</h2>

                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];

                        unset($_SESSION['message']);
                    }

                    ?>
                    <div class="row">
                        <div class="input-field col s4">
                            <input type="tel" name="first4" id="number" maxlength="4" required>
                            <label for="number">Roll No first 4 digit</label>

                        </div>

                        <div class="input-field col s4">
                            <select name="branchroll">
                                <option value="" disabled selected id="branched" required>Select brach</option>
                                <option value="cs">cs</option>
                                <option value="me">me</option>
                                <option value="ce">ce</option>
                                <option value="ec">ec</option>
                            </select>

                        </div>

                        <div class="input-field col s4">
                            <input type="tel" name="last6" id="last" maxlength="6" required>
                            <label for="last">Roll No. for last 6 digit</label>

                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="email" name="email" id="email" required>
                            <label for="email">Enter email</label>

                        </div>
                    </div>




                    <div class="row">

                        <div class="input-field col s6">
                            <input type="password" name="password" id="password" required>
                            <label for="password">Enter password</label>


                        </div>

                        <div class="input-field col s6">
                            <input type="password" name="cpassword" id="conformpassword" required>
                            <label for="conformpassword">Conform password</label>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col s6 offset-s3" style="text-align:center;">

                            <input type="submit" value="Login" name="login" style="padding:10px 25px; border-radius:20px; background-image:linear-gradient(to right,blue,yellow,pink); font-size:large; font-weight:300; color:teal;">


                        </div>
                    </div>
                    
                    <p>have you create Student account?<a href="signupform.php">Sign up</a><br>
                    
have you forget Student password?
<a href="formforgetpassword.php">forget password</a><br>
have you Admin Sign in?<a href="adminsignin.php">Admin Sign in</a>
</p>

            </div>

        </div>



        </form>
    </div>

    </div>
    </div>









<br>

<?php
include "include/footer.php";
?>