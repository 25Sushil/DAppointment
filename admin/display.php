<?php 
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "das";
 
     $conn = mysqli_connect($servername, $username, $password, $database);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <section id="services">
        <div class="description">
            <h1>Services for Your Health</h1>
            <h4 style="color: blue;">Our Departments</h4>
        </div>
        <div class="service-card">
            <?php
                $sql = "SELECT * FROM specialities";
                $result = $conn->query($sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $image_path = $row['image_path'];
                    $image_name = $row['image_name'];
                    $title = $row['title'];
                    $description = $row['description'];
            ?>
            <div class="service-card-inner">
                <img src="<?php echo $image_path ?>" alt="$image_name"><br><br>
                <h1><?php echo "$title"; ?></h1>
                <p><?php echo "$description"; ?></p>
            </div>
            <?php
                }
            ?>
        </div>
        
    </section>

    <section class="team">
        <h1>Our Teams</h1>
        <p>Lorem ipsum dolor sit amet.</p>
        <div class="flip-container">
            <?php
                $dosql = "SELECT * FROM doctor";
                $doresult = $conn->query($dosql);
                while ($row = mysqli_fetch_assoc($doresult)) {
                    $image_path = $row['image_path'];
                    $image_name = $row['image_name'];
                    $fname = $row['fname'];
                    $sid = $row['sid'];
            ?>
            <div class="flip-card">
                <div class="flip-card-inner">
                    
                    <div class="flip-card-front">
                        <img src="<?php echo $image_path ?>" alt="$image_name">
                    </div>
                    <div class="flip-card-back">
                        <p class="title"><?php echo "$fname"; ?></p>
                        <p><?php echo "$sid"; ?></p>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </section>
</body>
</html>