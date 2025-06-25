<?php
/*start/continue a session to make sure we have access to the session variables (userid and useruid) -- as this page of code does not include the header.php file
the session must be started/continued on this page to access the global variables*/
session_start();

//telling PHP not to display any errors on this page and telling the client that all data arriving to this page is JSON.

ini_set('display_errors', '0');
header('Content-Type: application/json');

include "../classes/dbh.class.php";
include "../classes/availabilities.class.php";
include "../classes/availabilities-view.class.php";
include "../classes/availabilities-ctrl.class.php";

    //$id and $uid are determine by the active session user
    $id = $_SESSION["userid"];
    $name = $_SESSION["useruid"];

    //Retrieving the JSON data sent by the book button's _POST
    $rawApptStart = json_decode(file_get_contents('php://input'), true);
    $apptStart = $rawApptStart['appt_start'];

    $newAppt = new AvailabilitiesCtrl($id, $name, $apptStart); //creating an availabilitiesCtrl object for the data to be run through the createAppt() method
    //running the object's createAppt() method to create the appointment in the database.
    $newAppt->createAppt();
