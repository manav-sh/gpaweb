<?php
	session_start();
	$otp = $_SESSION['otp'];

	if(isset($_POST['otp'])) {
		if($_POST['otp'] == $otp) {
			session_unset('otp');
			session_destroy();
			setcookie('enroll',$_SESSION['enroll'], time() + (82600*30));
			setcookie('password',$_SESSION['password'], time() + (82600*30));
			echo "<script>alert('OTP Verification successful. Welcome to student Dashboard');</script>";
			header("location:student/index.html");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verify Account</title>
</head>
<body>
<form method="POST">
	<h3>Verify Account</h3>
	<p>Enter the OTP send to your registered email id.</p>
	<input type="number" min="111111" max="999999" name="otp" value="Enter OTP">
	<input type="submit" name="verify" value="Verify">

</form>
</body>
</html>