<?php  

    include('config/db_connect.php');

    if(isset($_POST['delete'])){
        
        $lrn_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        $sql = "DELETE FROM students WHERE lrn = $lrn_to_delete";

        if(mysqli_query($conn, $sqli)){
            header('Location: index.php');
        }  {
            echo 'query error:' . msqli_error($conn);
        }
    }

    if(isset($_GET['level'])){
        $level = msqli_real_escape_string($conn, $_GET['level']);

        $sql = "SELECT * FROM students WHERE level = $level";

        $result = mysqli_query($conn, $sql);
        $student = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }



?>

<!DOCTYPE html>
<html >
    <?php include('header.php')?>
    <div class="container center">
        <?php if($student): ?>
            <h4><?php echo htmlspecialchars($student['lrn']) ?> </h4>
            <p><?php echo date($student['created_at']) ?></p>
            <p><?php echo htmlspecialchars($pizza['level']);  ?></p>

            <form action="details.php" method="POST">
            <input type="hidden" name="id_to_delete" values="<?php echo $student['lrn'] ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">

            </form>

        <?php else: ?>
            <h5>No student found</h5>
        <?php endif;?>
    </div>

    <?php include('footer.php')?>
</html>