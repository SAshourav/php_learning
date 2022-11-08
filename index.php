<?php
    include("function.php");

    $objCrudAdmin = new crudApp();

    if(isset($_POST['add_info'])){
        $return_msg = $objCrudAdmin->add_data($_POST);
        
    }

    $students = $objCrudAdmin->display_data();

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

        <?php if(isset($return_msg)){echo $return_msg;} ?>
        
            <input class="form-control mb-3" type="text" name="studnet_name" placeholder="Enter your name:">
            <input class="form-control mb-3" type="number" name="studnet_roll" placeholder="Enter your roll:">
            <label for="image">Upload your Image here</label>
            <input class="form-control mb-3" type="file" name="student_image">
            <input class="form-control mb-3 btn bg-warning" type="submit" value="Add Information" name="add_info" >
        </form>
    </div>
    <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ROLL</th>
                    <th>IMAGE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php while($student = mysqli_fetch_assoc($students)){ ?>
                <tr>
                    <td><?php echo $student['ID']; ?></td>
                    <td><?php echo $student['NAME']; ?></td>
                    <td><?php echo $student['ROLL']; ?></td>
                    <td><img style="height: 100px;" src="upload/<?php echo $student['IMAGE']; ?>"></td>
                    <td>
                        <a class="btn btn-success"href="edit.php? status=edit&&id=<?php echo $student['ID']; ?>">Edit</a>
                        <a class="btn btn-warning"href="">Delete</a>
                    </td>
                </tr>
               <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>