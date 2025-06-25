<?php   

/*telling PHP not to display any errors on this page and telling the client that all data coming from this page is JSON.
this was necessary because taken.php api kept failing to run properly due to these two issues.*/
ini_set('display_errors', '0');
header('Content-Type: application/json');

//including all the class files necessary to run the code below.
include "../classes/dbh.class.php";
include "../classes/bookings.class.php";
include "../classes/bookings-view.class.php";

$view = new BookingsView();
// getBookings() returns an associative array containing both DATETIME and name from the database.
$bookings = $view->getBookings();

echo json_encode($bookings);//echo the result of converting the PHP array values into an array of JSON strings.
exit;