<?php require 'config.php'; ?>
<?php require $header; ?>

<form>
  <div class="container">
    <h1>Login</h1>
    <p>Please fill in this form to login an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="text" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>

    <hr>

    <button type="submit" class="registerbtn">Login</button>
  </div>

  <div class="container signin">
    <p>Don't have an account? <a href="#">Register</a>.</p>
  </div>
</form>
