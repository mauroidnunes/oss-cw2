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
      
      <div class="mb-2" class="mt-6">
      <h2>Add New Student</h2>
      </div>

      <form enctype="multipart/form-data" name="frmaddstudent" action="" method="post">

         <div class="mb-3">
         <label for="studentid" class="form-label">Student ID</label>
         <input class='form-control' name="studentid" type="text">
         </div>
      
         <div class="mb-3">
         <label for="password" class="form-label">Password</label>
         <input class='form-control' name="password" type="password"  /> 
         </div>

         <div class="mb-3">
         <label for="txtfirstname" class="form-label">First Name</label>
         <input class='form-control' name="txtfirstname" type="text"  />
         </div>

         <div class="mb-3">
         <label for="txtlastname" class="form-label">Last Name</label>
         <input class='form-control' name="txtlastname" type="text"   />
         </div>

         <div class="mb-3">
         <label for="txtdob" class="form-label">Date of Birth</label>
         <input class='form-control' name="txtdob" type="date"  />
         </div>

         <div class="mb-3">
         <label for="txthouse" class="form-label">Number and Street</label>
         <input class='form-control' name="txthouse" type="text"   />
         </div>

         <div class="mb-3">
         <label for="txttown" class="form-label">Town</label>
         <input class='form-control' name="txttown" type="text"   />
         </div>

         <div class="mb-3">
         <label for="txtcounty" class="form-label">County</label>
         <input class='form-control' name="txtcounty" type="text"   />
         </div>

         <div class="mb-3">
         <label for="txtcountry" class="form-label">Country</label>
         <input class='form-control' name="txtcountry" type="text"   />
         </div>

         <div class="mb-3">
         <label for="txtpostcode" class="form-label">Postcode</label>
         <input class='form-control'  name="txtpostcode" type="text"   />
         </div>

         <div class="mb-3">
         <label for="image" class="form-label">Image</label>
         <input type="file" name="image" accept="image/jpeg" class="form-control" />
         </div>

         <input type="submit" name="submit" class="btn btn-primary" value="Save"/>
         
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