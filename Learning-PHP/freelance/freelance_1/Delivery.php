<?php

$errors = array('country' => '','city' => '', 'street' => '', 'phone' => '');   //to initialize array for errors to be put in
$country = $phone = $city = $street = '';  //declaring them by default as empty strings
$connect = mysqli_connect('localhost', 'ali', 'alif2004', 'delivery'); //connecting to the database
if(!$connect){
  echo "Connection Error:" . mysqli_connect_error();   //if there's a error it'll be printed on the screen
}
if (isset($_POST['submit']))
{
    if (empty($_POST['country']))
    {
        $errors['country'] = 'Please enter your country';
    }
    else
    {
        $country = $_POST['country'];
    }
    if (empty($_POST['city']))
    {
        $errors['city'] = 'Please enter your city';
    }
    else
    {
        $city= $_POST['city'];
    }
    if (empty($_POST['street']))
    {
        $errors['street'] = 'Please enter your street';
    }
    else
    {
        $street = $_POST['street'];
    }
    if (empty($_POST['phone']))
    {
        $errors['phone'] = 'Please enter your address';
    }
    else
    {
        $phone = $_POST['phone'];
    }
    if (!array_filter($errors))
    {
        $sql = "INSERT INTO data_delivery (`country`, `city`, `street`, `phone`) VALUES ('$country','$city', '$street', '$phone')"; 
        $insert_result = mysqli_query($connect, $sql);
        $address_phone = ['country' => $_POST['country'], 'city' => $_POST['city'], 'street' => $_POST['street'], 'phone' => $_POST['phone']];
        $address_phone_encode = json_encode($address_phone);
        setcookie("address-phone", $address_phone_encode, time()+3600); // Cookie expires in 1 hour

        header("Location: Done.php");
        exit();
    }

}

?>


<HTML>
<head>
<title> Delivery Page </title>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">


</head>
<body>
<?php # include "header.php"; ?>
<div class = 'background'>
<div class = 'container'>
<div class = 'form-container'>
<h4 class = 'title'>Delivery Details</h4>
<form action="Delivery.php"  method = "POST">
    
    <label for = "country" > Country: </label>
        <input type = "country" id = "country" name = "country" placeholder = "country">
        <div class = 'red-error'> <?php echo $errors['country']; ?> </div>
        <br><br>

    <label for = "city" > City: </label>
        <input type = "city" id = "city" name = "city" placeholder = "city">
        <div class = 'red-error'> <?php echo $errors['city']; ?> </div>
        <br><br>
    
    <label for = "street" > Street: </label>
        <input type = "street" id = "street" name = "street" placeholder = "street">
        <div class = 'red-error'> <?php echo $errors['street']; ?> </div>
        <br><br>

    <label for = "phone">Phone Number:</label>
        <input type = "tel" id = "phone" name = "phone" placeholder = "1234-567-891" pattern = [0-9]{10} required>
        <div class = 'red-error'> <?php echo $errors['phone']; ?> </div>
    
    <br><br>    

    <div class = "cost">Cost of shipping = <?php?> $ </div>
    <br><br>
    <div class = 'button-container'>
        <input type='submit' name = 'submit' value = 'submit' class = "button">
    </div>
</div>
</div>
</div>
<?php # include "footer.php"; ?>