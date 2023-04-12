<?php

#get sends data in th url
#post sends data in the request header (HIDDEN)
$errors = array('class' => '', 'from' => '', 'to' => '');   //to initialize array for errors to be put in
$from = $email = $destination = '';  //declaring them by default as empty strings

if(isset($_POST['submit'])){  //if submit was pushed
    if (empty($_POST['class']))  
    {
    $errors['class'] = "Please choose the class you're flying by! <br>"; 
    }else{
        $email = $_POST['class'];
//       if (!filter_var($email, FILTER_VALIDATE_EMAIL))
//        {
//        $errors['email'] = "Enter email in the right way <br>";
//        }
    }
    if (empty($_POST['to']))
    {
    $errors['to'] = "Please enter a Destination <br>";
    }
    if (empty($_POST['from']))
    {
    $errors['from'] = "Please enter the depart country <br>";
    }
    //echo "THE DATA SENT FROM THE LAST FORM SUBMITION:<br>";
    
    if (!array_filter($errors))
    {
        header("Location: header.php");
    } //if all errors strings are empty redirect to next page

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
    <label>Your Class:</label>
    <input type="radio" class="radio" value="class">
            <label for="economic">economy</label><br>
            <input type="radio" class="radio" value="class">
            <label for="business">business</label><br>
            <input type="radio" class="radio" value="class">
            <label for="first">first</label><br><br>
    <div class = 'red-error'> <?php echo $errors['class']; ?> </div>
    <label>From:</label>
    <input type = 'text' name = 'from'>
    <div class = 'red-error'> <?php echo $errors['from']; ?> </div>
    <label>Destination:</label>
    <input type = 'text' name = 'to'>
    <div class = 'red-error'> <?php echo $errors['to']; ?> </div>

<div>
<input type='submit' name = 'submit' value = 'submit'>
</div>
</form>

<?php include "footer.php"; ?>
</html>
