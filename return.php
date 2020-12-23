<?php
include "include/header.php";
if(isset($_SESSION['name'])){


include "include/dbh.php";


if(isset($_GET['myid'])){

    $myid=$_GET['myid'];

$sql1="SELECT * FROM `book` WHERE id='$myid'";
$res1=mysqli_query($conn,$sql1);
$data1=mysqli_fetch_assoc($res1);


$myid=$_GET['myid'];
$sql="UPDATE book SET status='Return' WHERE id='$myid'";
$res=mysqli_query($conn,$sql);

$id=$data1['token'];
// echo "$id";
if($res){
$_SESSION['message']="<div class='chip yellow red-text'>Return successfull</div>";
    header("Location:index.php?id=$id");

}














}

?>







<?php
include "include/footer.php";
}

?>