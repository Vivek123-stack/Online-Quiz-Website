<?php
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repeat_password = $_POST['repeat password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','vivek');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into Registration(email,password,repeat password) values(?, ?, ?,)");
		$stmt->bind_param("sssssi", $email,$password,$repeat_password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>