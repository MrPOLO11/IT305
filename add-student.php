<?php

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    /*var_dump($_POST);
    ["sid"]=> ""
    ["firstName"]""
    ["lastName"]""
    ["birthdate"]""
    ["gpa"]""
    ["advisor"]""
    */

    //Connect to db
    require('/home2/marcosri/connect.php');

    $isValid = true;
    if(isset($_POST['sid']) && strlen($_POST['sid']) == 11) {
        $sid = mysqli_real_escape_string($cnxn, $_POST['sid']);
    }
    else {
        echo"<p>SID is required and must be 11 characters</p>";
        $isValid = false;
    }
    if(isset($_POST['firstName'])) {
        $fName = mysqli_real_escape_string($cnxn, $_POST['firstName']);
    } else {
        echo "<p>First name is required</p>";
        $isValid = false;
    }
    $lName = mysqli_real_escape_string($cnxn, $_POST['lastName']);
    $dob = mysqli_real_escape_string($cnxn, $_POST['birthdate']);
    $gpa = mysqli_real_escape_string($cnxn, $_POST['gpa']);
    $advisor = mysqli_real_escape_string($cnxn, $_POST['advisor']);
    /*if(isset($_POST['gpa']) && $_POST['gpa'] > 0.0 && $_POST['gpa'] < 4.0) {
        $gpa = $_POST['gpa'];
    } else {
        echo "<p>GPQ is required and must be 0-4";
        $isValid = false;
    }*/

    if($isValid) {
        $sql = "INSERT INTO student
                VALUES ('$sid', '$fName', '$lName', '$dob', '$gpa', '$advisor')";

        $result = mysqli_query($cnxn, $sql);

        if($result) {
            echo $sql;
            echo "<p>SID: $sid</p>";
            echo "<p>Student Name: $lName, $fName</p>";
            echo "<p>DOB: $dob</p>";
            echo "<p>GPA: $gpa</p>";
            echo "<p>Advisor: $advisor</p>";
        }
    }