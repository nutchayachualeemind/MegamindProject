<?php

  $username = "";
  $errors = array();
  //connect to the database
  $db = mysqli_connect('localhost','root','registration');

  //if the register btn is clicked
  if(isset($_POST['register'])){
    $username = mysqli_real_escap_string($_POST['username']);
    $password_1 = mysqli_real_escap_string($_POST['password_1']);
    $password_2 = mysqli_real_escap_string($_POST['password_2']);

    //ensure that form field are filled properly
    if(empty($username)){
      array_push($errors,"Username is required");
    }
    if(empty($password_1)){
      array_push($errors,"Password is required");
    }
    if($password_1 != $password_2){
      array_push($errors,"The two passwords don't match");
    }

    //if threr are no errors,save user to database
    if(count($errors)==0){
      $password = md5($password_1);
      $sql = "INSERT INTO user(username,password)
          VALUES ('$username','$password')";
      mysqli_query($db,$sql);
    }
  }




?>
