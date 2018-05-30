<?php require 'config.php'; ?>
<?php require $header; ?>

<?php 
$repass = false;
$sucess = false;
$already = false;
if(isset($_POST["username"])&&isset($_POST["psw"])&&isset($_POST["psw-repeat"])){
  if($_POST["psw"]==$_POST["psw-repeat"]){
    $user = $_POST["username"];
    $pass = $_POST["psw"];
    $pass = md5($pass);

    $stmt = $conn->prepare('SELECT * FROM `user` WHERE `username` = ?');
    $stmt->bind_param('s', $user);
    $stmt->execute();
    if($stmt->fetch()){
      $already = true;
    }else{
      $stmt = $conn->prepare('INSERT INTO user (username, password, type) VALUES (?, ?, 1)');
      $stmt->bind_param('ss', $user, $pass);

      $stmt->execute();
      $sucess = true;
    }


    $stmt->close();
  }else{
    $repass = true;
  }
}
?>

<form action="register.php" method="post">
  <div class="container">
    <center>
      <h1>Register</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <?php if($sucess) echo '<h5 style="color:#4CAF50">Create account success.</h5>' ?>
      <label for="username">
        <b>Username</b>
      </label>
      <input class="in" type="text" placeholder="Enter Username" name="username" required>
      <br>
      <label for="psw">
        <b>Password</b>
      </label>
      <input class="in" type="password" placeholder="Enter Password" name="psw" required>
      <br>
      <label for="psw-repeat">
        <b>Repeat Password</b>
      </label>
      <input class="in" type="password" placeholder="Repeat Password" name="psw-repeat" required>
      <hr>
      <?php if($already) echo '<h5 style="color:red">**This username was already. Please try others username or try to <a href="login.php">login</a>.**</h5>' ?>
      <?php if($repass) echo '<h5 style="color:red">**Password and Re-password mismatch please try again.**</h5>' ?>
      <button type="button" onclick="location.href = 'index.php';" class="registerbtn">Back</button> <button type="submit" class="registerbtn">Register</button>
    </center>
  </div>

  <div class="container signin">
    <p>Already have an account?
      <a href="login.php">Sign in</a>.</p>
  </div>
</form>