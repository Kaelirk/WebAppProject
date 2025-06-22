<?php
/*start/continue a session to make sure we have access to the session variables (userid and useruid) -- as this page of code does not include the header.php file
the session must be started/continued on this page to access the global variables*/
session_start();
//Check this page was accessed by submitting a form.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //$id and $uid are determine by the active session user
    $id = $_SESSION["userid"];
    $name = $_SESSION["useruid"];
    $rawApptStart = $_POST['slot'];
    //taking the raw string date/time data from the form and parsing it into a date format compatible with the datetime data type in the mysql database.
    $apptStart = date('Y-m-d H:i:s', strtotime($rawApptStart));

    include "../classes/dbh.class.php";
    include "../classes/availabilities.class.php";
    include "../classes/availabilities-ctrl.class.php";

    $newAppt = new AvailabilitiesCtrl($id, $name, $apptStart); //creating a apptData object for the data to be run through the createAppt() method
    //running the object's createAppt() method to create the appointment in the database.
    $newAppt->createAppt();
    header("Location: ../patientapptlist.php?error=none");
}