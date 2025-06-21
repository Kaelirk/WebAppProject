<?php
/*start/continue a session to make sure we have access to the session variables (userid and useruid) -- as this page of code does not include the header.php file
the session must be started/continued on this page to access the global variables*/
session_start();
//Check this page was accessed by submitting a form.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
}