<?php 
setcookie('username','value', '0','/','localhost',true, true);
session_start();
header( "Set-Cookie: name=value; httpOnly" );

include 'connection.php';

if (!$_SESSION) {
	header("Location: login.php");
	exit();
}

$id = $_SESSION['id'];

$query = "SELECT Teacher_Name, data FROM LOGIN_PATCH WHERE Teacher_ID=$id";
$result = mysqli_query($con, $query);
$name = mysqli_fetch_assoc($result);

echo '<center>' ;
echo '<br>';
echo '<br>';
echo '<br>';
echo '<h1> WELCOME &nbsp  '.$name['Teacher_Name'].'<br> </h1>';
echo '<h2> LIVE STATUS: '.$name['data'].'<br> </h2>';

?>
<div style="width: 300px; height: 200px;  padding: 20px; background: rgba(0%,0%,0%,0.2);">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	<br><p>
		<h3 align="center">SELECT STATUS</h3>
	 <select name="data" style="width: 100px; height: 30px;">
	<option value="BUSY">BUSY</option>
	<option value="AVAILABLE">AVAILABLE</option>
	<option value="other">OTHERS</option>
	</select>
	<br>
	<br>

	<center><input type="submit" name="submit" value="submit"></p></center>
</form>
</div>
<?php  
if(isset($_POST['submit']))
{
	$data = htmlspecialchars($_POST['data']);
	if($data==""){
		echo "Enter a valid status";
	}
	else if($data=="other")
	{
		echo '<br>';
		echo "<form action=\"data.php\" method=\"POST\">
Enter Status: <input  type=\"text\" name=\"data\">
<input type=\"submit\" name=\"submit\" value=\"submit\">
</form>";
	}
	else{
    $sql = "UPDATE LOGIN_PATCH SET data='$data' WHERE Teacher_ID=$id";

	if (mysqli_query($con, $sql)) {
    header("Location: data.php");
	} else {
    echo "Error updating record: " . $con->error;
	}
	
	}
}
echo '</center>';
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		p {
			color: blue;
		}
		body{
			background-image: url('green.jpg');
		}
	</style>
</head>
<body>
<p align="right"><a href="logout.php">Logout</a></p>
</body>
</html>
