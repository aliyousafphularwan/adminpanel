<?php

	require 'dbc.php';

	$select = "SELECT * FROM products";
	$sres = mysqli_query($conn, $select);
	if (mysqli_num_rows($sres) > 0) {
		?>

		<table class="table w-100">
				<tr>
					<th> Name </th>
					<th> Artical # </th>
					<th> Page # </th>
					<th> Description </th>
					<th> Image </th>
					<th> Action(s) </th>
				</tr>
				<?php

					while ($row = mysqli_fetch_assoc($sres)) {
						?>

						<tr>
					<td><?php echo $row["product_name"];?></td>
					<td><?php echo $row["product_art"];?></td>
					<td><?php echo $row["product_pageno"];?></td>
					<td><?php echo $row["product_desc"];?></td>
					<td><?php echo $row["product_img"];?></td>
					<td><button class="btn btn-danger"><i class="fa fa-close">Delete</i></button>
						<button class="btn btn-info"><i class="fa fa-close">Edit</i></button></td>
				</tr>
						
						<?php
					}

				?>
			</table>

		<?php
	}

?>