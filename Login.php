<!doctype html>
<html>
<body style='background-image: url("bg3.jpg");'>
<?php
session_start();
$con=mysqli_connect("localhost","root","","kiran");
if(isset($_POST['login']))
   {
   if($con)
   {
$user_name=$_POST['username'];
$pwd=$_POST['password'];
$query="SELECT * FROM session WHERE username='".$user_name."' and password='".$pwd."' ";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0)
   {
while($row=mysqli_fetch_assoc($result))
   {
session_start();
$_SESSION['user_name']=$row['username'];
$_SESSION['user_role']=$row['role'];
header('location:dashboard.php');
   }
   }
else
  {
echo "<script>alert('invalid login')</script>";
  }
}
}
?>
<form action="login.php" method="post" style="padding:75px; margin: auto; text-align: center;">
<h2 style="color:white;">User name:<input type="text" name="username" ></h2><br><br>
<h2 style="color:white;">Password :<input type="password" name="password" ></h2><br><br>
<input type="submit" name="login" value="Login" style="background-color: #555555; font-size: 20px; padding:10px;">
<input type="reset" name="clear" value="Clear" style="background-color: #555555; font-size: 20px; padding:10px;">
</form>
</body>
</html>
