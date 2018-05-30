<?php require 'config.php'; ?>
<?php require $header; ?>

<?php 
$wrongPass = false;
if(isset($_POST["username"])&&isset($_POST["psw"])){
  $user = $_POST["username"];
  $pass = $_POST["psw"];
  $pass = md5($pass);

  $stmt = $conn->prepare('SELECT * FROM `user` WHERE `username` = ? AND `password` = ?');
  $stmt->bind_param('ss', $user,$pass);
  $stmt->execute();
  $result = $stmt->get_result();
  if($myrow = $result->fetch_assoc()){
    
    $_SESSION["username"] = $myrow['password'];
    $_SESSION["type"] = $myrow['type'];
    header('Location: index.php');
  }else{
    $wrongPass = true;
  }
  
  $stmt->close();
}
?>

<form action="login.php" method="post">
  <div class="container">
    <center>
      <h1>Login</h1>
      <p>Please fill in this form to login an account.</p>
      <hr/>

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

      <hr/>
      <?php if($wrongPass) echo '<h5 style="color:red">**Wrong password or username.**</h5>' ?>
      <button type="button" onclick="location.href = 'index.php';" class="registerbtn">Back</button>
      <button type="submit" class="registerbtn">Login</button>
    </center>
  </div>

  <div class="container signin">
    <p>Don't have an account?
      <a href="register.php">Register</a>.</p>
  </div>
</form>