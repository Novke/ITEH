<!DOCTYPE html>
<html>
<head>
  <title>Trio Gym</title>
  <style>
    /* CSS for styling the logo */
    .logo {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .logo img {
      width: 50%;
    }
  </style>
</head>
<body>
  <div class="logo">
    <img src="trio-gym-logo.png" alt="Trio Gym Logo">
  </div>

  <div class="login-form">
    <form action="login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username">
      <br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <br><br>
      <input type="submit" value="Login">
    </form> 
  </div>
</body>
</html>
