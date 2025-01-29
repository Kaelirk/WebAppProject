<?php
  //include '../includes/class-autoload.inc.php';
  session_start();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link href="styles.css" rel="stylesheet">

<nav class="navbar bg-body-tertiary bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="/images/dogtena.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
      PhysioLink
    </a>
  </div>
  <ul class="main-menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="#">Healthcare Providers</a></li>
    <li><a href="#">My appointments</a></li>
    <li><a href="#">Invoices & Payments</a></li>
  </ul>
  <ul class="navbar-membermenu">
    <?php
      if(isset($_SESSION["userid"])){
    ?>
    <li><a href="#"><?php echo $_SESSION["useruid"];?></a></li>
    <li><a href="../includes/logout.inc.php" class="header-login-a">LOGOUT</a></li>
    <?php
      }else{
    ?>
    <li><a href="#">SIGN UP</a></li>
    <li><a href="#" class="header-login-a">LOGIN</a></li>
    <?php
    }
    ?>
  </ul>
</nav>
  <title>PhysioLink</title>
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

  <?php
    // $usersObj= new UsersView();
    // $usersObj->showUser('John');

    // $usersObj2= new UsersCtrl();
    // $usersObj2->createUser('Stevie', 'Wonder', '2026-09-06');

    // $userObj3= new UsersView();
    // $userObj3->showUsers();

  ?>
</body>
</html>




