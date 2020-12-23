<?php
include "include/header.php";
include "include/dbh.php";
include "include/nav.php";
if(isset($_SESSION['name'])){



if (isset($_GET['id'])) {
  $id = $_GET['id'];
  if (isset($_POST['addbook'])) {




    $bookname = $_POST['bookname'];
    $subject = $_POST['subject'];
    $authorname = $_POST['authorname'];
    $idnum = $_POST['idnum'];
    $bookreference = $_POST['bookref'];
    $telephonenum = $_POST['telephone'];
    $prof = $_POST['prof'];
    // $date=date(localtime(time()));




    // echo $bookname.$subject.$authorname.$idnum.$telephonenum.$prof;


    $sql = "INSERT INTO book (bookname,token,booksubject,authorname,libraryidnum,referncenum,phonenum,status,profname) VALUES('$bookname','$id','$subject','$authorname','$idnum','$bookreference','$telephonenum','ADD','$prof')";

    $re = mysqli_query($conn, $sql);
    if ($re) {
    
      header("Location:message.php?id=$id");
    } else {
      
      $_SESSION['message']="<div class='chip red yellow-text'> data is not register</div>";
      
    }

  }




  $sql1 = "SELECT * FROM `book` WHERE token='$id'";
  $re1 = mysqli_query($conn, $sql1);
  // ;
  $row = mysqli_num_rows($re1);
  //  echo $row;



?>



<div class="row" style="padding-top: 5px;">
  <div class="linker">
  <div class="col l2 m2 s2">
    
     
    
        <h5 style="font-size: 20px;">Manage your library</h5>
        <a href="myprofile.php?id=<?php echo $id ?> ">my profile</a><br>
        <hr>
        <a href="">Add/Submit Book</a><br>
        
        
        <a href="passwordchange.php?id=<?php echo $id ?>">Password change</a><br>
        <a href="logout.php?id=<?php echo $id ?>">logout</a><br>
    
    
    
    
      </div>
    </div>



<div class="col l10 m10 s10" style="border: 1px solid black;" >
<div class="main-content">
<h3 style="text-align: center;">Add new book</h3>
<?php
if(isset($_SESSION['message'])){
  
      echo $_SESSION['message'];
     unset($_SESSION['message']);
    }

    
?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" required>
            <div class="row">
              <div class="input-field col s6">
                <input type="text" name="bookname" id="Bookname" required>
                <label for="Bookname">enter a book name</label>
              </div>

              <div class="input-field col s6">
                <input type="text" name="subject" id="subjectname" required>
                <label for="subjectname">enter a subject</label>
              </div>



            </div>

            <div class="row">
              <div class="input-field col s12">
                <input type="text" name="authorname" id="authorname" required>
                <label for="authorname">book author name</label>
              </div>

              <div class="input-field col s12">
                <input type="text" name="bookref" id="referencenumber" required>
                <label for="referencenumber">book refernce number</label>
              </div>
              <div class="input-field col s12">
                <input type="text" name="idnum" id="idnum" required>
                <label for="idnum">library id number</label>

              </div>


              <div class="input-field col s6">
                <input type="tel" name="telephone" id="telnum" required>
                <label for="telnum">enter phone number</label>

              </div>
              <div class="input-field col s6">
                <input type="text" name="prof" id="teacher" required>
                <label for="teacher">Enter profesor name</label>

              </div>

              <div class="row">
                <div class="input-field col s6 offset-s3" style="text-align:center;">
                  <input type="submit" value="Add now" name="addbook" >

                </div>
              </div>




          </form>









</div>





</div>
</div>



<div class="col l10 m10 s10 offset-l2 offset-m2 offset-s2 ">

<table>
          <h3>Your books</h3>
          <thead>
            <tr>
              <th>Name</th>
              <th>Subject</th>
              <th>Referece no</th>
              <th>status</th>
              <th>prof. name</th>
              <th>operation</th>
            </tr>
          </thead>

          <tbody>

            <?php

            while ($data = mysqli_fetch_assoc($re1)) {
              $myid = $data['id'];
              $statuss = $data['status'];


              echo "<tr>" . "<td>" . $data['bookname'] . "</td>";


              echo "<td>" . $data['booksubject'] . "</td>";
              echo "<td>" . $data['referncenum'] . "</td>";
              echo "<td>" . $data['status'] . "</td>";
              echo "<td>" . $data['profname'] . "</td>";
              if ($statuss == 'ADD') {
                echo "<td>" . "<a href='return.php?myid=$myid'>return</a>" . "</td>";
              } else {

                echo "<td>" . "Returned sucessfull" . "</td>";
              }




              echo "</tr>";
            }
            ?>


          </tbody>
        </table>





</div>




</div>




  <?php
include "include/footer.php";
  ?>
<?php
}
}else{
  $_SESSION['message']="<div class='chip red black-text'>login now</div>";
  header ("Location:signinform.php");
}

?>