<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY PROFILE</title>
    <link rel="stylesheet" href="style20.css">
</head>
<body>
    <?php include 'session_check.php'; ?>
    <div class="two">
        <nav>
            <img src="./hello.jpg" class="logo" alt="hello">
            <a href="index.php"><button>Logout</button></a>
            <p class="yoyo"> your choice matters.</p>
            <div class="top">
                <ul>
                <li class="new"><a href="user_profile.php" style="text-decoration: none; color: peachpuff;">Profile</a></li>
                <li class="new"><a href="aboutus.html" style="text-decoration: none; color:peachpuff;">About </a></li>
            <li class="new"><a href="employees.html" style="text-decoration: none; color:peachpuff;"> Employees</a></li>
            <li class="new"><a href="faq.html" style="text-decoration: none; color:peachpuff;">FAQs</a></li>
            <li class="new"><a href="contact.html" style="text-decoration: none; color:peachpuff;">Contact</a></li>
                </ul>
            </div>
        </nav>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <p class="hey3">Enter First Name</p>
            <input type="text" class="heyb1" name="fname" required>
            <input type="submit" class='btn' value="Update">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newFirstName = $_POST['fname'];
            $username = $_SESSION['user_id'];
            
            $conn = mysqli_connect("localhost", "root", "", "companies");
            $stmt = $conn->prepare("UPDATE user_details SET fname=? WHERE user_id = ?");
            $stmt->bind_param("ss", $newFirstName, $username);
            $stmt->execute();
            
            echo "<script>alert('First name updated successfully!');window.location.href='user_profile.php'</script>";

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
