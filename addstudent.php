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

      $image = $_FILES['image']['tmp_name']; 
      $imagedata = addslashes(fread(fopen($image, "r"), filesize($image)));

      // Insert student details into table
      $sql = "INSERT into student set studentid ='" . $_POST['studentid']  . "',";
      $sql .= "password ='" . $_POST['password'] . "',";
      $sql .= "dob ='" . $_POST['txtdob'] . "',";
      $sql .= "firstname ='" . $_POST['txtfirstname'] . "',";
      $sql .= "lastname ='" . $_POST['txtlastname']  . "',";
      $sql .= "house ='" . $_POST['txthouse']  . "',";
      $sql .= "town ='" . $_POST['txttown']  . "',";
      $sql .= "county ='" . $_POST['txtcounty']  . "',";
      $sql .= "country ='" . $_POST['txtcountry']  . "',";
      $sql .= "postcode ='" . $_POST['txtpostcode']  . "',"; //add comma
      $sql .= "image ='" . $imagedata . "'";

      //echo $sql;

      $result = mysqli_query($conn,$sql);

      $data['content'] = "<p>New student added successfully.</p>";
    }
    
   else{
      $data['content'] = <<<EOD
      
      <h2>Add New Student</h2>
      <form enctype="multipart/form-data" name="frmdetails" action="" method="post">

         Student ID:
         <input class='form-control' name="studentid" type="text"  /><br/>

         Password:
         <input class='form-control' name="password" type="password"  /><br/>

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
         <input  type="file" name="image" accept="image/jpeg" class="form-control" />

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