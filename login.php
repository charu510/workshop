<?php

include 'constants.php';


error_reporting(0);
//
// if (isset($_SESSION['username'])) {
//     header("Location: welcome.php");
// }

$_SESSION['login'] = false;


if (isset($_POST['submit'])) {
	$email = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM admin_table WHERE username='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
    $_SESSION['userId'] = $row['id'];
		$_SESSION['login'] = true;
		header("Location: index.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form</title>
</head>
<body>

  <div class="main-content text-center">

	<div class="wrapper">
		<form action="" method="POST" class="login-email">
			<h1>Login</h1>
      <br><br>
			<div>
				<input type="text" placeholder="Username" name="username" value="<?php echo $email; ?>" required>
			</div>
      <br>
			<div >
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
      <br>
			<div>
				<button name="submit" class="btn">Login</button>
			</div>
		</form>
	</div>
</div>
</body>
</html>
