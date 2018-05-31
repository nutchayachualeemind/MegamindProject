<?php require 'config.php'; ?>
<?php require $header; ?>
<?php require $nav; ?>

<?php
$error = false;
$success = false;
if(isset($_SESSION["username"])){
    if($_SESSION["type"]!=0) header('Location: login.php');
}else{
    header('Location: login.php');
}

if(isset($_FILES["fileToUpload"])&&isset($_POST["pname"])&&isset($_POST["pprice"])&&isset($_POST["pbrand"])){
    $result = $conn->query('SELECT * FROM shop ORDER BY ID DESC LIMIT 1');
    $row = $result->fetch_assoc();
    $last = $row['id']+1;


    $imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION));
    $pname = $_POST["pname"];
    $pprice = $_POST["pprice"];
    $pbrand = $_POST["pbrand"];
    $img = $last.'.'.$imageFileType;
    $target_file = $imgDirUpload.'/'.$img;
    $stmt = $conn->prepare('INSERT INTO `shop`( `name`, `price`, `brand`, `img`) VALUES (?,?,?,?)');
    $stmt->bind_param('siss', $pname, $pprice, $pbrand, $img);
    $stmt->execute();
    $success = true;
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'] . $target_file);
}

?>

<br/>
<div class="container block">
    <div class="text">
        <span alt="New Arrivals">Add new product</span>
    </div>
    <form action="addproduct.php" method="post" enctype="multipart/form-data">
        Product image :
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <hr/> Product name :
        <input type="text" name="pname" required>
        <hr/> Product price :
        <input type="number" name="pprice" required>
        <hr/> Product brand :
        <input type="text" name="pbrand" required>
        <hr/>
        <center>
        <?php if($error) echo '<h5 style="color:red">**Error please try again later.**</h5>' ?>
        <?php if($success) echo '<h5 style="color:#4CAF50">Upload success</h5>' ?>
            <button type="submit" class="registerbtn"><i class="fas fa-plus-circle"></i> Add</button>
        </center>
    </form>
</div>
<br/>
<?php require $footer; ?>