<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDUSTRY NAMES</title>
    <link rel="stylesheet" href="style5.css">
    <script src="script.js" defer></script>
</head>
<body>
    <?php include 'session_check.php'; ?>
    <div class="five" id="form">
        <form action="data.php" method="POST">
            <nav>
                <img src="./hello.jpg" class="logo" alt="hello">
                <p><button type="submit" class="button" name="button" value="HOME">Logout</button></p>
                <p class="yoyo">your choice matters.</p>
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
            <p class="hello">CHOOSE A COMPANY</p>
            <button type="submit" class="b1" name="button" value="FERTILIZERS">HELLO FERTILIZERS </button>
            <button type="submit" class="b2" name="button" value="FOODS">ABC FOODS</button>
            <button type="submit" class="b3" name="button" value="SUPPLIES">PS SUPPLIES</button>
        </form>
    </div>
</body>
</html>