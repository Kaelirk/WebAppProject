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
  </div>
</nav>
</head>
<!-- this page contains the HTML and Boostrap layout/design for the index page. It includes the header.php file via the include_once expression-->
<body class="bg-secondary-subtle">
  <section class="index-welcome d-flex flex-column justify-content-center align-items-center text-center">
    <br><br><br><br>
    <h2>Welcome to AgendaCare!</h2>
    <p>Please Sign-up or login below.</p>
    <br><br><br>
  </section>
<section class="index-login d-flex justify-content-center align-items-start min-vh-100">
  <div class="index-login-bg bg-secondary d-inline-flex p-3 rounded-5">
    <div class="wrapper d-flex flex-column justify-content-center align-items-center">
      <div class="index-login-signup">
        <h4>SIGN UP</h4>
        <p>Don't have an account with us yet?</p>
        <form action="api/signup.api.php" method="post">
            <input id="signup" class="rounded mb-1" type="text" name="uid" placeholder="Name"><br>
            <input class="rounded mb-1" type="password" name="pwd" placeholder="Password"><br>
            <input class="rounded mb-1" type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
            <input class="rounded mb-1" type="text" name="email" placeholder="E-mail"><br>
            <label class="rounded mb-1" for="pro">I am a health care professional: </label>
            <input class="rounded mb-1" type="checkbox" id="pro" name="pro" value="1"><br>
           <button class="rounded mb-1" type="submit" name="submit">SIGN UP</button>
       </form>
     </div>
     <div class="index-login-login">
        <br><br>
       <h4>LOGIN</h4>
       <p>Already have an account? Login here!</p>
        <form action="api/login.api.php" method="post">
         <input id="login" class="rounded mb-1" type="text" name="uid" placeholder="Username"><br>
         <input class="rounded mb-1" type="password" name="pwd" placeholder="Password"><br>
         <button class="rounded mb-1" type="submit" name="submit">LOGIN</button>
       </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>




