<?php 
include('server.php') 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>Water Billing System</title>
  </head>
  <body>
    <div class="SysName">Water Billing System</div>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Welcome</span></div>

        <form method="post" action="login.php">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="email" placeholder="Email" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div class="row button">
            <input type="submit" value="Login" name="login_user">
          </div>
        </form>
        <?php if($error) { ?>
        <script> alert ("Wrong email and/or password")</script>
        <?php } ?>
  </body>
</html>
