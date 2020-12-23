<?php


include "include/header.php";
include "include/dbh.php";
include "include/nav.php";

if(isset($_GET['id'])){
if(isset($_GET['myid'])){


    $id=$_GET['id'];
    $myid=$_GET['myid'];

    $sql="SELECT * FROM form WHERE token='$id'";
$res=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($res);
$img=$data['img_file'];



?>





<div class="row">
    <div class="col l10 m8 s12 offset-l1 offset-m2" >
<!-- <div class="row"> -->
<div class="col l4 s6 m6 offset-l4 offset-s3 offset-m3 ">


      <div class="card">
        <div class="card-image">
          <img src="studentimg/<?php echo $img ?>">
          <span class="card-title">photo</span>
     
        </div>
     
    </div>
    
    
    
    
    <h3 style="border: 1px solid ;text-decoration:none;"><a href="adminpanel.php?id=<?php
echo $myid     ?>">Back to admin panel</a></h3>
    
    
</div>
<!-- </div> -->
<style>
    h3{
        /* border: 1px solid black; */
        text-align: center;
    }
</style>

<div class="row">
<div class="col l8 m8 s12 offset-l2 offset-s2">
<h3>Name:<?php echo $data['name'] ?></h3>
</div>
<div class="col l8 m8 s12 offset-l2 offset-s2">
<h3>Roll number:<?php echo $data['rollnumber'] ?></h3>
</div>
<div class="col l8 m8 s12 offset-l2 offset-s2">
<h3>Email:<?php echo $data['email'] ?></h3>
</div>
<div class="col l8 m8 s12 offset-l2 offset-s2">
<h3>branch:<?php echo $data['branch'] ?></h3>
</div>
<div class="col l8 m8 s12 offset-l2 offset-s2">
<h3>gender:<?php echo $data['gender'] ?></h3>
</div>
<div class="col l8 m8 s12 offset-l2 offset-s2">
<h3>phone:<?php echo $data['phone'] ?></h3>
</div>

</div>




    </div>
</div>







<?php
}}
include "include/footer.php";
?>