<?php
    $sid = $_GET['id'];

    include '../connection.php';

    $sql = "SELECT id, fname from doctor where sid=$sid;";
    $result = mysqli_query($conn, $sql);

    if($result->num_rows > 0){
        echo "<option>Select Doctor</option>";
        while($row = $result->fetch_assoc()){
            echo "<option value='" . $row['id'] . "'>" . $row['fname']  . "</option>";
        }
    }else{
        echo "<option>No Doctor Assigned</option>";
    }