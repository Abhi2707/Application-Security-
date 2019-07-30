<?php 
setcookie('username','xss', '0','/','localhost',true, true);
header( "Set-Cookie: name=value; httpOnly" );
session_start();3 	
session_destroy();
session_start();

if (isset($_POST['submit'])) {
	include "connection.php";
	$id = $_POST['id'];
	$pass =$_POST['password'];

	$query = "SELECT PASSWORD FROM LOGIN_PATCH WHERE TEACHER_ID=$id";
	$result = mysqli_query($con, $query);
    $password = mysqli_fetch_assoc($result);

    if($password['PASSWORD']==$pass){
    	$_SESSION['id']=$id;
    	header("Location: data.php");
        exit; 
     }
    else echo '<p>'.'Password Incorrect'.'</p>';
	
}
?>
<html>

<head>

	<style type="text/css">


		h1{

			color: white;

			background-color: black;

}
        button {

			line-height: 2;

			letter-spacing: 3;

		}
		body{
			background-image: url(cdn1.jpg);
			background-size: cover;
		}



		button:hover {

			background-color: black;

			color: white;

		}



		p{

			color: red;

		}

		.c5{

			border: 0px;

			

			width: 350px;

			height: 400px;

			margin: auto;

			align-content: center;

			margin-top: 100px;

	padding-top: 20px;

	border-style: solid;

	background: rgba(0%,0%,0%,0.2);





		}

		.c10{



	height: 80px;

	width: 80px;

	margin-top: 8px;



		}

		.c2{



	width: 65%;

	height: 30px;

	margin: 10px;

	

	color: black;

	font-size: 14px;

	padding: 3px;

	font-weight: bold;

	background: transparent;

	border: 1px solid black;





		}

		.c9{

	

	margin-top: 4px;

		}



	</style>

</head>



<div class="c1">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" align="center">


<center>	<img src="teacher.png" class="c8"></center>

<br>

<center><h2>TEACHER LOGIN </h2></center>

	<center><input class="c2" type="text" name="id" placeholder="Teacher_ID" autocomplete="off"></center><br>

	<center><input class="c2" type="password" name="password" placeholder="Password"></center><br>

	<center><button type="submit" name="submit">Submit</button></center>



</form>

</div>

</html>
<!--<html>
<head>
	<meta charset="utf-8"/>
	<style type="text/css">
		h1{
			color: white;
			background-color: black;
		}

		button {
			line-height: 2;
			letter-spacing: 3;
		}

		button:hover {
			background-color: black;
			color: white;
		}

		p{
			color: red;
		}

	</style>
</head>
<h1 align="center">Login Page</h1>
<form action="" method="post" align="center">

	Teacher_ID : <input type="text" name="id"><br><br>
	Password &nbsp&nbsp&nbsp: <input type="password" name="password"><br><br>
	<button type="submit" name="submit">Submit</button>

</form>
</html>