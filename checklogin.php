<?php
session_start();
include("includes/config.php");
$tbl_name="account";
// Create connection
$conn = new mysqli($servername, $username, $password, "auth");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// username and password sent from form 
$username2=$_POST['username']; 
$password2=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$username2 = stripslashes($username2);
$password2 = stripslashes($password2);
$password2 = strtoupper($password2);
$username2 = strtoupper($username2);
$username2 = $conn->real_escape_string($username2);
$password2 = $conn->real_escape_string($password2);
$password2 = sha1($username2 . ":" . $password2);
$sql="SELECT * FROM $tbl_name WHERE username='$username2' and sha_pass_hash='$password2'";
if ($result = $conn->query($sql)) {

    /* determine number of rows result set */
    $count = $result->num_rows;
if($count==1){
$_SESSION['username']="$username2";
header("location:../");
}
else {
header("location:../");
}
}
// If result matched $myusername and $mypassword, table row must be 1 row

?>