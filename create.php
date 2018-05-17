<?php
  require_once("dbcon.php");
  session_start();
  if(isset($_POST) && !empty($_POST)){
	  $name=$_POST['name'];
	  $email=$_POST['email'];
	  $password=md5($_POST['password']);
	  $confirm=$_POST['confirm_password'];
	  $age=$_POST['age'];
	  $gender=$_POST['gender'];
	  $sql="insert into users(name,email,password,gender,age)values('$name','$email','$password','$gender','$age')";
	  $res=mysqli_query($con,$sql);
	  $id=mysqli_insert_id($con);
	  $_SESSION["username"]=$_POST['name'];
	  if($res){
		  header("location:show.php?id=$id");
	  }
	  else echo "false";
  }
?>
<!DOCTYPE html>
<html>
 <head><title></title></head>
 <body>
   <form method="post" name="form">
   name :<br>
   <input type="text" name="name" value=""><br>
   email:<br>
   <input type="text" name="email" value=""><br>
   password:<br>
   <input type="password" name="password" value=""><br>
   confirm:<br>
   <input type="password" name="confirm_password" value=""><br>
   gender:<br>
   <select name="gender">
	<option value="1" selected>male</option>
	<option value="2">female</option>
	<option value="3">both</option>
   </select><br>
   age:<br>
   
    <input type="radio" name="age" value="18" checked> 18<br>
    <input type="radio" name="age" value="21"> 21<br>
   <input type="submit" name="save">
   </form>
 </body>
</html>