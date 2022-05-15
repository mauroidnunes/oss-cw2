<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

    //Checks if logged in
   if (isset($_SESSION['id'])) {

    $array_students = array(
        array(
            "studentid" => "20000001",
            "password" => "test",
            "dob" => "1998-05-03",
            "firstname" => "Jack",
            "lastname" => "Walker",
            "house" => "18 Jonsville Lane",
            "town" => "Milton Keynes",
            "county" => "Buckinghamshire",
            "country" => "United Kingdom",
            "postcode" => "MK9 5ER"
        ),
        array(
            "studentid" => "20000002",
            "password" => "test",
            "dob" => "2002-02-15",
            "firstname" => "Mary",
            "lastname" => "Beckett",
            "house" => "5 Rhode Square",
            "town" => "Marlow",
            "county" => "Buckinghamshire",
            "country" => "United Kingdom",
            "postcode" => "SL7 1AB"
        ),
        array(
            "studentid" => "20000003",
            "password" => "test",
            "dob" => "2001-08-26",
            "firstname" => "Maxime",
            "lastname" => "Boulanger",
            "house" => "4 London Road",
            "town" => "High Wycombe",
            "county" => "Buckinghamshire",
            "country" => "United Kingdom",
            "postcode" => "HP13 5DX"
        ),
        array(
            "studentid" => "20000004",
            "password" => "test",
            "dob" => "2000-07-04",
            "firstname" => "Filip",
            "lastname" => "Radjenki",
            "house" => "123 Hughenden Road",
            "town" => "High Wycombe",
            "county" => "Buckinghamshire",
            "country" => "United Kingdom",
            "postcode" => "HP11 3HE"
        ),
        array(
            "studentid" => "20000005",
            "password" => "test",
            "dob" => "2000-01-18",
            "firstname" => "Will",
            "lastname" => "Barton",
            "house" => "43 Tame House",
            "town" => "Amersham",
            "county" => "Buckinghamshire",
            "country" => "United Kingdom",
            "postcode" => "HP5 2ET"
        ),
    );

    foreach ($array_students as $key => $student){
        $sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode) 
        VALUES ('{$student["studentid"]}','{$student["password"]}', '{$student["dob"]}', '{$student["firstname"]}', '{$student["lastname"]}',' {$student["house"]}','{$student["town"]}', '{$student["county"]}', '{$student["country"]}','{$student["postcode"]}')";
        echo $sql;
        $result = mysqli_query($conn,$sql);
     }

   }