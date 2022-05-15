<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

    //checks whether we are logged in
   if (isset($_SESSION['id'])) {

    // build inster query
    // run query
    //x5

    for ($i=0; $i < 5 ; $i++) { 
        $sql = "INSERT INTO student ...";
        // INSERT INTO table_name (column1, column2, column3, ...)
        // VALUES ('value1', 'value2', 'value3', ...);
        $result = mysqli_query($conn,$sql);
    }

   }