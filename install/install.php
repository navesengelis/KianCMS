<?php
$config = '../includes/config.php';
$doit = fopen($config, 'w') or die('Cannot open file:  '.$config);
$data = '<?php
$servername = "' . $_POST['dbhost'] . '"; //Server IP or DNS for database.
$username = "' . $_POST['dbusername'] . '"; //Username for Database
$password = "' . $_POST['dbpassword'] . '"; //Password for Database
$dbname = "' . $_POST['dbname'] . '"; //DBName for website
$sip = "' . $_POST['sip'] . '"; //Server IP for Online/offline status checker
$sport = "' . $_POST['sport'] . '"; //Port for status checker.
$sname = "' . $_POST['sname'] . '"; //Server Name
$srealmlist = "' . $_POST['srealmlist'] . '"; //Realmlist IP or DNS
$description = "' . $_POST['description'] . '"; //Description that will be displayed on index page.

$file = file_get_contents("http://kiancms.xyz/v.txt", true);
$local = file_get_contents("v.txt", true);
$file2 = file_get_contents("http://kiancms.xyz/d.txt", true);
if($local < $file) {
	$versionchecker = "<font color=white>Theres an update out! <a href=" . $file2 . " target=blank>Download</a></font>";
} else
{
	$versionchecker = "<font color=white>Youre up-to-date</font>";
}
?>';
fwrite($doit, $data);
$conn = new mysqli($_POST['dbhost'], $_POST['dbusername'], $_POST['dbpassword'], $_POST['dbname']);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "CREATE TABLE `news` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` longtext NOT NULL,
  `content` longtext NOT NULL,
  `date` longtext NOT NULL,
  `by` longtext NOT NULL
)";
if (mysqli_query($conn, $sql)) {
	header("Location: ../install/index.php?done");
} else {
}
$sql = "INSERT INTO news (`title`, `content`, `date`, `by`)
VALUES ('Newly installed KianCMS', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.', '22/08/16 17:55', '1')";

if ($conn->query($sql) === TRUE) {
} else {
}
mysqli_close($conn);
	header("Location: ../install/index.php?done");
?>