<?php 
$con=mysqli_connect("localhost","root","","totho");
if(mysqli_connect_error()){
	die("can't connect to db :".mysqli_connect_errno());
}
$sql="create table if not exists users(id int(11) auto_increment primary key,name varchar(20),email varchar(20),password varchar(20),age numeric(2,0),gender varchar(6))";
$res=mysqli_query($con,$sql);
?>