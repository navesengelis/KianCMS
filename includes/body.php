	<div class="right">
	<?php
		if(isset($_SESSION['username']))
		{
			?>
	<h2>USER RESUME</h2>
	<div class="divider" style="min-height:100px;">
		<img src="img/avatar.png" width="80px" style="float:left;margin:0px 5px 0px 5px;">
		<?php
		$sql = "SELECT * FROM account WHERE username='$_SESSION[username]'";
				$result = $acc_resume->query($sql);
				if ($result->num_rows > 0) {

				while($row = $result->fetch_assoc()) {
			echo "Username: " . $_SESSION['username'] . "<br />";
			echo "Joindate: " . $row['joindate'] . "<br />";
			echo "Last Login: " . $row['last_login'] . "<br />";
			echo "Last IP: " . $row['last_ip'] . "<br />";
			echo "E-mail: " . $row['email'];
						}
					}
				$acc_resume->close();
		?>
	</div>
			<?php
		}
		else
		{
	?>
	<h2>LOGIN</h2>
	<div class="divider">
		<form action="checklogin.php" method="post">
			<input type="text" name="username" placeholder="Username" required/>
			<input type="password" placeholder="Password" name="password" required/>
			<input type="submit" value="LOGIN">
		</form>
	</div>
	<?php
		}
	?>
	<h2>VERSION CHECKER</h2>
	<div class="divider">
		<?php echo $versionchecker; ?>
	</div>
	<h2>OUR SERVER</h2>
	<div class="divider">
	SERVER IS <?php
    if(realm_status($sip, $sport) === false)
    {
        echo '<font color="#c0392b">OFFLINE</font>';
    }
    else if(realm_status($sip, $sport) === true)
    {
        echo '<font color="#50BB3F">ONLINE</font>';
    }
    else
    {
        echo '<font color="#d35400">UNAVALIBLE</font>';
    }
    function realm_status($host, $port)
    {
        error_reporting(0);
        $etat = fsockopen($host,$port,$errno,$errstr,3);
                    
        if(!$etat)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
?>
	AND HAS <?php
		$sql2="SELECT online FROM characters WHERE online=1";
	if($result = mysqli_query(mysqli_connect($servername, $username, $password, "characters"), $sql2)){
  		$rowcount=mysqli_num_rows($result);
  		echo $rowcount;
  	}
  ?> / 1000 PLAYERS ONLINE<br />
	<img src="img/banner.jpg" style="width:100%;">
	</div>
	<h2>5 Random players</h2>
	<div class="divider">
	<table width="100%">
	<tr>
		<th>Name</th>
		<th>Class</th>
		<th>Level</th>
	</tr>
	<?php
		$sql = "SELECT * FROM characters WHERE online=1 LIMIT 5";
		$result = $con->query($sql);
		if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
				?>
	<tr>
		<td><?php echo $row['name'] ?></td>
		<?php
			if($row['class']=="1")
			{
				$class="Warrior";
			} 
			elseif($row['class']=="2")
			{
				$class="Paladin";
			}
			elseif($row['class']=="3")
			{
				$class="Hunter";
			}
			elseif($row['class']=="4")
			{
				$class="Rogue";
			}
			elseif($row['class']=="5")
			{
				$class="Priest";
			}
			elseif($row['class']=="6")
			{
				$class="Death Knight";
			}
			elseif($row['class']=="7")
			{
				$class="Shaman";
			}
			elseif($row['class']=="8")
			{
				$class="Mage";
			}
			elseif($row['class']=="9")
			{
				$class="Warlock";
			}
			elseif($row['class']=="10")
			{
				$class="Monk";
			}
			elseif($row['class']=="11")
			{
				$class="Druid";
			} else
			{
				$class="unknown";
			}
		?>
		<td><?php echo $class; ?></td>
		<td><?php echo $row['level'] ?></td>
	</tr>
		<?php
				}
			}
			$con->close();
		?>
	</table>
	</div>
	</div>
<?php
if(isset($_GET['p'])) {
  $page = $_GET['p'];

  switch($page) {
    case"home":
    include('pages/home.php');
    break;

    case"register":
    include('pages/register.php');
    break;

    case"htc":
    include('pages/htc.php');
    break;
  }
}else{
include('pages/home.php');
}
?>