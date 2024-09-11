<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        body
        {
            margin:0;
            padding:0;
            background-image: url(tablebg2.jpeg);
            background-size: cover;
            background-position:center;
        }
        .top
        {
            display:inline-block;
            list-style-type: none;
            margin-left: auto;
            word-spacing: 50px;
            color: peachpuff;
        }
        .ftables
        {
            width:1262px;
            height:595px;
        }
        table {
            width: 50%;
            margin-left: 325px ;
            margin-top:10px;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 18px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #d2aa6d;
            color: white;
        }
        hello{
            text-align: center;
            color: yellow;
            margin: top 10%;
            margin:10px;
            padding-left: 550px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 25px;
        }
        .hello1{
            margin-left:270 px;
            text-align: center;
        }
        .logo{
            width: 140px;
        }
        .five{
            background-image: url(tablebg2.jpeg);
            background-position: center;
            background-size: contain;
            overflow: hidden;
        }
        .yoyo{
            color: white;
            font-style: italic;
            padding:5%;
            font-size: 25px;
        }
        nav{
            padding:10px;
            display:flex;
            align-items: center;
        }
        nav button{
            border-radius: 50%;
            background-color: peachpuff;
            height: 50px;
            width: 55px;
            border-color: palevioletred;
            font-family:Georgia, 'Times New Roman', Times, serif;
            font-weight: 400;
            color: purple;
        }
        .new{
            display: inline-block;
        }
        .btn{
            border-radius: 50%;
            background-color: peachpuff;
            height: 50px;
            width: 55px;
            border-color: palevioletred;
            font-family:Georgia, 'Times New Roman', Times, serif;
            font-weight: 400;
            color: purple;
        }
        a{
            text-decoration: none;
            color: peachpuff;
        }
    </style>
</head>
<body>
    <?php include 'session_check.php'; ?>
    <nav>
    <img src="./hello.jpg" class="logo" alt="hello">
    <a href="index.php"><button>Logout</button></a>
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
<div class=ftables>
<?php
$conn=mysqli_connect("localhost","root","","companies");
$conn = new mysqli("localhost","root","","companies");
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
if (isLoggedIn()) 
{
    $userId = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT i.name, f.feedback FROM industries i, feedback f, user_details u WHERE f.user_id = ? AND i.i_no=f.i_no AND f.user_id=u.user_id");
    $stmt->bind_param("s",$userId );
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) 
    {
        echo "<hello>". "Feedback History" . "</hello>";
        echo '<table>';
        echo '<tr><th>Company</th><th>Feedback</th>';
        while ($row = mysqli_fetch_assoc($result)) 
        {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["feedback"] . "</td>";
        }

        echo "</table>";
    } 
    else 
    {
        echo "<script>alert('No feedbacks available.');window.location.href='user_profile.php'</script>";
    }
}
$stmt->close();
$conn->close();
