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
      <img src="/images/dogtena.png" alt="Logo" width="50" height="48">
      <a class="navbar-brand" href="#">AgendaCare</a>
    </div>
    <div class="navbar-header">
      <ul class="navbar-nav">
        <li class="active nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Healthcare Providers</a></li>
        <li class="nav-item"><a class="nav-link" href="#">My appointments</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Invoices & Payments</a></li> <!-- this link is decorative -->
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
          }else{
        ?>
        <li class="nav-item"><a href="#"><span class="glyphicon glyphicon-user"></span>SIGN UP</a></li>
        <li class="nav-item"><a href="#" class="header-login-a"><span class="glyphicon glyphicon-Login"></span>LOGIN</a></li>
        <?php
        }
        ?>
      </ul>
    </div> 
  </div>
</nav>
</head>