<?php
//check if a user has pressed a submit button and assigns the submitted values to properties
if(isset($_POST["submit"])){

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    // Creates a signupCtrl object
    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-ctrl.class.php";
    $signup = new SignupCtrl($uid, $pwd, $pwdrepeat, $email); //this code creates an object using the included files above and the data provided by the users.
    // Running error handlers and user signup
    $signup->signupUser();

    // Going back to front page
    header("location ../Views/index.php?error=none");
}