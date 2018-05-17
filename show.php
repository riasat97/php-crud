<?php 
  require_once("dbcon.php");
  session_start();
  $id=$_GET['id'];
  $sql="select * from users where id=$id";
  $res=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($res);
  echo "name: ".$row['name']."<br>";
  echo "email: ".$row['email']."<br>";
  echo $_SESSION["username"];
?>