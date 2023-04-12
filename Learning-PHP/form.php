<?php

#get sends data in th url
#post sends data in the request header (HIDDEN)
$errors = array('email' => '', 'from' => '', 'destination' => '');
$from = $email = $destination = '';

if(isset($_POST['submit'])){
    if (empty($_POST['email']))
    {
    $errors['email'] = "Please enter a email <br>";
    }else{
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
        $errors['email'] = "Enter email in the right way <br>";
        }
        else{
            echo $_POST['email'];
        }
    }
    if (empty($_POST['destination']))
    {
    $errors['destination'] = "Please enter a Destination <br>";
    }else{
        echo htmlspecialchars($_POST['destination']);
        echo "<br>";
    }
    if (empty($_POST['from']))
    {
    $errors['from'] = "Please enter the depart country <br>";
    }else{
        echo htmlspecialchars($_POST['from']);
    }
    //echo "THE DATA SENT FROM THE LAST FORM SUBMITION:<br>";
    
    if (!array_filter($errors))
    {
        header("Location: header.php");
    }

}
?>

<html>
<?php include "header.php"; ?>
<head>
<head>
<style>
	.red-error {
  	color: #FF0000;
  	font-size: 14px;
  	margin-top: 5px;
	}
        label{
        margin-top: 5px;    
        }
</style>
</head>
<h4 class = 'center'>Book a flight</h4>

<form action="index.php"  method = "POST">
    <label>Your Email:</label>
    <input type = 'text' name = 'email'>
    <div class = 'red-error'> <?php echo $errors['email']; ?> </div>
    <label>From:</label>
    <input type = 'text' name = 'from'>
    <div class = 'red-error'> <?php echo $errors['from']; ?> </div>
    <label>Destination:</label>
    <input type = 'text' name = 'destination'>
    <div class = 'red-error'> <?php echo $errors['destination']; ?> </div>

<div>
<input type='submit' name = 'submit' value = 'submit'>
</div>
</form>

<?php include "footer.php"; ?>
</html>
