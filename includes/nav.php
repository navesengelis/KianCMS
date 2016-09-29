<body>
<div class="wrapper">
	<div class="top">
		<a href="../?p=home" id="home">Home</a><a href="../forum" id="forum">Forum</a><a href="../?p=htc" id="htc">How To Connect</a><?php if(isset($_SESSION['username'])) { echo '<a href="../logout.php" id="logout">Logout</a>'; } else {?><a href="../?p=register" id="register">Register</a><?php } ?>
	</div>