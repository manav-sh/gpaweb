<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
	// Connecting to the database by user ID and password with the database name.
    $conn = new PDO("mysql:host=$servername;dbname=gpa", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($_POST["username"], $_POST["password"])) 
    {     

        $name = $_POST["username"]; 	
        $password = $_POST["password"]; 
	 // Mentioning the table name i.e : student_login_credentiala and searching for the username and password.
	$query= SELECT Std_Er,Std_Pass FROM student_login_credentiala WHERE username = '$name' AND  password = '$password';
        $result1 = mysqli_query($query,$conn);

        if(mysqli_num_rows($result1) > 0 )
        { 
            $_SESSION["logged_in"] = true; 
            $_SESSION["naam"] = $name; 
		// If the login will be successful then the user will be directed to the next page.
            echo"Welcome to the GPA App";
        }
        else
        {
            echo 'The username or password are incorrect!';
        }
	}
    
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  
  
  	
?>
