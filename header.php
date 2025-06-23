<?php
  /*the session_start() method is used here to save variables as global variables accessible to all pages with the same active session.
  As the header is included in every page users will have access to, the very first line of code will be the session_start() method, which will
  maintain the same session across all pages.*/
  session_start();
  ?>
<!-- This page contains the HTML and bootstrap design/layout for the header. This file is separate from the index.php file as it allows
 for the header to be included on any page that requires it without needing to have the same code written out multiple times. 
 The header includes a horizontal navbar list across the top of the page along with login/signup or useruid/logout buttons-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- Bootstrap was chosen as it provides easy to use style classes that can be integrated straight into the HTML -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="/images/hospital.png" alt="Logo" width="48" height="48">
      <a class="navbar-brand" href="#">AgendaCare</a>
    </div>
    <div class="navbar-header">
      <ul class="navbar-nav">
        <!-- the home button on the navbar loads the login page when no session is active and loads the profile page when a session is active -->
        <li class="active nav-item"><a class="nav-link" <?php if(isset($_SESSION["userid"])){
        ?>href="profile.php"<?php }else{?> href="index.php"<?php }?>>Home</a></li> 
        <?php /*the PHP placed here is aimed at changing the navbar based on who is logged in. A patient will see availabilies, their appointments and invoices.
        The administrator/physiotherapist will see their agenda.*/
          if($_SESSION["userid"] != "1"){
        ?>
        <li class="nav-item"><a class="nav-link" href="availabilities.php">Availabilities</a></li>
        <li class="nav-item"><a class="nav-link" href="patientapptlist.php">My appointments</a></li>
        <?php }else{ ?>
        <li class="nav-item"><a class="nav-link" href="physioagenda.php">My agenda</a></li>
        <?php } ?>
        <li class="nav-item"><a class="nav-link" href="Invoices.php">Invoices & Payments</a></li> <!-- this page is pretty much just here to populate the navbar -->
      </ul>
    </div>
    <div class="navbar-header">
      <ul class="nav flex-column"> 
        <!-- The code below checks if the session global variable called "userid" is set, in which case it will load the useruid and a logout button. Otherwise it loads login/signup buttons -->
        <?php
          if(isset($_SESSION["userid"])){
        ?>
        <li class="nav-item"><a href="profile.php"><img src="images/person-lines-fill.svg" alt="Bootstrap" width="24" height="24"><?php echo $_SESSION["useruid"];?></a></li> 
        <li class="nav-item"><a href="includes/logout.inc.php" class="header-login-a"><button type="button" class="btn btn-primary btn-sm">LOGOUT</button></a></li>
        <?php
          }
        ?>
      </ul>
    </div> 
  </div>
</nav>
</head>