<?php
    include("../connection.php");

    $error = 0;
    $err = [];

    if(isset($_POST['submit'])){
        if(isset($_POST["email"]) && isset($_POST["password"])) {
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
        $select_sql = "SELECT id, name, `email`, `password` FROM `admin`";
        $select_result = mysqli_query($conn, $select_sql);
        
        $dbid = '';
        $dbemail = '';
        $dbpwd = '';
        while ($row = mysqli_fetch_assoc($select_result)) {
            $dbid = $row['id'];
            $dbemail = $row['email'];
            $dbpwd = $row['password'];

        }
        $password = $_POST['password'];

        if($email == $dbemail){
            if($password == $dbpwd){
                session_start();
                $_SESSION['username'] = $email;
                $_SESSION['id'] = $dbid;
                setcookie('remember_me', $email, time() + (86400 * 30)); 
                header("location: ../admin/dash.php");
            }else{
                echo 'Password doesnot match';
            }
        }else{
            echo 'Email doesnot match';
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
    <title>Admin login</title>
    <link rel="stylesheet" href="../assets/login.css">
    <style>
        span{
            color: red;
            font-size: 15px;
        }
    </style>
</head>
<body class="hasbg bgfull-fixed" style="background-image: url('../assets/img/b4.jpg');">


    <div class="login-container">
        <form class="login-form" action="#" name="login" method="post">
            <h2> Admin  Login</h2>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo isset($email) ? $email :''; ?>">
                <span><?php echo isset($err['email'])? $err['email'] : '' ;?></span>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value='<?php echo isset($password) ? $password :''; ?>'>
                <span><?php echo isset($err['password'])? $err['password'] : '' ;?></span>
                <br>
            </div>

            <div class="button">
                <button type="submit" name="submit" value="login">Log In</button>
            </div>
        </form>
    </div>  
    <script src="../assets/login.js"></script>  
</body>
</html>