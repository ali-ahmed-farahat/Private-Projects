<?php

$db_username = 'ali';
$db_password = 'alif2004';
$db = 'abdo';
$conn = mysqli_connect('localhost', $db_username, $db_password, $db);
if(!$conn){
    echo "Connection Error:" . mysqli_connect_error();   //if there's a error it'll be printed on the screen
  }
if (isset($_POST['submit']))
{
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    $sql = "INSERT INTO feedback (`email`, `feedback`)
             VALUES ('$email','$feedback')"; 
    $insert_result = mysqli_query($conn, $sql);
    header("Location: done.php");
    exit();
}
?>
<HTML>
<head>
<title>Feedback</title>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="fontawesome.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
    rel="stylesheet">
</head>
<title>Most Downloaded Games</title>
<div class = 'form-container'>
<h4 class = 'title'>Delivery Details</h4>
<form action="feedback.php"  method = "POST">
    
    <label for = "feedback" > How was your experience: </label>
        <input type = "feedback" id = "feedback" name = "feedback" placeholder = "Please enter your feedback" required>
        <br><br>


    <label for = "email" > email: </label>
        <input type = "email" id = "email" name = "email" placeholder = "Please enter your email"required>
        <br><br>

    
    <br><br>    
    <div class = 'button-container'>
        <input type='submit' name = 'submit' value = 'submit' class = "button">
    </div>
</div>