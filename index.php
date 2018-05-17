<?php 
  require_once("dbcon.php");
  session_start();
  
  if(isset($_GET)&&!empty($_GET)){
	  $id=$_GET['id'];
	  $sql="delete from users where id=$id";
	  $res=mysqli_query($con,$sql);
	  if($res)
	  header("location:index.php");
	  else echo "can't delete";	
  }
  $sql="select * from users ";
  $res=mysqli_query($con,$sql);
 
  //echo "name: ".$row['name']."<br>";
  //echo "email: ".$row['email']."<br>";
  //echo $_SESSION["username"];
?>
<!DOCTYPE html>
<html>
 <head><title></title></head>
 <body>
   <table>
     <thead>
	 <tr>
	   <th>name</th>
	   <th>email</th>
	   <th>gender</th>
	   <th>age</th>
	   <th>action</th>
	   
	 </tr>
     </thead>
	 <?php while( $row=mysqli_fetch_assoc($res)) {?>
	 <tr>
	  <td><?php echo $row['name'] ;?></td>
	  <td><?php echo $row['email'] ;?></td>
	  <td><?php echo $row['gender'] ;?></td>
	  <td><?php echo $row['age'] ;?></td>
	  <td><a href="edit.php?id=<?php echo $row['id'] ;?>">edit</a></td>
	  <td><a href="index.php?id=<?php echo $row['id'] ;?>">delete</a></td>
	 </tr>
	 <?php }?>
   </table>
 </body>
</html>