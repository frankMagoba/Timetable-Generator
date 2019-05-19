<?php
session_start();
if(isset($_SESSION['user_id'])){
     header("Location:manufacturer.php");
}
require_once 'DBconn.php';
if(isset($_POST['username'],$_POST['user_password'])){
    $username=$_POST['username'];
    $password=$_POST['user_password'];
    $manageDb = new DatabaseConnection();
    $conn = $manageDb->connection();
  $query="SELECT user_id FROM users where username='$username' and user_password='$password'";
  $result1 = $conn->query($query);
  $row2= $result1->fetch_assoc();
  if(count($row2)==0){
      $_SESSION['message1']='Invalid Username or password';
  }
  else if(count($row2)==1){
      $_SESSION['user_id']=$row2['user_id'];
  header("Location:manufacturer.php");
  exit();
  }
  
    
}
  ?>