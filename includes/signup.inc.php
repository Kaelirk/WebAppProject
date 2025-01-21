<?php

if(isset($_POST["submit"])){

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

    // Instantiating SignupCtrl Class by including both the class and the controller found in the files indicated below.
    include "../classes/signup.class.php";
    include "../classes/signup-ctrl.class.php";
    $signup = new SignupCtrl($uid, $pwd, $pwdrepeat, $email); //this code creates an object using the included files above and the data provided by the users.
    // Running error handlers and user signup


    // Going back to front page

}