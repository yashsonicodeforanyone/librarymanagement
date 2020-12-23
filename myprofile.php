<?php

include "include/header.php";
include "include/dbh.php";





if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM form WHERE token='$id'";
    $res=mysqli_query($conn,$sql);
    
    if($res){
        $data=mysqli_fetch_assoc($res);
        
        
    
    
    
    
    
    
    }
















?>








<body>
    
    <div class="row" style="text-align: center; padding-top:70px">
    <div class="col l6 m8 s12 offset-l3 offset-m2" style=" border:1px solid black">

<div class="form" >    

<h3>Welcome to profile</h3>
<h5 id="name"><p><label for="">Name:</label><br>
<?php echo  $data['name']; ?> </h5>


<h5 id="name" style="text-transform: uppercase;"><p><label for="" style="text-transform:capitalize;">Roll number</label><br>
<?php echo $data['rollnumber'];?></h5>


<h5 id="name" ><p><label for="">Email</label><br>
<?php  echo $data['email']; ?></h5>


<h5 id="name"><p><label for="">Branch</label><br>
<?php echo $data['branch']; ?></h5>

<h5 id="name" ><p><label for="">phone number</label><br>
<?php echo $data['phone'] ;?><button><a href="<?php echo $_SERVER['PHP_SELF']; ?>?myid=<?php echo $id ?>" title="Edit your number" style="text-decoration: none;">Edit</a></button></h5>







</div>
</div>
</div>




<?php
}





if(isset($_GET['yourid'])){
    
    if(isset($_POST['phonenum'])){

        $id=$_GET['yourid'];
 
 
        $phone=$_POST['phone'];      
 $phone=mysqli_real_escape_string($conn,$phone);
 $phone=htmlentities($phone);
 
 
 
 $phone1=$_POST['phone1'];       
 $phone1=mysqli_real_escape_string($conn,$phone1);
 $phone1=htmlentities($phone1);
        
if($phone==$phone1){

    $updated="UPDATE form SET phone='$phone' WHERE token='$id'";
    $res3=mysqli_query($conn,$updated);
    if($res3){
        $_SESSION['message']="<div class='chip yellow green-text'>phone number is updated</div> ";
        
        header("Location:index.php?id=$id");
        
        
        
        
    }
    
    
    
}else{
    
    $_SESSION['message']="<div class='chip yellow red-text'>phone number not match</div> ";
    header("Location:index.php?id=$id");
    

}

        
    }
    
}




if(isset($_GET['myid'])){
    $id1=$_GET['myid'];
    $sql1="SELECT * FROM form WHERE token='$id1'";
    $res1=mysqli_query($conn,$sql1);
    






    if($res1){
        $data1=mysqli_fetch_assoc($res1);







    ?>
    
        
    <div class="row" style="text-align: center; padding-top:150px">
    <div class="col l4 m8 s12 offset-l4 offset-m2" style=" border:1px solid black">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?yourid=<?php echo $id1 ?>" method="POST" enctype="multipart/form-data">    
    <h5>Change your number</h5>
<div class="input-field col l6 offset-l3" >
<input type="tel" name="phone" id="number" >
<label for="number">Enter new number</label>

</div>
<div class="input-field col l6 offset-l3" >
<input type="tel" name="phone1" id="number1" >
<label for="number1">conform number</label>

</div>



<div class="input-field col l6 offset-l3" >
<input type="submit" name="phonenum" value="Submit"><br><br>

</div>






</form>
</div>
</div>




    


    
    <?php
    }
    }
    include "include/footer.php";
    
    ?>
    


