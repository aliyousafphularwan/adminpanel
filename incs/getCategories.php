<?php

	require 'dbc.php';

	$select = "SELECT * FROM categories";
	$sres = mysqli_query($conn, $select);
	if (mysqli_num_rows($sres) > 0) {
		
		?>

		<table class="table">
				
				<tr>
					<th>Id</th>
					<th>Name</th>
				</tr>
	
					<?php

					while ($row = mysqli_fetch_assoc($sres)) {
						
						?>
						<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['name'];?></td>
						</tr>
						<?php

					}

					?>

		<?php

	}else{
		echo "nothing found";
	}

?>