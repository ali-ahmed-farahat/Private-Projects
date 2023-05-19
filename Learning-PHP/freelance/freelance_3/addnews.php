<?php 
$servername = "localhost"; 
$username = "ali"; 
$password = "ali2004"; 
$dbname = "news"; 
 
$target_dir = "./uploads/"; 
$target_file = $target_dir . basename($_FILES["img"]["name"]); 
$uploadOk = 1; 
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 
// Check if image file is a actual image or fake image 
// Check if image file is a actual image or fake image 
if (isset($_POST["submit"])) { 
    $check = getimagesize($_FILES["img"]["tmp_name"]); 
    if ($check !== false) { 
        echo "File is an image - " . $check["mime"] . "."; 
        $uploadOk = 1; 
    } else { 
        echo "File is not an image."; 
        $uploadOk = 0; 
    } 
} 
 
// Check if file already exists 
if (file_exists($target_file)) { 
    echo "Sorry, file already exists."; 
    $uploadOk = 0; 
} 
 
// Check file size 
if ($_FILES["img"]["size"] > 500000) { 
    echo "Sorry, your file is too large."; 
    $uploadOk = 0; 
} 
 
// Allow certain file formats 
if ( 
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
    && $imageFileType != "gif" 
) { 
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
    $uploadOk = 0; 
} 
$type = isset($_POST["type"]) ? $_POST["type"] : ''; 
$title = isset($_POST["title"]) ? $_POST["title"] : ''; 
$img = isset($_FILES["img"]) ? $_FILES["img"]['name'] : ''; 
 
move_uploaded_file($_FILES["img"]["tmp_name"], $target_file); 
 
if ($uploadOk == 0) { 
    echo "Sorry, your file was not uploaded."; 
} else { 
    $conn = new mysqli($servername, $username, $password, $dbname); 
    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 
 
    $sql = "INSERT INTO new (title, img,type) 
VALUES ('" . $title . "','" . $img . "','" . $type . "')"; 
 
    if ($conn->query($sql) === TRUE) { 
        $conn->close(); 
        header("Location:./news.php"); 
    } 
} 
 
?> 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
 
<section class="recentNews"> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-12"> 
                <form action="" method="post" enctype="multipart/form-data"> 
                    <input type="text" class="form-control" required name="type" placeholder="title"><br> 
                    <input type="text" class="form-control" required name="title" placeholder="description"><br> 
                    <input type="file" class="form-control" required name="img" placeholder="img"><br> 
                    <input type="submit" class="btn btn-primary w-100"> 
                </form> 
            </div> 
        </div> 
    </div> 
</section>