<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DELETE CONFIRMATION</title>
        <link rel = "stylesheet" href = "style3.css">
    </head>
    <body>
    <?php include 'session_check.php'; ?>
        <div class="three" id="form">
            <form action="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <nav>
                    <img src="./hello.jpg" class="logo" alt="hello">
                    <p> <button input type="submit" id="btn" name="button" value="HOME">Logout</button></p>
                    <p class="yoyo"> your choice matters.</p>
                    <div class="top"><ul>
                    <li class="new"><a href="user_profile.php" style="text-decoration: none; color: peachpuff;">Profile</a></li>
                    <li class="new"><a href="aboutus.html" style="text-decoration: none; color:peachpuff;">About </a></li>
            <li class="new"><a href="employees.html" style="text-decoration: none; color:peachpuff;"> Employees</a></li>
            <li class="new"><a href="faq.html" style="text-decoration: none; color:peachpuff;">FAQs</a></li>
            <li class="new"><a href="contact.html" style="text-decoration: none; color:peachpuff;">Contact</a></li>
                    </ul>
                    </div>
                </nav>
                <p class="hey1">Confirm Username and Password</p>
                <p class="hey2">Username</p>
                <input type="text"class="heyb1" name="user" required> </input>
                <p class="hey3">Password</p>
                <input type="password"class="heyb2" name="pass" required> </input>
                <input class="b1" type="submit" name="button" value="Delete"></input>
                </form>
                <?php
                $conn=mysqli_connect("localhost","root","","companies");
                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    $username = $_POST['user'];
                    $password = $_POST['pass'];
                    $stmt = $conn->prepare("SELECT * FROM user_details WHERE user_id = ? AND Passwd = ?");
                    $stmt->bind_param("ss", $username, $password);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows > 0)
                    {
                        DeleteDetails();
                        echo "<script>alert('Profile deleted successfully!');window.location.href='index.php';</script>";
                    }
                    else
                    {
                        echo "<script>alert('Incorrect credentials!');window.location.href='user_profile.php';</script>";
                    }
                }
                ?>
        </div>
    </body>
</html>