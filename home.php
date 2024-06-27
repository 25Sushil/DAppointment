<?php 
    include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Appointment System</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="assets/img/doctorslogo.jpg">
            <h1>Hospito</h1>
        </div>
        <nav class="main-nav">
            <span class="menu-toggle js-menu-toggle">
                <svg class="icon icon-bars"><use xlink:href="#icon-bars"></use></svg>
            </span>
            <ul>
                <li><a href="#home" id="Home">Home</a></li>
                <li><a href="#about-us">About Us</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="login.php">Log In</a></li>
                <li><a href="create-account.php">Register</a></li>
            </ul>
        </nav>
    </header>

    <section class="entry-block">
        <div class="entry-block__description hasbg bgfull-fixed" style="background-image: url('assets/img/doctorgrd.jpg');">
            <div class="text-box">
                <h2 class="titlestyle1">Avoid Hassels & Delays.</h2> <br>
                <p>How is heallth today. Sounds like  not good!. Don't worry. Find your doctor online. Book as you wish with DAS.  We offer you a free doctor channeling service, Make your appointment now.</p><br>
                <a href="patient/form.php" class="button">Make Appointment</a>
            </div>
        </div>
    </section>

    <section id="about-us">
        <div class="description">
            <h1>About Us</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates aut nesciunt earum labore consectetur repudiandae, quisquam eum, unde, omnis suscipit minima totam saepe dolore hic nemo error iusto eligendi exercitationem temporibus veniam reiciendis corrupti.</p>
        </div>
        <img src="assets/img/bg01.jpg" alt="aboutus">
    </section>

    <section id="services">
        <div class="description">
            <h2>Services for Your Health</h2>
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
                <img src="admin/<?php echo $image_path ?>" alt="<?php echo $image_name ?>"><br><br>
                <h3><?php echo "$title"; ?></h3>
                <p><?php echo "$description"; ?></p>
            </div>
            <?php
                }
            ?>
        </div>
    </section>

    <section class="team">
        <h2>Our Teams</h2>
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
                        <img src="admin/<?php echo $image_path ?>" alt="<?php echo $image_name ?>">
                    </div>
                    <div class="flip-card-back">
                        <p class="title"><?php echo "$fname"; ?></p>
                        <p><?php
                            $aid = $row['sid'];
                                                    
                            // echo $sid;
                                
                            if($aid != ''){
                                $asql = "SELECT title FROM specialities where id=$aid";
                                $aresult = mysqli_query($conn, $asql);
                                
                                while($arow = mysqli_fetch_assoc($aresult)){
                                    echo $arow['title'];
                                }
                            }
                        ?></p>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </section>

    <footer>
        <div class="grid-box">
            <div class="box1">
                <div class="logo">
                    <img src="assets/img/doctorslogo.jpg">
                    <h1>Hospito</h1> 
                </div> <br>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi, ad?</p>
            </div>
            <div class="box2">
                <h3><u>Opening Hours</u></h3> <br>
                <p>Starts at:- 09:00 am</p>
                <p>Closes at:- 06:00 pm</p>
            </div>
            <div class="box3">
                <h3><u>Contact</u></h3> <br>
                <a href="tel:+977-9815136542" style="color:#fff;"><svg class="icon icon-old-phone" style="background-color: black;"><use xlink:href="#icon-old-phone"></use></svg>+977-9815136542</a>
                <div class="social-media">
                    <ul>
                        <li><a href="facebook.com" class="Facebook">
                            <svg class="icon icon-facebook2"><use xlink:href="#icon-facebook2"></use></svg>
                        </a></li>
                        <li><a href="twitter.com" class="twitter">
                            <svg class="icon icon-twitter"><use xlink:href="#icon-twitter"></use></svg>
                        </a></li>
                        <li><a href="gmail.com" class="gmail">
                            <svg class="icon icon-gmail"><use xlink:href="#icon-gmail"></use></svg>
                        </a></li>
                        <li><a href="instagram.com" class="Instagram">
                            <svg class="icon icon-instagram"><use xlink:href="#icon-instagram"></use></svg>
                        </a></li>
                    </ul>
                </div><br>
            </div>
        </div>
        <hr>
        <div class="footer-cr">
            <p>&copy 2024 Hospito.com</p>
        </div>
    </footer>
    
    <svg style="position: absolute; z-index: 1; height: 0; width: 0; overflow: hidden;">
        <defs>
            <symbol id="icon-old-phone" viewBox="0 0 20 20">
                <path d="M17.256 12.253c-0.096-0.667-0.611-1.187-1.274-1.342-2.577-0.604-3.223-2.088-3.332-3.734-0.457-0.085-1.27-0.177-2.65-0.177s-2.193 0.092-2.65 0.177c-0.109 1.646-0.755 3.13-3.332 3.734-0.663 0.156-1.178 0.675-1.274 1.342l-0.497 3.442c-0.175 1.212 0.715 2.305 1.953 2.305h11.6c1.237 0 2.128-1.093 1.953-2.305l-0.497-3.442zM10 15.492c-1.395 0-2.526-1.12-2.526-2.5s1.131-2.5 2.526-2.5 2.526 1.12 2.526 2.5-1.132 2.5-2.526 2.5zM19.95 6c-0.024-1.5-3.842-3.999-9.95-4-6.109 0.001-9.927 2.5-9.95 4s0.021 3.452 2.535 3.127c2.941-0.381 2.76-1.408 2.76-2.876 0-1.024 2.392-1.271 4.655-1.271s4.654 0.247 4.655 1.271c0 1.468-0.181 2.495 2.76 2.876 2.513 0.325 2.558-1.627 2.535-3.127z"></path>
            </symbol>
            <symbol id="icon-facebook2" viewBox="0 0 32 32">
                <path d="M29 0h-26c-1.65 0-3 1.35-3 3v26c0 1.65 1.35 3 3 3h13v-14h-4v-4h4v-2c0-3.306 2.694-6 6-6h4v4h-4c-1.1 0-2 0.9-2 2v2h6l-1 4h-5v14h9c1.65 0 3-1.35 3-3v-26c0-1.65-1.35-3-3-3z"></path>
            </symbol>
            <symbol id="icon-twitter" viewBox="0 0 32 32">
                <path d="M32 7.075c-1.175 0.525-2.444 0.875-3.769 1.031 1.356-0.813 2.394-2.1 2.887-3.631-1.269 0.75-2.675 1.3-4.169 1.594-1.2-1.275-2.906-2.069-4.794-2.069-3.625 0-6.563 2.938-6.563 6.563 0 0.512 0.056 1.012 0.169 1.494-5.456-0.275-10.294-2.888-13.531-6.862-0.563 0.969-0.887 2.1-0.887 3.3 0 2.275 1.156 4.287 2.919 5.463-1.075-0.031-2.087-0.331-2.975-0.819 0 0.025 0 0.056 0 0.081 0 3.181 2.263 5.838 5.269 6.437-0.55 0.15-1.131 0.231-1.731 0.231-0.425 0-0.831-0.044-1.237-0.119 0.838 2.606 3.263 4.506 6.131 4.563-2.25 1.762-5.075 2.813-8.156 2.813-0.531 0-1.050-0.031-1.569-0.094 2.913 1.869 6.362 2.95 10.069 2.95 12.075 0 18.681-10.006 18.681-18.681 0-0.287-0.006-0.569-0.019-0.85 1.281-0.919 2.394-2.075 3.275-3.394z"></path>
            </symbol>
            <symbol id="icon-gmail" viewBox="0 0 32 32">
                <path fill="#d14836" style="fill: var(--color1, #d14836)" d="M32 6v20c0 1.133-0.867 2-2 2h-2v-18.151l-12 8.617-12-8.617v18.151h-2c-1.135 0-2-0.867-2-2v-20c0-0.567 0.216-1.067 0.575-1.424 0.359-0.363 0.86-0.576 1.425-0.576h0.667l13.333 9.667 13.333-9.667h0.667c0.567 0 1.067 0.216 1.425 0.576 0.36 0.357 0.575 0.857 0.575 1.424z"></path>
            </symbol>
            <symbol id="icon-instagram" viewBox="0 0 32 32">
                <path d="M16 2.881c4.275 0 4.781 0.019 6.462 0.094 1.563 0.069 2.406 0.331 2.969 0.55 0.744 0.288 1.281 0.638 1.837 1.194 0.563 0.563 0.906 1.094 1.2 1.838 0.219 0.563 0.481 1.412 0.55 2.969 0.075 1.688 0.094 2.194 0.094 6.463s-0.019 4.781-0.094 6.463c-0.069 1.563-0.331 2.406-0.55 2.969-0.288 0.744-0.637 1.281-1.194 1.837-0.563 0.563-1.094 0.906-1.837 1.2-0.563 0.219-1.413 0.481-2.969 0.55-1.688 0.075-2.194 0.094-6.463 0.094s-4.781-0.019-6.463-0.094c-1.563-0.069-2.406-0.331-2.969-0.55-0.744-0.288-1.281-0.637-1.838-1.194-0.563-0.563-0.906-1.094-1.2-1.837-0.219-0.563-0.481-1.413-0.55-2.969-0.075-1.688-0.094-2.194-0.094-6.463s0.019-4.781 0.094-6.463c0.069-1.563 0.331-2.406 0.55-2.969 0.288-0.744 0.638-1.281 1.194-1.838 0.563-0.563 1.094-0.906 1.838-1.2 0.563-0.219 1.412-0.481 2.969-0.55 1.681-0.075 2.188-0.094 6.463-0.094zM16 0c-4.344 0-4.887 0.019-6.594 0.094-1.7 0.075-2.869 0.35-3.881 0.744-1.056 0.412-1.95 0.956-2.837 1.85-0.894 0.888-1.438 1.781-1.85 2.831-0.394 1.019-0.669 2.181-0.744 3.881-0.075 1.713-0.094 2.256-0.094 6.6s0.019 4.887 0.094 6.594c0.075 1.7 0.35 2.869 0.744 3.881 0.413 1.056 0.956 1.95 1.85 2.837 0.887 0.887 1.781 1.438 2.831 1.844 1.019 0.394 2.181 0.669 3.881 0.744 1.706 0.075 2.25 0.094 6.594 0.094s4.888-0.019 6.594-0.094c1.7-0.075 2.869-0.35 3.881-0.744 1.050-0.406 1.944-0.956 2.831-1.844s1.438-1.781 1.844-2.831c0.394-1.019 0.669-2.181 0.744-3.881 0.075-1.706 0.094-2.25 0.094-6.594s-0.019-4.887-0.094-6.594c-0.075-1.7-0.35-2.869-0.744-3.881-0.394-1.063-0.938-1.956-1.831-2.844-0.887-0.887-1.781-1.438-2.831-1.844-1.019-0.394-2.181-0.669-3.881-0.744-1.712-0.081-2.256-0.1-6.6-0.1v0z"></path>
                <path d="M16 7.781c-4.537 0-8.219 3.681-8.219 8.219s3.681 8.219 8.219 8.219 8.219-3.681 8.219-8.219c0-4.537-3.681-8.219-8.219-8.219zM16 21.331c-2.944 0-5.331-2.387-5.331-5.331s2.387-5.331 5.331-5.331c2.944 0 5.331 2.387 5.331 5.331s-2.387 5.331-5.331 5.331z"></path>
                <path d="M26.462 7.456c0 1.060-0.859 1.919-1.919 1.919s-1.919-0.859-1.919-1.919c0-1.060 0.859-1.919 1.919-1.919s1.919 0.859 1.919 1.919z"></path>
            </symbol>
            <symbol id="icon-bars" viewBox="0 0 24 28">
                <path fill="currentColor" d="M24 21v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1zM24 13v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1zM24 5v2c0 0.547-0.453 1-1 1h-22c-0.547 0-1-0.453-1-1v-2c0-0.547 0.453-1 1-1h22c0.547 0 1 0.453 1 1z"></path>
            </symbol>
        </defs>
    </svg>

    <script src="assets/script.js"></script>
    
</body>
</html>