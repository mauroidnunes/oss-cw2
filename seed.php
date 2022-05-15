<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");

    //Checks if logged in
   if (isset($_SESSION['id'])) {

    $array_students = array(
        array(
            "studentid" => "202201",
            "password" => password_hash("password1", PASSWORD_DEFAULT),
            "dob" => "03-05-1998",
            "firstname" => "Jack",
            "lastname" => "Walker",
            "house" => "18 Jonsville Lane",
            "town" => "Milton Keynes",
            "county" => "Buckinghamshire",
            "country" => "United Kingdom",
            "postcode" => "MK9 5ER"
        ),
        array(
            "studentid" => "202202",
            "password" => password_hash("password2", PASSWORD_DEFAULT),
            "dob" => "15-02-2002",
            "firstname" => "Mary",
            "lastname" => "Beckett",
            "house" => "5 Rhode Square",
            "town" => "Marlow",
            "county" => "Buckinghamshire",
            "country" => "United Kingdom",
            "postcode" => "SL7 1AB"
        ),
        array(
            "studentid" => "202203",
            "password" => password_hash("password3", PASSWORD_DEFAULT),
            "dob" => "26-08-2001",
            "firstname" => "Maxime",
            "lastname" => "Boulanger",
            "house" => "4 London Road",
            "town" => "High Wycombe",
            "county" => "Buckinghamshire",
            "country" => "United Kingdom",
            "postcode" => "HP13 5DX"
        ),
        array(
            "studentid" => "202204",
            "password" => password_hash("password4", PASSWORD_DEFAULT),
            "dob" => "04-07-2000",
            "firstname" => "Filip",
            "lastname" => "Radjenki",
            "house" => "123 Hughenden Road",
            "town" => "High Wycombe",
            "county" => "Buckinghamshire",
            "country" => "United Kingdom",
            "postcode" => "HP11 3HE"
        ),
        array(
            "studentid" => "202205",
            "password" => password_hash("password5", PASSWORD_DEFAULT),
            "dob" => "18-01-2000",
            "firstname" => "Will",
            "lastname" => "Barton",
            "house" => "43 Tame House",
            "town" => "Amersham",
            "county" => "Buckinghamshire",
            "country" => "United Kingdom",
            "postcode" => "HP5 2ET"
        ),
    );

    foreach ($array_students as $key => $student_array) {
        $stmt = $conn->prepare("INSERT INTO student VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
        $stmt->bind_param("ssssssssss", $student_array["studentid"], $student_array["password"], $student_array["firstname"], $student_array["lastname"], 
            $student_array["house"], $student_array["town"], $student_array["county"], $student_array["country"], $student_array["postcode"]);
        $stmt->execute();
        $result = $stmt->get_result();

   }