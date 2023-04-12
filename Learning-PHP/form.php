<?php

#get sends data in th url
#post sends data in the request header (HIDDEN)
if(isset($_POST['submit'])){
    if (empty($_POST['email']))
    {
    echo "Please enter a email";
    }else{
        echo htmlspecialchars($_POST['email']);
        echo "<br>";
    }
    if (empty($_POST['destination']))
    {
    echo "Please enter a Destination";
    }else{
        echo htmlspecialchars($_POST['destination']);
        echo "<br>";
    }
    if (empty($_POST['from']))
    {
    echo "Please enter the depart country";
    }else{
        echo htmlspecialchars($_POST['from']);
    }
    //echo "THE DATA SENT FROM THE LAST FORM SUBMITION:<br>";
    


}
?>

<html>
<?php include "header.php"; ?>
<head>
<style>
		.red-error {
  		color: #FF0000;
  		font-size: 14px;
  		margin-top: 5px;
		}
</style>
</head>
<h4 class = 'center'>Book a flight</h4>

<form action="index.php"  method = "POST">
    <label>Your Email:</label>
    <input type = 'text' name = 'email'>
    <label>From:</label>
    <input type = 'text' name = 'from'>
    <label>Destination:</label>
    <input type = 'text' name = 'destination'>

<div>
<input type='submit' name = 'submit' value = 'submit'>
</div>
</form>

<?php include "footer.php"; ?>
</html>