<?php
session_start();
$conn=mysqli_connect("localhost","root","","companies");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$buttonValue = $_POST['button'];
function validateUser($username, $password, $conn) 
{
    $stmt = $conn->prepare("SELECT * FROM user_details WHERE user_id = ? AND Passwd = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}
if ($buttonValue== "submit")
{
    $username=$_POST['user'];
    $password=$_POST['pass'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $age=$_POST['age'];
    $phone=$_POST['phone'];
    $stmt = $conn->prepare("CALL InsertUserDetails(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssii", $username, $password, $fname, $lname, $email, $age, $phone);
    try{
        $stmt->execute();
        header("Location: login2.html");
    }
    catch(mysqli_sql_exception $exception)
    {
        $errorMessage = $exception->getMessage();
        echo "<script>alert('Error: $errorMessage');window.location.href='login.html';</script>";
    }
    $stmt->close();
}
elseif ($buttonValue== "login")
{
    $username=$_POST['user'];
    $password=$_POST['pass'];
    if (validateUser($username, $password, $conn))
    {
        $_SESSION['user_id'] = $username;
        header("Location: industrytype.php");
    }
    else
    {
        echo "<script>alert('Invalid username or password. Please try again.');window.location.href='login2.html';</script>";
    }
}
elseif ($buttonValue=="HOME")
{
    header("Location: index.php");
}
elseif ($buttonValue=="AGRICULTURE")
{
    header("Location: agriculture.php");
}
elseif ($buttonValue=="COSMETICS")
{
    header("Location: cosmetics.php");
}
elseif ($buttonValue=="AUTOMOBILE")
{
    header("Location: automobile.php");
}
elseif ($buttonValue=="POULTRY")
{
    header("Location: poultry.php");
}
elseif ($buttonValue=="CONSTRUCTION")
{
    header("Location: construction.php");
}

?>