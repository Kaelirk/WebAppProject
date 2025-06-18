<?php
//check if a user has pressed a submit button and assigns the submitted values to properties
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //htmlspecialchars is used to convert any special characters into html entities (e.g "<" becomes "&lt") for safety reasons
    $uid = htmlspecialchars($_POST['uid'], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST['pwd'], ENT_QUOTES, 'UTF-8');
    $pwdrepeat = htmlspecialchars($_POST['pwdrepeat'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');

    // Creates a signupCtrl object
    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-ctrl.class.php";
    $signup = new SignupCtrl($uid, $pwd, $pwdrepeat, $email); //this code creates an object using the included files above and the data provided by the users.
    // Running error handlers and user signup
    $signup->signupUser();
    //if signupUser() runs successfully, the fetched $uid is assigned to $userId
    $userId = $signup->fetchUserId($uid);

    //Instantiate profileInfoCtrl class by using the userId fetched above and fill the profile we the default data from profileinto-ctrl.class.php
    include "../classes/profileinfo.class.php";
    include "../classes/profileinfo-ctrl.class.php";
    $profileInfo = new ProfileInfoCtrl($userId, $uid);
    $profileInfo->defaultProfileInfo();

    // Going back to front page
    header("Location: ../profile.php?error=none");
}