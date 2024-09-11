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

        th:hover {
            background-color: #f5f5f5;
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
    <input type="submit" class="btn" name="button" value="Logout" a href="index.php"></a></input>
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
$buttonValue = $_POST['button'];
function displayCategoryDetails($i_no) {
    $conn = new mysqli("localhost","root","","companies");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    for ($wtype = 1; $wtype <= 3; $wtype++) {
        $stmt = $conn->prepare("SELECT * FROM categories c, waste_type w WHERE c.w_type = ? AND c.i_no = ? and c.w_type=w.wastetypeid");
        $stmt->bind_param("ss", $wtype, $i_no);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) > 0) 
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                echo "<hello>". $row["TYPENAME"] . " Details" . "</hello>";
                echo '<table>';
                echo '<tr><th>Leftover</th><th>Recycled</th><th>Weight</th>';
                echo "<tr><td>" . $row["LEFTOVER"] . "</td><td>" . $row["RECYCLED"] . "</td><td>" . $row["WEIGHT"] . "</td>";
            }

            echo "</table>";
        } else {
            echo "<script>alert('0 results for Waste Type $wtype!');window.location.href='industrytype.php'</script>";
        }
    }

    $stmt->close();
    $conn->close();
}
if ($buttonValue=="Logout")
{
    header("Location: index.php");
}
elseif ($buttonValue=="FERTILIZERS")
{
    displayCategoryDetails(1);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=1'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="FOODS")
{
    displayCategoryDetails(2);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=2'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="SUPPLIES")
{
    displayCategoryDetails(3);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=3'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="PONDS")
{
    displayCategoryDetails(4);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=4'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="MAYBELLINE")
{
    displayCategoryDetails(5);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=5'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="OLDSPICE")
{
    displayCategoryDetails(6);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=6'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="BENZ")
{
    displayCategoryDetails(7);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=7'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="SUZUKI")
{
    displayCategoryDetails(8);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=8'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="MITSUBISHI")
{
    displayCategoryDetails(9);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=9'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="MEETATMEAT")
{
    displayCategoryDetails(10);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=10'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="EGGS")
{
    displayCategoryDetails(11);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=11'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="FRESHSERVE")
{
    displayCategoryDetails(12);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=12'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="CEMENTS")
{
    displayCategoryDetails(13);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=13'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="MARBELS")
{
    displayCategoryDetails(14);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=14'>here</a> to give feedback!</p>";
}
elseif ($buttonValue=="CONSTRUCTORS")
{
    displayCategoryDetails(15);
    echo "<p class='hello1'>Click <a href='feedback_form.php?i_no=15'>here</a> to give feedback!</p>";
}
?>
</div>
</body>
</html>
