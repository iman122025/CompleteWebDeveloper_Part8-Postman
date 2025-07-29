<?php

    include ('../connection.php');

    $id = $_POST['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $experience = $_POST['experience'];

    $query = "UPDATE `employee` SET `name`='$name',`position`='$position',`salary`='$salary',`experience`='$experience' WHERE id=$id";

    $data = mysqli_query($conn, $query);

    $response = array();

    if (mysqli_affected_rows($conn)) {

        $response['updated'] = true;

        echo json_encode($response);

    } else {
        
        $response['updated'] = false;

        echo json_encode($response);
        
    }

?>


