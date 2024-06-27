<?php
    include('connection.php');

    $error = 0;
    $err = [];

    if(isset($_POST['submit'])){
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            if(empty($_POST['email'])){
                $err['email'] = "enter email";
                $error ++;
            } else {
                $email = $_POST['email'];  
            }

            if(empty($_POST['password'])){
                $err['password'] = "enter password";
                $error ++;
            } else {
                $password = $_POST['password'];  
            }
        }

        $email = $_POST['email'];
        
        $select_sql = "SELECT `email`, `password` FROM register WHERE email='$email'";
        $select_result = mysqli_query($conn , $select_sql);
        $dbemail = '';
        $dbpwd = '';
        
        while ($row = mysqli_fetch_assoc($select_result)) {
            $dbemail = $row['email'];
            $dbpwd = $row['password'];

        }
        $password = sha1($_POST['password']);

        if($email == $dbemail){
            if($password == $dbpwd){
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $email;
                setcookie('remember_me', $email, time() + (86400 * 30)); 

                header("location: patient/dash.php");
            }else{
                echo 'Wrong Password';
            }
        }else{
            echo 'Email not found';
        }
    }else {
        $error='Login failed';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
    <link rel="stylesheet" href="assets/login.css">
    <style>
        span{
            color: red;
            font-size: 15px;
        }
    </style>
</head>
<body class="hasbg bgfull-fixed" style="background-image: url('assets/img/b4.jpg');">


    <div class="login-container">
        <form class="login-form" action="#" name="login" method="post">
            <h2>Login</h2>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email :''; ?>">
                <span><?php echo isset($err['email'])? $err['email'] : '' ;?></span>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?php echo isset($password) ? $password :''; ?>">
                <span><?php echo isset($err['password'])? $err['password'] : '' ;?></span>
                <br>
            </div>

            <div class="button">
                <button type="submit" name="submit" value="login">Log In</button>
            </div>

            <div class="option">
                <p>Don't have an account? <a href="create-account.php">Create New</a></p>
            </div>

        </form>
    </div>  
    <script src="assets/login.js"></script>  
</body>
</html>