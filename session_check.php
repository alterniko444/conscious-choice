<?php
session_start();
function isLoggedIn() 
{
    return isset($_SESSION['user_id']);
}

function getUsername() 
{
    $conn=mysqli_connect("localhost","root","","companies");
    $username= $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT fname FROM user_details WHERE user_id = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        $fname = $row['fname'];
        $stmt->close();
        $conn->close();
    }
    return $fname;
}

function getDetails()
{
    $conn=mysqli_connect("localhost","root","","companies");
    $username= $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT fname,lname,age,phoneno,email FROM user_details WHERE user_id = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
    }
    return $row;
}
if (!isLoggedIn()) {
    header("Location: login.html");
    exit();
}
function DeleteDetails()
{
    $conn=mysqli_connect("localhost","root","","companies");
    $username= $_SESSION['user_id'];
    $stmt = $conn->prepare("DELETE FROM user_details WHERE user_id = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
}
function validateUser($username, $password, $conn) 
{
    $stmt = $conn->prepare("SELECT * FROM user_details WHERE user_id = ? AND Passwd = ?");
    $username= $_SESSION['user_id'];
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}
?>
