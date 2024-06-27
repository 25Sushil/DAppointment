<?php
    include '../connection.php';
    include '../../admin/session.php';

    $id = $_GET['completeid'];

    if(isset($_GET['completeid'])){
        $id = $_GET['completeid'];

        $usql = "UPDATE appointment SET status = 2 where id='$id';";
        $uresult = mysqli_query($conn, $usql);

        if($uresult){
            header ('location: ../../admin/patients.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>