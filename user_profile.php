<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY PROFILE</title>
    <link rel = "stylesheet" href = "style20.css">
</head>
<body>
<?php include 'session_check.php'; ?>
    <div class="two">
    <nav>
        <img src="./hello.jpg" class="logo" alt="hello">
        <a href="index.php"><button>Logout</button></a>
       <p class="yoyo"> your choice matters.</p>
        <div class="top"><ul>
            <li class="new"><a href="user_profile.php" style="text-decoration: none; color: peachpuff;">Profile</a></li>
            <li class="new"><a href="aboutus.html" style="text-decoration: none; color:peachpuff;">About </a></li>
            <li class="new"><a href="employees.html" style="text-decoration: none; color:peachpuff;"> Employees</a></li>
            <li class="new"><a href="faq.html" style="text-decoration: none; color:peachpuff;">FAQs</a></li>
            <li class="new"><a href="contact.html" style="text-decoration: none; color:peachpuff;">Contact</a></li>
        </ul>
    </nav>
    <?php
        $row=getDetails();
        $fname = $row['fname'];
        $lname=$row['lname'];
        $age=$row['age'];
        $email=$row['email'];
        $phone=$row['phoneno'];
        ?>
        <p class="yo">
            <?php
                if (isLoggedIn()) 
                {
                    echo "Hi " . getUsername() . ",";
                }
            ?>
            click on a button to update your details
        </p>
        <p class = "yo">First Name:</p>
        <button class="b2" name="fname"><a href="fname_update.php" style="text-decoration: none; color: black;"><?php echo "$fname" ?></a></button>
        <p class = "yo">Last Name:</p>
        <button class="b2" name="lname"><a href="lname_update.php" style="text-decoration: none; color: black;"><?php echo "$lname" ?></a></button>
        <p class="yo">Age:</p>
        <button class="b2" name="age"><a href="age_update.php" style="text-decoration: none; color: black;"><?php echo "$age" ?></a></button>
        <p class = "yo">Email:</p>
        <button class="b2" name="email"><a href="email_update.php" style="text-decoration: none; color: black;"><?php echo "$email" ?></a></button>
        <p class = "yo">Phone Number:</p>
        <button class="b2" name="phone"><a href="phone_update.php" style="text-decoration: none; color: black;"><?php echo "$phone" ?></a></button>
        <p class="yo"><a href="feedback_table.php" style="text-decoration: none; color: peachpuff;"><b><i>View Feedbacks</i></b></a></p>
        <p class="yo"><a href="delete_confirm.php" style="text-decoration: none; color: peachpuff;"><b><i>Delete Your Profile</i></b></a></p>
    </div>
</body>
</html>