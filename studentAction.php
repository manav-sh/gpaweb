<?php
	session_start();
	$enrollment = $_POST['enrollment'];
	$password = $_POST['password'];
	$conn = mysqli_connect("localhost","root","","gpa_web");
	if (!($conn)) {
		die("Fatal error!\nConnection To database failed...");
		header("location: index.html");
	}
	$query = "SELECT * from student_login_credentials where enrollment = '$enrollment' and password = '$password'";

	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);

		if ($enrollment == $row[0] && $password == $row[1]) {
			
			$_SESSION['enroll'] = $enrollment;
			$_SESSION['pass'] = $password;

			$num = 0;
			for ($i=0; $i < 6 ; $i++) { 
				$num = $num*10 + mt_rand(1,9);
			}

			$query = "SELECT email from student_contact_details where enrollment = '$enrollment'";

			$result = mysqli_query($conn, $query);

			$row = mysqli_fetch_array($result);

			$mail_id = $row[0];

			$headers = "From: GPA-WEB"."<m.shah060603@gmail.com>";
			$subject = "<no-reply> OTP For Login";
			$message = "Dear Student, <br> The OTP for your login verification is $num . <br>Please keep it safe and don't share with others for security reasons.";

			mail($mail_id, $subject, $message, $headers);
		}


	}
	else {
		echo "<script>alert('The Account Details you entered doesnot match. Please try again')";
		header("Location:index.html");
	}

	if (isset($_POST['submit'])) {
		if ($_POST['otp'] == $num) {
			setcookie('enroll' , $enrollment, time() + (86400*30) );
			setcookie('password' , $password, time() + (86400*30) );
			header("location: student/index.html");
		}
		else {
			echo "<script>alert('The OTP you entered doesn't match. Please try again')";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verify Account</title>
</head>
<body>
<form>
	<h3>Verify Account</h3>
	<p>Enter the OTP send to your registered email id.</p>
	<input type="number" name="otp" value="Enter OTP">
	<input type="submit" name="submit" value="Verify">

</form>
</body>
</html>