<?php
    include('../connection.php');

    $error = 0;
    $err = [];

    if(isset($_POST['submit'])){
        if(empty($_POST['fname'])){
            $err['fname'] = "enter full name";

            $error ++;
        }else{
            $fname = $_POST['fname'];
        }

        if(empty($_POST['latitude'])){
            $err['latitude'] = "enter latitude";
            $error ++;
        }else{
            $latitude = $_POST['latitude'];
        }

        if(empty($_POST['longitude'])){
            $err['longitude'] = "enter longitude";
            $error ++;
        }else{
            $longitude = $_POST['longitude'];
        }

        if(empty($_POST['email'])){
            $err['email'] = "enter email";
            $error ++;
        }else{
            $email = $_POST['email'];
        }

        if(empty($_POST['phone'])){
            $err['phone'] = "enter phone number";
            $error ++;
        }else{
            $phone = $_POST['phone'];
        }

        if(empty($_POST['address'])){
            $err['address'] = "enter address";
            $error ++;
        }else{
            $address = $_POST['address'];
        }

        if(empty($_POST['speciality'])){
            $err['speciality'] = "select speciality";
            $error ++;
        }else{
            $speciality = $_POST['speciality'];
        }

        if(empty($_FILES['image'])){
            $err['image'] = "insert image";
            $error ++;
        }elseif($_FILES['image']['size'] == 0){
            $err['image'] = "file is empty";
            $error ++;
        }else{
            $image = $_FILES['image'];
        }

        if(empty($_POST['password'])){
            $err['password'] = "enter password";
            $error ++;
        }else{
            $password = $_POST['password'];
        }

        if($error == 0){
            $fname = $_POST['fname'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $email = $_POST['email'];
            $speciality = $_POST['speciality'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            $image = $_FILES['image'];
            $name = $image['name'];
            $image_tmp = $image['tmp_name'];
            $upload_dir = 'uploads/';
            $path = $upload_dir. $name;
            move_uploaded_file($image_tmp, $path);

            $password = sha1($_POST['password']);

            $sql = "INSERT INTO `new_doctor` (`fname`, `latitude`, `longitude`, `email`, `password`, `phone`, `address`, `image_name`, `image_path`, `sid`) VALUES ('$fname','$latitude', '$longitude', '$email', '$password','$phone', '$address', '$name', '$path', '$speciality');";

            $result = mysqli_query($conn, $sql);
            if($result){
                echo 'Inserted Successfully';
                // header('location: ../admin/doctor.php');
            }else{
                // echo 'Cannot Inserted';
                echo $query;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image" href="../assets/img/doctorslogo.jpg">
    <link rel="stylesheet" href="../assets/register.css">
    <style>
        span{
            color : red;
            font-size: 15px;
        }
    </style>

</head>
<body class="hasbg bgfull-fixed" style="background-image: url('../assets/img/web_bg.jpg');">

    <div class="register-container">
        <form class="register-form" action="#" name="register" method="post" enctype="multipart/form-data">
            <h2>Create Account Now!!</h2><br>

            <div class="input-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="fname" name="fname" value="<?php echo isset($fname) ? $fname : ''; ?>">
                        <span><?php echo isset($err['fname'])? $err['fname']: '' ?></span>
                    </div>
                    
                    <div class="input-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" id="latitude" name="latitude" value="<?php echo isset($latitude) ? $latitude : ''; ?>">
                        <span><?php echo isset($err['latitude'])? $err['latitude']: '' ?></span>
                    </div>

                    <div class="input-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" id="longitude" name="longitude" value="<?php echo isset($longitude) ? $longitude : ''; ?>">
                        <span><?php echo isset($err['longitude'])? $err['longitude']: '' ?></span>
                    </div>

                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                        <span><?php echo isset($err['email'])? $err['email']: '' ?></span>
                    </div>

                    <div class="input-group">
                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>">
                        <span><?php echo isset($err['phone'])? $err['phone']: '' ?></span>
                    </div>

                    <div class="input-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="<?php echo isset($address) ? $address : ''; ?>">
                        <span><?php echo isset($err['address'])? $err['address']: '' ?></span>
                    </div>

                    <div class="input-group">
                        <label for="speciality">Select Specilities</label>
                        <select name="speciality" id="speciality">
                            <option value="">Select Speciality</option>
                                <?php
                                    $ssql = "SELECT id, title FROM specialities";

                                    $s_result = mysqli_query($conn, $ssql);

                                    while($row  = mysqli_fetch_assoc($s_result)){
                                        echo "<option value='" . $row['id'] . "'>" . $row['title']  . "</option>";
                                    }
                                ?>
                        </select>
                        <span><?php echo isset($err['speciality'])? $err['speciality']: '' ?></span>
                    </div>

                    <div class="input-group">
                        <label for="file">Choose file</label>
                        <input type="file" id="image" name="image" accept=".jpg, .png, .svg" value="<?php echo isset($image) ? $image : ''; ?>">
                        <span><?php echo isset($err['image'])? $err['image']: '' ?></span>
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" value="<?php echo isset($password) ? $password : ''; ?>">
                        <span><?php echo isset($err['password'])? $err['password']: '' ?></span>
                    </div>

                    <div class="input-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" value="<?php echo isset($cpassword) ? $cpassword : ''; ?>">
                        <span><?php echo isset($err['password'])? $err['password']: '' ?></span>
                    </div>

            <div class="button">
                <button type="submit" name="submit" value="Register">Register</button>
            </div>

            <div class="option">
                <p>Already have an account? <a href="login.php">Log In</a></p>
            </div>
            
        </form>
    </div>
    <script src="assets/register.js"></script>
</body>
</html>