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

			$headers = "From: no-reply"."<m.shah060603@gmail.com>\r\n";
			$subject = "GPA-WEB OTP For Login";
			$message = "Dear Student, <br> The OTP for your login verification is $num . <br>Please keep it safe and don't share with others for security reasons.";
			
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html\r\n";

			mail($mail_id, $subject, $message, $headers);
		}


	}
	else {
		echo "<script>alert('The Account Details you entered doesnot match. Please try again')";
		header("Location:index.html");
	}
?>
