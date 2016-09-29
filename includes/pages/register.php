	<div class="content" style="height:700px;">
		<div class="post">
			<h2>REGISTER</h2>
			<?php
				if(isset($_GET['fejl']))
				{
					if($_GET['fejl']=="1")
					{
						echo "<font color='red'>USERNAME IS ALREADY TAKEN</font>";
					}
					if($_GET['fejl']=="2")
					{
						echo "<font color='red'>E-MAIL HAS ALREADY BEEN REGISTERED</font>";
					}
				}
			?>
			<form id="register" method="post" action="../postreg.php">
				<input type="text" placeholder="Username" autocomplete="off" name="username" id="username" required>
				<input type="password" placeholder="Password" autocomplete="off" name="password" id="password" required>
				<input type="password" placeholder="Confirm Password" autocomplete="off" name="password2" id="password2" required>
				<input type="email" placeholder="E-mail" autocomplete="off" name="email" id="email" required>
				<input type="submit" value="REGISTER">
			</form>
		</div>
</div>