<!DOCTYPE html>
<html>
<head>
	<br>
<h1 align="center">STUDENT VIEW - TEACHER STATUS PORTAL</h1>	
</head>
<body>
	<style type="text/css">
	body{
		background-image: url(green.jpg);
	} 
</style>>

</body>
<div style="width: 250px; height: 200px;  margin: auto; padding-top: 20px; background: rgba(0%,0%,0%,0.2);">
<form name="Teacher" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<p align="center">
<h4 align="center" style="color: white; align-content: center;">SELECT TEACHER</h4> 
<select name="ID" style="width: 180px; height: 60px; margin: 20PX; background: rgba(0%,0%,0%,0.2);">
	<option value="101">SELECT AN OPTION</option>
  
   <option value="101">Pushpa Mamoria</option>
   <option value="102">Akhilesh Singh Sir</option>
   <option value="103">Shekhar Verma Sir </option>
   <option value="104">Mamata Panda</option>
</select>
<br>
<center><input type="submit" name="submit" value="Search"/></center>
</p>
</form>
</div>
</html>

<?php 
setcookie('username','xss', '0','/','localhost',true, true);
header( "Set-Cookie: name=value; httpOnly" );

include 'connection.php';
if(isset($_POST['submit']))
{
$a = htmlspecialchars($_POST['ID']);
$query = "SELECT Teacher_Name, data FROM LOGIN_PATCH WHERE TEACHER_ID=$a";
$result = mysqli_query($con, $query);
$info = mysqli_fetch_assoc($result);
echo '<br>';
echo '<br>';
echo "<center><h1>TEACHER ".$info['Teacher_Name']." IS ".$info['data'].'</h1>'.'</center>';
}
?>