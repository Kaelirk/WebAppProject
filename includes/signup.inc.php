<?php
//check if a user has pressed a submit button and assigns the submitted values to properties
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //htmlspecialchars is used to convert any special characters into html entities (e.g "<" becomes "&lt") for safety reasons
    $uid = htmlspecialchars($_POST['uid'], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST['pwd'], ENT_QUOTES, 'UTF-8');
    $pwdrepeat = htmlspecialchars($_POST['pwdrepeat'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $pro = isset($_POST['pro']) ? 1: 0;
    

    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-ctrl.class.php";
    $signup = new SignupCtrl($uid, $pwd, $pwdrepeat, $email,$pro); //this code creates an object using the included files above and the data provided by the users.
    // Running error handlers and usersignup
    $signup->signupUser();
    //if signupUser() runs successfully, the fetched users_id from the database is assigned to $userId
    $userId = $signup->fetchUserId($uid);

    //Instantiate profileInfoCtrl class by using the userId fetched above and fill the profile we the default data from profileinto-ctrl.class.php
    include "../classes/profileinfo.class.php";
    include "../classes/profileinfo-ctrl.class.php";
    $profileInfo = new ProfileInfoCtrl($userId, $uid);
    $profileInfo->defaultProfileInfo();//runs the defaultProfileInfo() method to fill the profile with placeholder data

    // Starting the new user's session and going to the profile page
    session_start();
    $_SESSION['userid'] = $userId;
    $_SESSION['useruid'] = $uid;
    header("Location: ../profile.php?error=none");
}