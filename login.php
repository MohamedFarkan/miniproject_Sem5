<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="login.css" />
  <title>Document</title>


<body>
  <div class="box">
    <form action="login.php" method="post">
      <h2>Login</h2>
      <div class="inputbox">
        <input type="text" required="required" />
        <span>Username</span>
        <i></i>
      </div>
      <div class="inputbox">
        <input type="password" required="required" />
        <span>Password</span>
        <i></i>
      </div>
      <div class="links">
        <a href="#">Forgot password?</a>
        <a href="http://127.0.0.1:5500/signup.html">New user?</a>
      </div>
      <input type="submit" value="Login" />
    </form>
  </div>
</body>

</html>
<?php
if (isset($_POST["submit"])) {
  $username = $_POST['user']; // get the username from form data
  $password = $_POST['password']; // hash and store it in database

}
?>