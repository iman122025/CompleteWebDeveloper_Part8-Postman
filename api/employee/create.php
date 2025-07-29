<?php

    include ('../connection.php');

    /////////////////////////////////////////////////////////    
    header('Access-Control-Allow-Origin: *');

    header('Access-Control-Allow-Methods: GET, POST');

    header("Access-Control-Allow-Headers: X-Requested-With");

    /////////////////////////////////////////////////////////

    // echo"create";

    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    $experience = $_POST['experience'];

    //echo '<h1>HI' . $name . '</h1><br>';
    //echo 'You are the' . $position . '<br>';
    //echo 'Mashallah $' . $salary . '<br>';
    //echo $experience;

    $query = "INSERT INTO `employee`(`name`, `position`, `salary`, `experience`) VALUES ('$name','$position','$salary','$experience')";

    // echo $query;

    $data = mysqli_query($conn, $query);

    $employee = array();

    if ($data) {
        $id = mysqli_insert_id($conn);
        $q2 = "SELECT `id`, `name`, `position`, `salary`, `experience` FROM `employee` WHERE id = $id";
        $data2 = mysqli_query($conn, $q2);
        $row = mysqli_fetch_assoc($data2);

        $employee['id'] = $row['id'];
        $employee['name'] = $row['name'];
        $employee['position'] = $row['position'];
        $employee['salary'] = $row['salary'];
        $employee['experience'] = $row['experience'];

        echo json_encode($employee);

    } else {

        echo 'Error';
        
    }

?>