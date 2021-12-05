<?php

    include("function.php");
    $objCrud = new crud_app();

    $students = $objCrud->display_data();

    if(isset($_GET['status'])) {

        if($_GET['status'] = 'edit') {

            $id = $_GET['id'];
            $returned_data = $objCrud->display_data_by_id($id);
        }
    }
    if(isset($_POST['e_addInfo'])) {

        $update_msg = $objCrud->update_data($_POST);
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

            <input class="form-control mb-2" type="text" name="e_stdName" value="<?php echo $returned_data['std_name']; ?>">
            <input class="form-control mb-2" type="text" name="e_stdID" value="<?php echo $returned_data['std_id']; ?>">

            <label for="image">Upload Your Picture</label>
            <input class="form-control mb-2" type="file" name="e_stdImg">

            <input type="hidden" name="std_id" value="<?php echo $returned_data['id']; ?>">
            <input class="form-control btn-warning mt-3" type="submit" value="Update Information" name="e_addInfo">

            <?php if(isset($update_msg)) {
                echo "$update_msg";
            } ?>
        </form>

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