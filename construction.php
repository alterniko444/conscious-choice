<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDUSTRY NAMES</title>
    <link rel = "stylesheet" href = "style5.css">
</head>
<body>
<?php include 'session_check.php'; ?>
    <div class="five" id="form">
        <form action="data.php" method="post">
        <nav>
        <img src="./hello.jpg" class="logo" alt="hello">
        <p> <button input type="submit" class="button" name="button" value="HOME">Logout</button></p>
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
    <p class="hello">CHOOSE A COMPANY</p>
    <button class="b1" name="button" value="CEMENTS">AMBUJA CEMENTS</button>
    <button class="b2" name="button" value="MARBELS">YELLOWSTONE MARBELS</button>
    <button class="b3" name="button" value="CONSTRUCTORS">DHC CONSTRUCTORS</button>
    </form>
    </div>
</body>
</html>