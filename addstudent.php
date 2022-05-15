<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// Check if logged in
if (isset($_SESSION['id'])) {

   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

  // if the form has been submitted
  if (isset($_POST['submit'])) {

   // $image = $_FILES['studentimage']['tmp_name']; 
   //  $imagedata = addslashes(fread(fopen($image, "r"), filesize($image)));

      // build an sql statment to insert a new
      $sql = "INSERT into student set firstname ='" . $_POST['txtfirstname'] . "',";
      $sql .= "lastname ='" . $_POST['txtlastname']  . "',";
      $sql .= "house ='" . $_POST['txthouse']  . "',";
      $sql .= "town ='" . $_POST['txttown']  . "',";
      $sql .= "county ='" . $_POST['txtcounty']  . "',";
      $sql .= "country ='" . $_POST['txtcountry']  . "',";
      $sql .= "postcode ='" . $_POST['txtpostcode']  . "', ";
      // $sql .= "image =" . $imagedata . "'; ";
      
      // $result = mysqli_query($conn,$sql);

      $data['content'] = "<p>New student added successfully.</p>";
    }
    
   else{
      $data['content'] = <<<EOD
      <h2>Add New Student</h2>
      <form enctype="multipart/form-data" name="frmdetails" action="" method="post">

         Student ID:
         <input class='form-control' name="txtstudentid" type="text"  /><br/>

         First Name:
         <input class='form-control' name="txtfirstname" type="text"  /><br/>

         Last Name:
         <input class='form-control' name="txtlastname" type="text"   /><br/>

         Date of Birth:
         <input class='form-control' name="txtdob" type="date"  /><br/>

         Number and Street:
         <input class='form-control' name="txthouse" type="text"   /><br/>

         Town:
         <input class='form-control' name="txttown" type="text"   /><br/>

         County:
         <input class='form-control' name="txtcounty" type="text"   /><br/>

         Country:
         <input class='form-control' name="txtcountry" type="text"   /><br/>

         Postcode:
         <input class='form-control'  name="txtpostcode" type="text"   /><br/>

         Image:
         <input  type="file" name="studentimage" accept="image/jpeg" class="form-control" />

         <input type="submit" value="Save" name="submit"/>
      </form>
 
 EOD;
   }
    
   // render the template
   echo template("templates/default.php", $data);

   }


 else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>