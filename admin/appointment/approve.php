<?php
    include '../connection.php';
    include '../../admin/session.php';

    $id = $_GET['approveid'];
    $sql = "SELECT * FROM `appointment` where id=$id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $aid = $row['id'];
    $speciality = $row['sid'];
    $did = $row['did'];

    if(isset($_GET['approveid'])){
        $id = $_GET['approveid'];

        $usql = "UPDATE appointment SET status=1 where id='$id';";
        $uresult = mysqli_query($conn, $usql);

        $sql = "INSERT INTO `patient` (`aid`, `sid`, `did`) VALUES ('$aid', '$speciality', '$did'); "; 
        $result = mysqli_query($conn, $sql);
        if($result){
            header ('location: ../../admin/patients.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>