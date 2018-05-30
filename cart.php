<?php require 'config.php'; ?>
<?php require $header; ?>
<?php require $nav; ?>

<?php 
    $amo = 0;
    if(!isset($_SESSION["username"])){
        header('Location: login.php');
    }

    $stmt = $conn->prepare('SELECT * FROM `user` WHERE `password` = ?');
    $stmt->bind_param('s', $_SESSION["username"] );
    $stmt->execute();
    $result = $stmt->get_result();
    $myrow = $result->fetch_assoc();
    $result = $conn->query('SELECT * FROM `cart` WHERE `userid` = "'.$myrow['id'].'" AND `status` = 1');
?>

<br/>
<div class="container block">
  <div class="text">
    <span alt="New Arrivals">Cart</span>
  </div>
  <div class="show">
    <?php while($row = $result->fetch_assoc()){ ?>
    <?php   
        $product = $conn->query('SELECT * FROM `shop` WHERE `id` = '.$row['productid']);
        $productrow = $product->fetch_assoc();
        $amo = $amo + $productrow['price'];
    ?>
    <div class="card">
      <img src="<?php echo $imgDir ?>/Shoes/<?php echo $productrow['img']?>"/>
      <h3><?php echo $productrow['brand']?> <?php echo $productrow['name']?></h3>
      <div class="price">
        <?php echo $productrow['price']?> THB
      </div>
      <button class="delBtn" onclick="location.href = 'delete.php?pid=<?php echo $row['id']; ?>'">
        <i class="fas fa-minus-circle"></i> delete
      </button>
    </div>
    <?php } ?>
  </div>
  <hr/>
  <h1>Amount : <?php echo $amo;?> Baht</h1>
  <hr/>
  <div>
    <center>
      <button class="btnshopall" onclick="location.href = 'buyall.php'">Buy all</button>
    </center>
  </div>
</div>
<br/>
<?php require $footer; ?>