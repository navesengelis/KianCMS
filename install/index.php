<html>
<head>
	<title>
		KianCMS
	</title>
	<link rel="stylesheet" type="text/css" href="../main.css" />
</head>
<body>
<h1 style="text-align:center;color:#fff;">KIANCMS INSTALLATION</h1>
				<div class="post" style="width:1000px;margin:0px auto;">
					<?php
						if(isset($_GET['done']))
						{
							echo "<font color=green>Successfully installed, please delete the install directory, or rename it.</font>";
						}
					?>
					<form method="post" action="install.php">
					<input type="text" placeholder="Database Server IP or DNS" autocomplete="off" name="dbhost" required>
					<input type="text" placeholder="Database Username" autocomplete="off" name="dbusername" required>
					<input type="password" placeholder="Database Password" autocomplete="off" name="dbpassword" required>
					<input type="text" placeholder="Database name" autocomplete="off" name="dbname" required>
					<input type="text" placeholder="Realm server IP (127.0.0.1)" autocomplete="off" name="sip" required>
					<input type="text" placeholder="Realm server port (8085)" autocomplete="off" name="sport" required>
					<input type="text" placeholder="Servername (Molten-WoW)" autocomplete="off" name="sname" required>
					<input type="text" placeholder="Realmlist (127.0.0.1 or logon.molten-wow.com)" autocomplete="off" name="srealmlist" required>
					<input type="text" placeholder="Server description" autocomplete="off" name="description" required>
					<input type="submit" value="INSTALL">
				</form>
				</div>
</body>
</html>