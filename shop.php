<?php require 'config.php'; ?>
<?php require $header; ?>
<?php require $nav; ?>

<?php 
    $result = $conn->query('SELECT * FROM `shop`');
?>

<br/>
<div class="container block">
  <div class="text">
    <span alt="New Arrivals">All shoes</span>
  </div>
  <div class="show">
    <?php while($row = $result->fetch_assoc()){ ?>
    <div class="card">
    <center><img src="<?php echo $imgDir ?>/Shoes/<?php echo $row['img']?>"/></center>
      <h3><?php echo $row['brand']?> <?php echo $row['name']?></h3>
      <div class="price">
        <?php echo $row['price']?> THB
      </div>
      <button class="shopBtn"  onclick="location.href = 'gettocart.php?pid=<?php echo $row['id']; ?>'">
        <i class="fas fa-shopping-cart"></i> Add to cart
      </button>
    </div>
    <?php } ?>
  </div>
</div>
<br/>
<?php require $footer; ?>