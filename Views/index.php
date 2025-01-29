<?php
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
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
    <div class="navbar-heaader">
      <ul class="nav navbar">
        <?php
          if(isset($_SESSION["userid"])){
        ?>
        <li><a href="#"><span class="glyphicon glyphicon-user"><?php echo $_SESSION["useruid"];?></a></li>
        <li><a href="../includes/logout.inc.php" class="header-login-a"><span class="glyphicon glyphicon-Logout"></span>LOGOUT</a></li>
        <?php
          }else{
        ?>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>SIGN UP</a></li>
        <li><a href="#" class="header-login-a"><span class="glyphicon glyphicon-Login"></span>LOGIN</a></li>
        <?php
        }
        ?>
      </ul>
    </div> 
  </div>
</nav>
</head>
<body>  

<section class="index-login">
  <div class="wrapper">
    <div class="index-login-signup">
      <h4>SIGN UP</h4>
      <p>Don't have an account yet? Sign up here!</p>
      <form action="../includes/signup.inc.php" method="post">
          <input type="text" name="uid" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
          <input type="password" name="pwdrepeat" placeholder="Repeat Password">
          <input type="text" name="email" placeholder="E-mail">
          <br>
          <button type="submit" name="submit">SIGN UP</button>
      </form>
    </div>
    <div class="index-login-login">
      <h4>LOGIN</h4>
      <p>Don't have an account yet? Sign up here!</p>
      <form action="../includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <br>
        <button type="submit" name="submit">LOGIN</button>
      </form>
    </div>
  </div>

</section>
</body>
</html>




