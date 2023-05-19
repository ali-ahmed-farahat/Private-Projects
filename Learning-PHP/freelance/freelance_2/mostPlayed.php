<?php
$db_username = 'ali';
$db_password = 'alif2004';
$db = 'abdo';
$conn = mysqli_connect('localhost', $db_username, $db_password, $db);
if(!$conn){
    echo "Connection Error:" . mysqli_connect_error();   //if there's a error it'll be printed on the screen
  }

$games = 'SELECT item_id,name,price, COUNT(*) as count_id FROM `cart` GROUP BY item_id ORDER BY count_id DESC LIMIT 1';
$result = mysqli_query($conn, $games);

$most_played = mysqli_fetch_all($result);

$ID = $most_played[0][0];
$mostName = $most_played[0][1];
$price = $most_played[0][2];
$count = $most_played[0][3];



$details = $conn->query("SELECT description, img FROM `search` WHERE title = '" . $mostName . "' AND id = '$ID'");

$game_details= mysqli_fetch_assoc($details); 


$game_description = $game_details['description'];
$img_url = $game_details['img'];


// close connection
$conn->close();

if (isset($_POST['submit']))
{
    header("Location: feedback.php");
    exit();
}

?>


<HTML>
<head>
<link rel="stylesheet" href="main.css">
<link rel="stylesheet" href="fontawesome.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;800&display=swap"
            rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
            rel="stylesheet">
<title>Most Downloaded Games</title>
<style>
    .img {
   display: flex;
   justify-content: center;
   align-items: center;
   border: solid violet 2px;
}

.flexible-image {
   max-width: 100%;
   height: auto;
}
.title{
      color: #27292a;
      background: #eee;
      justify-content: center;
      align-items: center;
      font-family: 'poppins', sans-serif;
      display: flex;
   
}
.button-container{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 5vh;
    size: 100px;
    transform: scale(1.9);
  }


.button{
  border-radius: 30px;
  font-family: 'Poppins', sans-serif;
  background-color: white;
  color: black;
}
</style>
</head>
<body>
<div class = 'body'>
<div>
<div class = 'title'>
<h4> Most Downloaded Game of this week </h4>
</div>
<ul>
<li><h3>Name</h3> <?php echo $mostName;?></li>
<li><h3>Price</h3> <?php echo $price . "$";?></li>
<li><h3>Number of downloads</h3> <?php echo $count;?></li>  
<li> <?php echo "<h3>Description</h3>" . $game_description; ?> </li>
<br><br>
<div class = 'img'>
<img src="<?php echo $img_url;?>" alt="<?php echo $mostName;?>" class="flexible-image">
</div>
<div class = 'button-container'>
<a href = 'feedback.php'><input type='submit' name = 'feedback' value = 'give us your feedback' class = "button"></a>
</div>
</div>

</body>