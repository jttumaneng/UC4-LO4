<?php 

 include('config/db_connect.php'); 

	// write query for all pizzas
	$sql = 'SELECT gname, sname, lrn FROM students ORDER BY created_at';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$students = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

    

?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Students</h4>

	<div class="container">
		<div class="row">

			<?php foreach($students as $student){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($student['lrn']); ?></h6>
							<div><?php echo htmlspecialchars($student['gname']); ?></div>
                            <div><?php echo htmlspecialchars($student['sname']); ?></div>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?level=<?php echo $student['level'] ?>" >more info</a>
						</div>
					</div>
				</div>

			<?php } ?>

            <?php  if(count($students) >2 ): ?>
                <p>there are more than 2 students</p>
            <?php  else: ?>
                <p>there are 2 or less students</p>
            <?php endif; ?>
                

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>