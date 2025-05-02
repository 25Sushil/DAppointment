<?php
    include ("connection.php");

    $error = 0;
    $err = [];

    if(isset($_POST["submit"])){
        if(empty($_POST['fullname'])){
            $err['fullname'] = "enter fullname";
            $error ++;
        } else {
            $fullname = $_POST['fullname'];
        }

        if(empty($_POST['email'])){
            $err['email'] = "enter email";
            $error ++;
        } else {
            $email = $_POST['email'];
        }

        if(empty($_POST['tel'])){
            $err['tel'] = "enter phone number";
            $error ++;
        } else {
            $tel = $_POST['tel'];
        }

        if(empty($_POST['address'])){
            $err['address'] = "enter your address";
            $error ++;
        } else {
            $address = $_POST['address'];
        }

        if(empty($_POST['password'])){
            $err['password'] = "enter password";
            $error ++;
        } else {
            $password = $_POST['password'];
        }

        if($error == 0){
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $address = $_POST['address'];
            $password = sha1($_POST['password']);
    
            $sql = "INSERT INTO `register` (`fullname`, `email`, `tel`, `address`, `password`) VALUES ('$fullname','$email', '$tel', '$address', '$password')";
            
            $result = mysqli_query($conn , $sql);
            if($result){
                echo "Inserted succesfully ";
            }
            else {
                echo "conenction failed";
            }
            header('location: login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image" href="assets/img/doctorslogo.jpg">
    <link rel="stylesheet" href="assets/register.css">
    <style>
        span{
            color : red;
            font-size: 15px;
        }
    </style>

</head>
<body class="hasbg bgfull-fixed" style="background-image: url('assets/img/web_bg.jpg');">

    <div class="register-container">
        <form class="register-form" action="#" name="register" method="post">
            <h2>Create Account Now!!</h2><br>

            <div class="input-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" value="<?php echo isset($fullname) ? $fullname : ''; ?>">
                <span><?php echo isset($err['fullname'])? $err['fullname'] : '' ;?></span>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                <span><?php echo isset($err['email'])? $err['email'] : '' ;?></span>
            </div>

            <div class="input-group">
                <label for="tel">Phone</label>
                <input type="tel" id="tel" name="tel" value="<?php echo isset($tel) ? $tel : ''; ?>">
                <span><?php echo isset($err['tel'])? $err['tel'] : '' ;?></span>
            </div>

            <div class="input-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo isset($address) ? $address : ''; ?>">
                <span><?php echo isset($err['address'])? $err['address'] : '' ;?></span>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?php echo isset($password) ? $password : ''; ?>">
                <span><?php echo isset($err['password'])? $err['password'] : '' ;?></span>
            </div>

            <div class="input-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" id="cpassword" name="cpassword" value="<?php echo isset($cpassword) ? $cpassword : ''; ?>">
                <span><?php echo isset($err['password'])? $err['password'] : '' ;?></span>
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