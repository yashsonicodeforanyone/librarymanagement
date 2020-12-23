<?php



include "include/header.php";
include "include/dbh.php";

include "include/nav.php";

if(isset($_SESSION['name'])){


if(isset($_GET['id'])){
$myid=$_GET['id'];





?>
<div class="row">
    <div class="col l10 m12 s12 offset-l1">
        <h2 style="text-align: center;">Welcome to admin
            <a href="logout.php?id=<?php echo $myid ?>">logout</a><br>
    
    </h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $myid ?>" method="POST" enctype="multipart/form-data">
            
        
        <div class="col l2 m2 s2" style="background-color: yellow;">
            <select name="brancheds" id="">
                <option value="">Select branch</option>
                <option value="cs">cs</option>
                <option value="me">me</option>
                <option value="ce">ce</option>
                <option value="ec">ec</option>
            </select>
            <input type="submit" name="opt" value="search">
        </div>
        

        </form>    
        
    
        <?php

   
   
   ?>
        
    
        
        
        
        
        
        
        
        
        <?php
  

    
    if(isset($_POST['opt'])){


    $branchesss=$_POST['brancheds'];

 
    
    
    
    
    
 ?>       
        
        <table style="text-transform: uppercase;">
      
           
    <tr>
        <th>Student name</th>
        <th>Roll number</th>
        <th>email</th>
        <th>branch</th>
        <th>gender</th>
        <th>phone</th>
        <th>Status</th>
        <th> operation</th>
    </tr>



<?php
if($branchesss=='cs'){
$sql3="SELECT * FROM `form` WHERE branch='cs'";
$res3=mysqli_query($conn,$sql3);

$rowsoflist=mysqli_num_rows($res3);
for ($i=0; $i < $rowsoflist ; $i++) { 
    $data=mysqli_fetch_assoc($res3);
    $toke=$data['token'];

    


?>


    <tr>
<td style="text-transform: c;"><?php echo $data['name']; ?></td>
<td><?php echo $data['rollnumber']; ?></td>
<td style="text-transform: none;"><?php echo $data['email']; ?></td>
<td><?php echo $data['branch']; ?></td>
<td><?php echo $data['gender']; ?></td>
<td><?php echo $data['phone']; ?></td>
<td><?php echo $data['status']; ?></td>

<td><a href="detailss.php?id=<?php echo $toke ?> & myid=<?php echo $myid ?>">details</a></td>
    </tr>
<?php
}
}


if($branchesss=='me'){
    $sql3="SELECT * FROM `form` WHERE branch='me'";
    $res3=mysqli_query($conn,$sql3);
    
    $rowsoflist=mysqli_num_rows($res3);
    for ($i=0; $i < $rowsoflist ; $i++) { 
        $data=mysqli_fetch_assoc($res3);
        $toke=$data['token'];

        
        
    
    
    ?>
    
    
        <tr>
    <td style="text-transform:capitalize;"><?php echo $data['name']; ?></td>
    <td><?php echo $data['rollnumber']; ?></td>
    <td style="text-transform: none;"><?php echo $data['email']; ?></td>
    <td><?php echo $data['branch']; ?></td>
    <td><?php echo $data['gender']; ?></td>
    <td><?php echo $data['phone']; ?></td>
    <td><?php echo $data['status']; ?></td>
    <td><a href="detailss.php?id=<?php echo $toke ?> & myid=<?php echo $myid ?>">details</a></td>
        </tr>
    <?php
    }}
    
    

if($branchesss=='ce'){
    $sql3="SELECT * FROM `form` WHERE branch='ce'";
    $res3=mysqli_query($conn,$sql3);
    
    $rowsoflist=mysqli_num_rows($res3);
    for ($i=0; $i < $rowsoflist ; $i++) { 
        $data=mysqli_fetch_assoc($res3);
        $toke=$data['token'];
    
        
    
    
    ?>
    
    
        <tr>
    <td style="text-transform:capitalize;"><?php echo $data['name']; ?></td>
    <td><?php echo $data['rollnumber']; ?></td>
    <td style="text-transform: none;"><?php echo $data['email']; ?></td>
    <td><?php echo $data['branch']; ?></td>
    <td><?php echo $data['gender']; ?></td>
    <td><?php echo $data['phone']; ?></td>
    <td><?php echo $data['status']; ?></td>
    <td><a href="detailss.php?id=<?php echo $toke ?> & myid=<?php echo $myid ?>">details</a></td>
        </tr>
    <?php
    }}
    
    

if($branchesss=='ec'){
    $sql3="SELECT * FROM `form` WHERE branch='ec'";
    $res3=mysqli_query($conn,$sql3);
    
    $rowsoflist=mysqli_num_rows($res3);
    for ($i=0; $i < $rowsoflist ; $i++) { 
        $data=mysqli_fetch_assoc($res3);
        $toke=$data['token'];
    
        
    
    
    ?>
    
    
        <tr>
    <td style="text-transform:capitalize;"><?php echo $data['name']; ?></td>
    <td><?php echo $data['rollnumber']; ?></td>
    <td style="text-transform: none;"><?php echo $data['email']; ?></td>
    <td><?php echo $data['branch']; ?></td>
    <td><?php echo $data['gender']; ?></td>
    <td><?php echo $data['phone']; ?></td>
    <td><?php echo $data['status']; ?></td>
    <td><a href="detailss.php?id=<?php echo $toke ?> & myid=<?php echo $myid ?>">details</a></td>
        </tr>
    <?php
    }}
    
    




?>












</table>



<?php

    }}
 
?>



</div>


</div>







    


<?php
}
include "include/footer.php";
?>        