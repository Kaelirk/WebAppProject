<?php
  include_once "header.php";
  
  ?>
<!-- this page contains the HTML and Boostrap layout/design for the index page. It includes the header.php file via the include_once expression-->
<body class="bg-secondary-subtle">
<section class="index-login d-flex justify-content-center align-items-center min-vh-100">
  <div class="index-login-bg bg-secondary d-inline-flex p-3 rounded-5">
    <div class="wrapper d-flex flex-column justify-content-center align-items-center">
      <div class="index-login-signup">
        <h4>SIGN UP</h4>
        <p>Don't have an account with us yet?</p>
        <form action="includes/signup.inc.php" method="post">
            <input id="signup" class="rounded mb-1" type="text" name="uid" placeholder="Username"><br>
            <input class="rounded mb-1" type="password" name="pwd" placeholder="Password"><br>
            <input class="rounded mb-1" type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
            <input class="rounded mb-1" type="text" name="email" placeholder="E-mail"><br>
            <label class="rounded mb-1" for="pro">I am a health care professional: </label>
            <input class="rounded mb-1" type="checkbox" name="pro" value="1"><br>
           <button class="rounded mb-1" type="submit" name="submit">SIGN UP</button>
       </form>
     </div>
     <div class="index-login-login">
        <br><br>
       <h4>LOGIN</h4>
       <p>Already have an account? Login here!</p>
        <form action="includes/login.inc.php" method="post">
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




