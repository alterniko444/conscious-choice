<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDUSTRY TYPE</title>
    <link rel = "stylesheet" href = "style4.css">
</head>
<body>
    <?php include 'session_check.php'; ?>
    <div class="four" id="form">
    <form action="connection.php" method="POST">
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
        <p class="ind">CHOOSE AN INDUSTRY TYPE</p>
        <button class="b1" name="button" value="AGRICULTURE">AGRICULTURE</button>
        <button class="b2" name="button" value="COSMETICS">COSMETICS</button>
        <button class="b3" name="button" value="AUTOMOBILE">AUTOMOBILE</button>
        <button class="b4" name="button" value="POULTRY">POULTRY</button>
        <button class="b5" name="button" value="CONSTRUCTION">CONSTRUCTION</button>
    </form>
    </div>
</body>
</html>