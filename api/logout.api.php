<?php
//continuing session with a session_start() method as this page does not include the header.php file
session_start();
//unsetting/clearing all the global variables and cookies of the session without ending the session.
session_unset();
//destroying the session itself.
session_destroy();

//return to homepage
header("Location: ../index.php?error=none");