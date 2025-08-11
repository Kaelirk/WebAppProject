<?php
//check if a user has pressed a submit button and assigns the submitted values to properties
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $uid = htmlspecialchars($_POST['uid'], ENT_QUOTES, 'UTF-8');
    $pwd = htmlspecialchars($_POST['pwd'], ENT_QUOTES, 'UTF-8');

    // Creates a LoginCtrl object
    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-ctrl.class.php";
    $login = new LoginCtrl($uid, $pwd); //this code creates an object using the included files above and the data provided by the users.

    // Running error handlers and user login
    $login->loginUser();

    // Going back to front page
    header("Location: ../profile.php?error=none", true, 303);

}