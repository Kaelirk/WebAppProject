<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="/images/dogtena.png" alt="Logo" width="50" height="48">
      <a class="navbar-brand" href="#">PhysioLink</a>
    </div>
    <div class="navbar-header">
      <ul class="navbar-nav">
        <li class="active nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Healthcare Providers</a></li>
        <li class="nav-item"><a class="nav-link" href="#">My appointments</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Invoices & Payments</a></li>
      </ul>
    </div>
    <div class="navbar-header">
      <ul class="nav flex-column">
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