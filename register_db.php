<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);

        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }

        $user_check_query = "SELECT * FROM member WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0) {
			$hash = password_hash("$password_1",PASSWORD_BCRYPT);

			$n=100; 
		function getName($n) { 
			$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'; 
			$randomString = ''; 
		  
			for ($i = 0; $i < $n; $i++) { 
				$index = rand(0, strlen($characters) - 1); 
				$randomString .= $characters[$index]; 
			} 
		  
			return $randomString; 
		}
	 $randomtoken = getName($n);

			$sql = "INSERT INTO member (id,name,lastname,email,username,password,token,phone,user_status,point) VALUES ('','$name','$lastname','$email','$username','$hash','$randomtoken','$phone','member','0')";

			


            mysqli_query($conn, $sql);

            header('location: ./?app=success');
        } else {
            header("location: ./?app=register");
        }
    }

?>
