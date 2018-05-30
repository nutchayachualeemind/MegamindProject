<?php require 'config.php'; 

if(isset($_SESSION["username"])){
    if(isset($_GET['pid'])){
        $stmt = $conn->prepare('SELECT * FROM `user` WHERE `password` = ?');
        $stmt->bind_param('s', $_SESSION["username"] );
        $stmt->execute();
        $result = $stmt->get_result();
        $myrow = $result->fetch_assoc();

        $pid = $_GET['pid'];
        $uid = $myrow['id'];
        $stmt = $conn->prepare('DELETE FROM `cart` WHERE `userid` = ? AND `id` = ?');
        $stmt->bind_param('ii', $uid,$pid);
        $stmt->execute();
        header('Location: cart.php');
    }
}else{
    header('Location: login.php');
}
?>