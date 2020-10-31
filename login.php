<!DOCTYPE html>
<?php
include("test/config.php");
$errors = array();
$message ='';

if(isset($_POST['submit'])) {
	$username = isset($_POST['username'])?$_POST['username']:'';
	$password = isset($_POST['password'])?$_POST['password']:'';
	$repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
	$email = isset($_POST['email'])?$_POST['email']:'';

	$q =  "SELECT * FROM users";
	$res = $conn->query($q);
	$cnt = mysqli_num_rows($res);

	if ($res->num_rows > 0) 
	{
		while($row = $res->fetch_assoc())
		{
			if($username == "admin" || $username == "Admin")
			{
				echo '<script>alert("Login Successful.....Welcome!!! Admin")</script>';
				echo '<script>window.location="test/index1.php"</script>';
				header('Location: test/index1.php');
			}
			if($username != "admin" || $username != "Admin")
			{
				if($cnt == 1){
					echo '<script>alert("Already Registerd Record !!!")</script>';
				}

				if($password != $repassword) {
					$errors[] = array('input'=>'password','msg'=>'Password doesnt match');
				}
				if(sizeof($errors) == 0){
					$sql = "INSERT INTO users (`username`, `password`, `email`) VALUES ('".$username."', '".$password."', '".$email."')";
					if ($conn->query($sql) === TRUE) {
					} else {
						$errors[] = array('input'=>'form', 'msg'=>$conn->error);
					}
				$conn->close();
				header('Location: test/index.php');
				}
			}
		}
	}
}
?>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="test/css/style1.css">
	
</head>
<body>
	<main>
	<div id="message">
		<?php echo $message; ?>
	</div>
	<div id= "errors">
		<?php if(sizeof($errors)>0) : ?>
			<ul>
			<?php foreach($errors as $err): ?>
				<li><?php echo $err['msg']; ?></li>
			<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
	
	<div id="wrapper">
		<div id="signup-form">
			<h1>Login</h1>
				<form action="" method="POST">
					<p>
						<label for="username" class="lab">Username: <input type="text" name="username" required id="inp"></label>
					</p>
					<p>
						<label for="password" class="lab">Password: <input type="password" name="password" required id="inp"></label>
					</p>
					<p>
						<label for="repassword" class="lab">Re-Password: <input type="password" name="repassword" required id="inp1"></label>
					</p>
					<p>
						<label for="email" class="lab">Email: <input type="email" name="email" required id="inp2"></label>
					</p>
					<p>
						<input type="submit" name="submit" value="Submit">
					</p>
				</form>
			</div>
		</div>
	</main>
</body>
</html>