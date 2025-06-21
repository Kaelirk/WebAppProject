<?php
/*start/continue a session to make sure we have access to the session variables (userid and useruid) -- as this page of code does not include the header.php file
the session must be started/continued on this page to access the global variables*/
session_start();
//Check if we access this page by submitting the update form.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //$id and $uid are determine by the active session user
    $id = $_SESSION["userid"];
    $uid = $_SESSION["useruid"];
    //$introTile, $introText and $about are filled by the data posted by the user via the update form.
    $introTitle = htmlspecialchars($_POST['introtitle'], ENT_QUOTES, 'UTF-8');
    $introText = htmlspecialchars($_POST['introtext'], ENT_QUOTES, 'UTF-8');
    $about = htmlspecialchars($_POST['about'], ENT_QUOTES, 'UTF-8');
    
    include "../classes/dbh.class.php";
    include "../classes/profileinfo.class.php";
    include "../classes/profileinfo-ctrl.class.php";
    $profileInfo = new ProfileInfoCtrl($id, $uid);//setting $profileInfo as a new ProfileInfoCtrl object

    $profileInfo->updateProfileInfo($about, $introTitle, $introText); //The new object passes data through the updateProfileInfo() method.

    header("Location: ../profile.php?error=none");
}