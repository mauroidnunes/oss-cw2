
<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // Check if logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

    // Select student records
    $sql = "SELECT * FROM student";
    $result = mysqli_query($conn, $sql);

    //Wrap table in a form 

    $data['content'] .= "<form action='deletestudents.php' onsubmit=\"return confirm('Delete?');\" 
        method='post'>";

    // Prepare page content
    $data['content'] .= "<table class='table table-dark table-hover' align='left' border='1'>";
    $data['content'] .= "<tr><th align='left'>Student ID</th><th align='left'>Date of Birth</th>"
        . "<th align='left'>First Name</th><th align='left'>Last Name</th><th align='left'>House Address</th>"
        . "<th align='left'>Town/City</th><th align='left'>County</th><th align='left'>Country</th>"
        . "<th align='left'>Postcode</th><th>Image</th><th>Select</th></tr>";

    // Display student records
    while ($row = mysqli_fetch_assoc($result)) {
        $data['content'] .= "<tr>";
        $data['content'] .= "<td>" . $row["studentid"] . "</td>";
        $data['content'] .= "<td>" . $row["dob"] . "</td>";
        $data['content'] .= "<td>" . $row["firstname"] . "</td>";
        $data['content'] .= "<td>" . $row["lastname"] . "</td>";
        $data['content'] .= "<td>" . $row["house"] . "</td>";
        $data['content'] .= "<td>" . $row["town"] . "</td>";
        $data['content'] .= "<td>" . $row["county"] . "</td>";
        $data['content'] .= "<td>" . $row["country"] . "</td>";
        $data['content'] .= "<td>" . $row["postcode"] . "</td>";
        $data['content'] .= "<td><img width ='100' src='getimage.php?studentid=" . $row["studentid"] . "'></td>";
        $data['content'] .= "<td><input type='checkbox' name='students[]' value='$row[studentid]'></td>";
        $data['content'] .= "</tr>";
    }

    $data['content'] .= "</table>";

    $data['content'] .= "<input type='submit' name='deletebtn' class='btn btn-primary' value='Delete'/>";

    $data['content'] .= "</form>";

      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>