<?php

include("function.php");

$objCrud = new crud_app();

if (isset($_POST['addInfo'])) {

    $return_msg = $objCrud->add_data($_POST);
}

$students = $objCrud->display_data();

if (isset($_GET['status'])) {
    if ($_GET['status'] = 'delete') {

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

<body class="container">


    <div class="container my-4 card p-0 shadow">
        <div class="card-header d-flex justify-content-between mb-3 p-4">
            <h3><a style="text-decoration: none;" href="index.php">Student Database</a></h3>
            <button id="view_data" class="btn btn-primary">View Data</button>
        </div>

        <div class="card-body p-4">
            <form class="form" action="" method="POST" enctype="multipart/form-data">

                <input class="form-control mb-3" type="text" name="stdName" placeholder="Enter Your Name">
                <input class="form-control mb-2" type="text" name="stdID" placeholder="Enter Your Student ID">

                <label for="image">Upload Your Picture</label>
                <input class="form-control mb-2" type="file" name="stdImg">

                <button class="form-control btn-success mt-3" type="submit" name="addInfo">Submit Information</button>

                <?php if (isset($return_msg)) {
                    echo "$return_msg";
                } ?>
            </form>
        </div>
    </div>

    <div id="data_tbl"> </div>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="./js/jquery.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#view_data").on("click", function(e) {
                $.ajax({
                    url: "./data_tbl.php",
                    type: "POST",
                    success: function(data) {
                        $("#data_tbl").html(data);
                    }
                });
            });
        });
    </script>

</body>

</html>