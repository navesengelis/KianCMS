<?php
session_start();
if(isset($_SESSION['username']))
{
	header("Location: ../");
}
include("includes/config.php");
$dbname2="auth";
$conn = new mysqli($servername, $username, $password, $dbname2);
$sql="SELECT * FROM account WHERE username='$_POST[username]'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
header("Location: ../register.php?fejl=1");
die();
}
$sql="SELECT * FROM account WHERE email='$_POST[email]'";
$result=mysqli_query($conn,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
header("Location: ../register.php?fejl=2");
die();
}
if($_POST['password'] == $_POST['password2']) { 
$exp="2";
$email=$_POST['email'];
$password=strtoupper($_POST['password']);
$username=strtoupper($_POST['username']);
$email=strtoupper($_POST['email']);
$username=$conn->real_escape_string($username);
$password=$conn->real_escape_string($password);
$email=$conn->real_escape_string($email);
$password2=sha1($username . ":" . $password);

  $stmt = $conn->prepare("INSERT INTO account (username, sha_pass_hash, email, expansion) VALUES (?, ?, ?, ?)"); 
  $stmt->bind_param("sssi", $username, $password2, $email, $exp); 
  if($stmt->execute()) {
	header("Location: ../");
  }else{ 
    echo "Failed to create account<br>" . $stmt->error; 
 } 
}
  $stmt->close();
 



?>