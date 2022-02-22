<?php

include("function.php");
$objCrud = new crud_app();


$students = $objCrud->display_data();

if (isset($_GET['status'])) {
    if ($_GET['status'] = 'delete') {

        $delete_id = $_GET['id'];
        $dlt_msg = $objCrud->delete_data($delete_id);
    }
}

?>


<div class="container my-4 p-4 shadow table-responsive" id="">

    <?php if (isset($dlt_msg)) {
        echo "$dlt_msg";
    } ?>

    <table class="table">
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

            <?php while ($student = mysqli_fetch_assoc($students)) { ?>
                <tr>
                    <td> <?php echo $student['id'] ?> </td>
                    <td> <?php echo $student['std_name'] ?> </td>
                    <td> <?php echo $student['std_id'] ?> </td>
                    <td> <img style="height: 50px" src="./uploaded_images/<?php echo $student['std_img'] ?>" alt="Picture"> </td>

                    <td><a class="btn btn-warning mb-1" href="./edit.php?status=edit&&id=<?php echo $student['id'] ?>">Edit</a>
                        <a class="btn btn-danger mb-1" href="?status=delete&&id=<?php echo $student['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>