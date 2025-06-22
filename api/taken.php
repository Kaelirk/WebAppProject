<?php   

/*telling PHP not to display any errors on this page and telling the client that all data coming from this page is JSON.
this was necessary because taken.php api kept failing to run properly due to this two issues.*/
ini_set('display_errors', '0');
header('Content-Type: application/json');

//requiring all the class files necessary to run the code below.
require_once __DIR__ . '/../classes/dbh.class.php';
require_once __DIR__ . '/../classes/availabilities.class.php';
require_once __DIR__ . '/../classes/availabilities-view.class.php';

$view = new AvailabilitiesView();
// getTaken() returns an associate array, the code below separates out the DATETIME data necessary and removes the rest.
$takenRows = $view->getTaken(); //assigning the associative arrays to $takenRows.
$takenSlots = array_column($takenRows, 'appt_start'); //Separating appt_start from DATETIME values.

echo json_encode($takenSlots);//echo the result of converting the PHP array values into an array of JSON strings.
exit;

