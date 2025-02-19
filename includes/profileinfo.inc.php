<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = $_SESSION["userid"];
    $uid = $_SESSION["useruid"];
    $introTitle = htmlspecialchars($_POST['introtitle'], ENT_QUOTES, 'UTF-8');
    $introText = htmlspecialchars($_POST['introtext'], ENT_QUOTES, 'UTF-8');
    $about = htmlspecialchars($_POST['about'], ENT_QUOTES, 'UTF-8');

    include "../classes/dbh.class.php";
    include "../classes/profileinfo.class.php";
    include "../classes/profileinfo-ctrl.class.php";
    $profileInfo = new ProfileInfoCtrl($id, $uid);

    $profileInfo->updateProfileInfo($about, $introTitle, $introText);

    header("Location: ../profile.php?error=none");
}