<?php
  require_once("dbcon.php");
  session_start();
  if(isset($_GET)&&!empty($_GET)){
	  $id=$_GET['id'];
	  $sql="select * from users where id=$id";
	  $res=mysqli_query($con,$sql);
	  $row=mysqli_fetch_assoc($res);
  }
  if(isset($_POST) && !empty($_POST)){
	  $id=$_GET['id'];
	  $name=$_POST['name'];
	  $email=$_POST['email'];
	  $password=md5($_POST['password']);
	  $confirm=$_POST['confirm_password'];
	  $age=$_POST['age'];
	  $gender=$_POST['gender'];
	  $sql="update users set name='$name',email='$email',password='$password',gender='$gender',age='$age' where id=$id";
	  $res=mysqli_query($con,$sql);
	  $_SESSION["username"]=$_POST['name'];
	  if($res){
		  header("location:show.php?id=$id");
	  }
	  else echo "false";
  }
?>
<!DOCTYPE html>
<html>
 <head><title>totho</title></head>
 <body>
   <form method="post" name="form">
   name :<br>
   <input type="text" name="name" value="<?php echo $row['name']?>"><br>
   email:<br>
   <input type="text" name="email" value="<?php echo $row['email']?>"><br>
   password:<br>
   <input type="password" name="password" value=""><br>
   confirm:<br>
   <input type="password" name="confirm_password" value=""><br>
   gender:<br>
   <input type="text" name="gender" value="<?php echo $row['gender']?>"><br>
   age:<br>
   <input type="text" name="age" value="<?php echo $row['age']?>"><br><br>
   
   <input type="submit" name="save">
   </form>
 </body>
</html>