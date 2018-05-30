<?php require 'config.php'; 

if(isset($_SESSION["username"])){
        $stmt = $conn->prepare('SELECT * FROM `user` WHERE `password` = ?');
        $stmt->bind_param('s', $_SESSION["username"] );
        $stmt->execute();
        $result = $stmt->get_result();
        $myrow = $result->fetch_assoc();

        $uid = $myrow['id'];
        $stmt = $conn->prepare('UPDATE `cart` SET `status`= 2 WHERE `userid` = ?');
        $stmt->bind_param('i', $uid);
        $stmt->execute();
        header('Location: cart.php');
}else{
    header('Location: login.php');
}
?>