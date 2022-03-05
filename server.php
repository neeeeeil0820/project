<?php
session_start();

$error = false;
$email = "";
$search = "";

$db = mysqli_connect('localhost','root', '','waterbilling') or die("connection failed: %s\n".$db -> error);

//LOGIN
if (isset($_POST['login_user'])) {
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$results = mysqli_query($db, $query);
	if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $email;
      header('location: index.php');
    }else {
			 $error = true;
    }
  }

 //LOGOUT
 if (isset($_GET['logout'])) {
	session_destroy();
	header("location: login.php");
}
 //SEARCH 
                                                
?>