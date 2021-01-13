<?php
    include('config/db_connect.php');
$lrn = $sname = $gname = $level = '';
$errors = array('lrn' => '', 'gname' => '', 'sname' =>'', 'level' => '');

if (isset($_POST['enroll'])){

    //check lrn
    if(empty($_POST['lrn'])){
        echo 'LRN is required <br/>';
    }else {
        $lrn = $_POST['lrn'];
        if(!preg_match('0-9', $lrn)) {
            $errors['lrn'] = 'input invalid';
        } 
    }
//check given name
    if(empty($_POST['gname'])){
        echo 'Given name is required <br/>';
    }else {
        $gname = $_POST['gname'];
        if(!preg_match('/^[a-zA-Z/s] + $/', $gname)) {
            $errors['gname'] = 'input invalid';
        } 
    }

//check surname
    if(empty($_POST['sname'])){
        echo 'Surname is required <br/>';
    }else {
        $sname = $_POST['sname'];
        if(!preg_match('/^[a-zA-Z/s] + $/', $sname)) {
            $errors['sname'] = 'input invalid'; 
        }
    }

//check grade level
    if(empty($_POST['level'])){
        echo 'Grade level is required <br/>';
    }else {
        $level = $_POST['level'];
        if(!preg_match('0-9', $level)) {
            $errors['level'] = 'input invalid'; 

        }
    }
    if(array_filter($errors)){
        
    }else {
        $lrn = mysqli_real_escape_string($conn, $_POST['lrn']);
        $gname = mysqli_real_escape_string($conn, $_POST['gname']);
        $sname = mysqli_real_escape_string($conn, $_POST['sname']);
        $level = mysqli_real_escape_string($conn, $_POST['level']);

        $sql = "INSERT INTO students(lrn,gname,sname) VALUES('$lrn', '$gname', '$sname', '$level' )";

        if(mysqli_query($conn, $sql)){
            header('Location: index.php');
        }else {
            echo 'query error: ' . mysqli_error($conn);
        }
    }

}
//end of POST check

//filtering input
?>

<!DOCTYPE html>
<html>
    
<?php include('header.php')?>
    <section class ="container grey-text">
        <h4 class="center">Enroll a Student</h4>
        <form class="white" action="add.php" method="GET">
            <label>LRN</label>
            <input type="number" name="lrn" value="<?php echo $lrn ?>">
            <div class="red-text" ><?php echo $errors['lrn']?></div>
            <label>Given Name</label>
            <input type="text" name="gname" value="<?php echo $gname ?>">
            <div class="red-text" ><?php echo $errors['gname']?></div>
            <label>Surname</label>
            <input type="text" name="sname" value="<?php echo $sname ?>">
            <div class="red-text" ><?php echo $errors['sname']?></div> 
            <label>Grade Level</label>
            <input type="number" name="level" value="<?php echo $level ?>">
            <div class="red-text" ><?php echo $errors['level']?></div>
            <div class="center">
                <input type="submit" name="submit" value="enroll" class="btn brand z-depth-0"> 
            </div>
        </form>
    </section>
    <?php include('footer.php')?>
    
</html>