<?php 
$servername = "localhost"; 
$username = "ali"; 
$password = "alif2004"; 
$dbname = "project"; 
 
$name = isset($_POST['name']) ? $_POST['name'] : ''; 
$email = isset($_POST['email']) ? $_POST['email'] : ''; 
$description = isset($_POST['description']) ? $_POST['description'] : ''; 


// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { 
  die("Connection failed: " . $conn->connect_error); 
} 
 
$sql = "SELECT id, title, img ,type FROM news"; 
$result = $conn->query($sql); 
 
$insert = "INSERT INTO contactus (name, email, description) 
VALUES ('" . $name . "','" . $email . "','" . $description . "')"; 
$conn->query($insert); 
 
$conn->close(); 
?> 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
<link href="./main.css" rel="stylesheet"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<section class="recentNews"> 
  <div class="container"> 
    <a href="./addnews.php" class="btn btn-primary">Add News</a> 
    <h2 class="news-title">FCI News</h2> 
    <div class="row"> 
      <?php 
      if ($result->num_rows > 0) { 
        // output data of each row 
        while ($row = $result->fetch_assoc()) { 
          echo '<div class="ct-blog col-sm-6 col-md-4"> 
          <div class="inner"> 
          <div class="fauxcrop"> 
              <a href="#"><img alt="News Entry" src="./uploads/' . $row['img'] . '"></a> 
              </div> 
              <div class="ct-blog-content" dir="rtl"> 
              <h3 class="ct-blog-header"> 
              ' . $row['type'] . ' 
              </h3><br> 
              <p> 
              ' . $row['title'] . ' 
              </p> 
            </div> 
            </div> 
            </div>'; 
        } 
      } 
      ?> 
    </div><br> 
    <br> 
    <h2 class="news-title">Contact Us</h2> 
    <div class="row"> 
      <div class="col-12"> 
        <form action="" method="post" enctype="multipart/form-data"> 
          <input type="text" class="form-control w-100" required name="name" placeholder="name"><br> 
          <input type="email" class="form-control w-100" required name="email" placeholder="email"><br> 
          <textarea class="form-control w-100" name="description"></textarea> 
          <input type="submit" class="btn btn-primary w-100"> 
        </form> 
      </div> 
    </div> 
  </div> 
</section>