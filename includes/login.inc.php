<?php
//check if a user has pressed a submit button and assigns the submitted values to properties
if(isset($_POST["submit"])){

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    // Creates a signupCtrl object
    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-ctrl.class.php";
    $login = new LoginCtrl($uid, $pwd); //this code creates an object using the included files above and the data provided by the users.

    // Running error handlers and user signup
    $login->loginUser();

    // Going back to front page
    header("Location: ../Views/index.php?error=none");
}