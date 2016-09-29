	<div class="content">
	<?php
				$sql = "SELECT * FROM news";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {

				while($row = $result->fetch_assoc()) {
				?>
		<div class="post">
			<img src="../img/1.png" style="float:right;width:80px;"/>
			<h2><?php echo $row['title'] ?></h2>
			<p><?php echo $row['content'] ?></p>
		</div>
		<?php
						}
					}
				$conn->close();
		?>
		</div>