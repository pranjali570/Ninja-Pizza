<?php

	include('config/connect.php');

	if(isset($_POST['delete'])) {

		$id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

		$sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

		if(mysqli_query($conn, $sql)) {
			// success
			header('Location: index.php');
		}
		else {
			// error
			echo "query error: " . mysqli_error($conn);
		}
	}

	// check GET request id param
	if(isset($_GET['id'])) {

		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// query to select a pizza
		$sql = "SELECT * FROM pizzas WHERE id = $id";

		// get the query result
		$result = mysqli_query($conn, $sql);

		//fetch the result
		$pizza = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php 
		include('templates/header.php')
	?>

	<h2 class="center grey-text"> Details </h2><br>
	<div class="container center grey-text">
		<?php if($pizza): ?>
			<h4>
				title: 
				<?php echo htmlspecialchars($pizza['title']); ?>
			</h4>
			
			<p>
				Created by:
				<?php echo htmlspecialchars($pizza['email']); ?>
			</p>

			<p>
				Time:
				<?php echo date($pizza['created_at']); ?>
			</p>
			
			<p>
				Ingredients: 
				<?php echo htmlspecialchars($pizza['ingredients']); ?>
			</p>

			<!-- to delete a pizza -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>

		<?php else: ?>
			<h5>No such pizza exist!!</h5>

		<?php endif; ?>
	</div>

	<?php 
		include('templates/footer.php')
	?>

</html>