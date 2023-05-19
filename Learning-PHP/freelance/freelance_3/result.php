<?php

$db_username = 'ali';
$db_password = 'alif2004';
$db = 'news';
$conn = mysqli_connect('localhost', $db_username, $db_password, $db);
if(!$conn){
    echo "Connection Error:" . mysqli_connect_error();   //if there's a error it'll be printed on the screen
  }

  $cookieValue = $_COOKIE["title"];      //the cookie from the last page "Booking-Airlines.php" which includes the from and to countries
  $title = json_decode($cookieValue, true);
  $data = "SELECT * FROM `new` WHERE `title` = '" . $title . "'";

$result = mysqli_query($conn, $data);

$full_details = mysqli_fetch_all($result);

#echo "<br>" . $full_details[0][0]. "<br>" . . "<br>" . $full_details[0][2] . "<br>" . $full_details[0][3] . "<br>";

#print_r($full_details);
if(isset($_POST['delete'])) {
    $sql = "DELETE FROM `new` WHERE `title` = '" . $title . "'";

    if(mysqli_query($conn, $sql)) {
        header("Location: deleted.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}

?>

<html>
<head>
    <title>نتائج البحث</title>
<style>
        .flexible-image {
   max-width: 50%;
   max-height: 30%;
   margin-left: 30%
        }
    .new{
        background-color:  #ccc;
        border-radius: 30px;
    }
.delete_button{
    color:red;
}
</style>
</head>
<body>
<div class = 'new'>
<div class = 'flexible-image'>
<img src="<?php echo $full_details[0][2];?>" alt="<?php echo $title;?>" class="flexible-image">
</div>
<h4><?php echo $full_details[0][1]; ?></h4>
<ul>
<li><?php echo  'التصنيف: ' . $full_details[0][3];?>

<br><br>
<form method="post">
    <button type="submit" name="delete" class = delete_button>مسح</button>
</form>

    </div>
</body>