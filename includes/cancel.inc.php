<?php
/*start/continue a session to make sure we have access to the session variables (userid and useruid) -- as this page of code does not include the header.php file
the session must be started/continued on this page to access the global variables*/
session_start();

//telling PHP not to display any errors on this page and telling the client that all data arriving to this page is JSON.

ini_set('display_errors', '0');
header('Content-Type: application/json');

include "../classes/dbh.class.php";
include "../classes/bookings.class.php";
include "../classes/bookings-view.class.php";
include "../classes/bookings-ctrl.class.php";

    //$name is determine by the active session user
    

    //Retrieving the JSON data sent by the cancel button's _POST
    $rawApptData = json_decode(file_get_contents('php://input'), true);
    $apptStart = $rawApptData['appt_start'];
    $name = $rawApptData['name'];

    $cancellation = new bookingsCtrl($name, $apptStart); //creating an bookingsCtrl object for the data to be run through the cancelBooking() method
    //running the object's cancelBooking() method to dekete the appointment from the database.
    $cancellation->cancelBooking();
