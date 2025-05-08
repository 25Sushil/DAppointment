<?php
    include '../connection.php';
    include '../../admin/session.php';

    $id = $_GET['approvedid'];
    $sql = "SELECT * FROM `new_doctor` where id=$id";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    $name = $row['fname'];
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
    $email = $row['email'];
    $password = $row['password'];
    $phone = $row['phone'];
    $address = $row['address'];
    $speciality = $row['sid'];
    $image_name = $row['image_name'];
    $image_path = $row['image_path'];



    if(isset($_GET['approvedid'])){
        $id = $_GET['approvedid'];

        $usql = "UPDATE new_doctor SET status=1 where id='$id';";
        $uresult = mysqli_query($conn, $usql);

        $sql = "INSERT INTO `doctor`(`fname`, `latitude`, `longitude`, `email`, `password`, `phone`, `address`, `image_name`, `image_path`, `sid`) VALUES ('$name', '$latitude', '$longitude', '$email', '$password', '$phone', '$address', '$image_name', '$image_path', '$speciality'); ";
        $result = mysqli_query($conn, $sql);

        if($result){
            header ('location: ../../admin/doctor.php');

            if ($uresult) {
                $sql = "DELETE FROM `new_doctor` WHERE id=$id";
                // $result = mysqli_query($conn, $sql);
            }
        }
    }else{
        // echo "<script>alert('Doctor not approved');</script>";
        die(mysqli_error($conn));
    }
?>