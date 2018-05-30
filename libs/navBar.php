<?php 
$admin = false;
$ratio1 = 25;
$ratio2 = 34;
$login = false;
if(isset($_SESSION["username"])&&isset($_SESSION["type"])){
  $login = true;
  if($login) $ratio1 = 33;
  if($_SESSION["type"]==0){
    $admin = true;
    $ratio1 = 25;
    $ratio2 = 25;
  } 
}
?>

<header class="logo" alt="logoname">
  <img src="<?php echo $imgDir ?>/logo.png" alt="logopic">
</header>
<div class="topMenu">
  <a href="index.php" style="width:<?php echo $ratio1; ?>%"><i class="fas fa-home"></i> Home</a>
  <a href="cart.php" style="width:<?php echo $ratio1; ?>%"><i class="fas fa-shopping-cart"></i> Cart</a>
  <?php if(!$login) {?><a href="login.php" style="width:25%"><i class="fas fa-sign-in-alt"></i> Login</a> <?php } ?>
  <?php if(!$login) {?><a href="register.php" style="width:25%"><i class="fas fa-user"></i> Register</a><?php } ?>
  <?php if($login&&$admin) {?><a href="addproduct.php" style="width:25%"><i class="fas fa-plus-circle"></i> Add product</a> <?php } ?>
  <?php if($login) {?><a href="logout.php" style="width:<?php echo $ratio2; ?>%"><i class="fas fa-sign-out-alt"></i> Logout</a> <?php } ?>
</div>