<?php

    include("function.php");
    $objCrud = new crud_app();

    if(isset($_POST['addInfo'])) {

        $return_msg = $objCrud->add_data($_POST);
    }

    $students = $objCrud->display_data();

    if(isset($_GET['status'])) {
        if($_GET['status']='delete') {

            $delete_id = $_GET['id'];
            $dlt_msg = $objCrud->delete_data($delete_id);
        }
    }

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD App</title>
</head>

<body>


    <div class="container my-4 p-4 shadow">
        <h2><a style="text-decoration: none;" href="index.php">Student Database</a></h2>

        <form class="form" action="" method="POST" enctype="multipart/form-data">

            <input class="form-control mb-2" type="text" name="stdName" placeholder="Enter Your Name">
            <input class="form-control mb-2" type="text" name="stdID" placeholder="Enter Your Student ID">

            <label for="image">Upload Your Picture</label>
            <input class="form-control mb-2" type="file" name="stdImg">

            <input class="form-control btn-success mt-3" type="submit" value="Submit Information" name="addInfo">

            <?php if(isset($return_msg)) {
                echo "$return_msg";
            } ?>
        </form>

    </div>

    <div class="container my-4 p-4 shadow">

        <?php if(isset($dlt_msg)) {
                echo "$dlt_msg";
        } ?>

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php while($student = mysqli_fetch_assoc($students)) { ?>
                <tr>
                    <td> <?php echo $student['id'] ?> </td>
                    <td> <?php echo $student['std_name'] ?> </td>
                    <td> <?php echo $student['std_id'] ?> </td>
                    <td> <img style="height: 50px" src="./uploaded_images/<?php echo $student['std_img'] ?>" alt="Picture"> </td>
                    
                    <td><a class="btn btn-warning" href="./edit.php?status=edit&&id=<?php echo $student['id'] ?>">Edit</a>
                        <a class="btn btn-danger" href="?status=delete&&id=<?php echo $student['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>