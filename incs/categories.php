<div class="container">
	
	<p>
		you are visiting &nbsp; <?php echo $_GET["page"];?> &nbsp; page.
	</p>

	<div class="form category-form">
		
		<form method="post" id="catform">
			<table class="table">
				<tr>
					<td> <input class="form-control" type="text" id="catname" name="category_name" placeholder="add category name"> </td>
					<td><input type="submit" name="catmit" id="catmit" class="btn btn-success" value="add"></td>
				</tr>
			</table>
		</form>

	</div>

	<div id="categoryData">
		
	</div>

</div>

<?php

	if (isset($_POST["catmit"]) || isset($_POST["category_name"])) {
		
		$name = $_POST["category_name"];

		$check = "SELECT * FROM categories WHERE name = '$name'";
		$cres = mysqli_query($conn, $check);

		if (mysqli_num_rows($cres) > 0) {
			echo "<script> alert('category with same name already exists'); </script>";
		}else{
			$insert = "INSERT INTO categories (name) VALUES ('$name')";
			$ires = mysqli_query($conn, $insert);
			if ($ires) {
				echo "<script> alert('submit successfully.'); </script>";
			}else{
				echo "<script> alert('not submitted.'); </script>";
			}
		}

	}

?>