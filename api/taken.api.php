<?php   

/*telling PHP not to display any errors on this page and telling the client that all data coming from this page is JSON.
this was necessary because taken.php api kept failing to run properly due to these two issues.*/
ini_set('display_errors', '0');
header('Content-Type: application/json');

//including all the class files necessary to run the code below.
include "../classes/dbh.class.php";
include "../classes/availabilities.class.php";
include "../classes/availabilities-view.class.php";

$view = new AvailabilitiesView();
// getTaken() returns an associate array, the code below separates out the DATETIME data necessary and removes the rest.
$takenRows = $view->getTaken(); //assigning the associative arrays to $takenRows.
$takenAppts = array_column($takenRows, 'appt_start'); //Extracts the DATETIME values.

echo json_encode($takenAppts);//echo the result of converting the PHP array values into an array of JSON strings.
exit;

