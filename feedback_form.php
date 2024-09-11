<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDUSTRY NAMES</title>
    <link rel = "stylesheet" href = "style3.css">
</head>
<body>
<?php include 'session_check.php'; ?>
<div class="three">
    <nav>
        <img src="./hello.jpg" class="logo" alt="hello">
        <a href='index.php' style="text-decoration: none; color:purple;"><button type="submit" name="button" value="HOME">Logout</input></button></a>
        
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
            <h2 class="hey1">Enter your Feedback</h2>
            <form action="" method="POST">
                <textarea name="feedback" id="feedback" rows="4" style="width: 70%; margin: 5px auto; display: block; background-color:aliceblue; border-radius: 25px;" required ></textarea>
                <input type="submit" class="b1" name="SubmitFeedback" value="Submit">
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['SubmitFeedback'])) 
            {
                $feedback = $_POST['feedback'];
                $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
                $iNo = $_GET['i_no']; 

                if (!empty($userId) && !empty($feedback)) 
                {
                    $conn = new mysqli("localhost", "root", "", "companies");
                    
                    if ($conn->connect_error) 
                    {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM feedback WHERE User_id = ? AND I_no = ?");
                    $checkStmt->bind_param("si", $userId, $iNo);
                    $checkStmt->execute();
                    $checkResult = $checkStmt->get_result();
                    $count = $checkResult->fetch_assoc()['COUNT(*)'];
                    $checkStmt->close();
                    if ($count > 0) 
                    {
                        echo "<script>alert('You have already submitted a feedback for this industry.');window.location.href='industrytype.php';</script>";
                    } 
                    else 
                    {
                        $insertStmt = $conn->prepare("INSERT INTO feedback (User_id, I_no, Feedback) VALUES (?, ?, ?)");
                        $insertStmt->bind_param("sis", $userId, $iNo, $feedback);
                        if ($insertStmt->execute()) 
                        {
                            echo "<script>alert('Thank you for your feedback!');window.location.href='industrytype.php';</script>";
                        } else 
                        {
                            echo "<script>alert('Feedback submission failed. Please try again.');</script>";
                        }
                        $insertStmt->close();
                    }
                    $conn->close();
                } 
                else 
                {
                    echo "<script>alert('Invalid user or feedback. Please try again.');</script>";
                }
            }
            ?>

        </div>
    </body>
</html>