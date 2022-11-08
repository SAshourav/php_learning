<?php
    include("function.php");

    $objCrudAdmin = new crudApp();

    $students = $objCrudAdmin->display_data();
    if(isset($_GET['status'])){
        if($_GET['status'] ==  'edit'){
            $id = $_GET['id'];
            $return_Data = $objCrudAdmin->display_data_by_id($id);
        }
    }
    if(isset($_POST['edit_add_info'])){
        $msg = $objCrudAdmin->update_data($_POST);
    }

?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP FORM</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-4 p-4 shadow">
        <h2><a href="index.php">Sabbir Ahmed Student Database</a></h2>
        <form class="form" action="" method="POST" enctype="multipart/form-data">

        <?php if(isset($msg)){echo $msg;} ?>
        
            <input class="form-control mb-3" type="text" name="u_student_name" value = "<?php echo $return_Data['NAME']; ?>">
            <input class="form-control mb-3" type="number" name="u_student_roll" value = "<?php echo $return_Data['ROLL']; ?>">
            <label for="image">Upload your Image here</label>
            <input class="form-control mb-3" type="file" name="u_student_image">
            <input type="hidden" name="std_id" value="<?php echo $return_Data['ID']; ?>">
            <input class="form-control mb-3 btn bg-warning" type="submit" value="Update Information" name="edit_add_info" >
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>