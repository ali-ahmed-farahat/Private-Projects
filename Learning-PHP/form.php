<?php

#get sends data in th url
#post sends data in the request header (HIDDEN)
if(isset($_POST['submit'])){
    echo "THE DATA SENT FROM THE LAST FORM SUBMITION:<br>";
    echo htmlspecialchars($_POST['email']);
    echo "<br>";
    echo htmlspecialchars($_POST['from']);
    echo "<br>";
    echo htmlspecialchars($_POST['destination']);
}
?>

<html>
<?php include "header.php"; ?>
<head>

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