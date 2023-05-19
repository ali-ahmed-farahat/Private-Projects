<?php

$db_username = 'ali';
$db_password = 'alif2004';
$db = 'news';
$conn = mysqli_connect('localhost', $db_username, $db_password, $db);
if(!$conn){
    echo "Connection Error:" . mysqli_connect_error();   //if there's a error it'll be printed on the screen
  }

$data = 'SELECT type, title FROM `new`';
$result = mysqli_query($conn, $data);
$categories = mysqli_fetch_all($result);

if (isset($_POST['search']))
{
    $title = $_POST['category'];
    
    $title_encode = json_encode($title);
    setcookie("title", $title_encode, time()+3600); // Cookie expires in 1 hour

    header("Location: result.php");
    exit();
}

?>

<html>
<head>
<title> البحث عن الخبر</title>
<link rel="stylesheet" href="main.css">
<style>
    .title{
    color:  #eee;
    background:#27292a;
    justify-content: center;
    align-items: center;
    font-size: xx-large;
    display: flex;
 
}
.right-side {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height:100%;
    background-color: #ccc;
  }
.search{
    margin-left: 90%;
}
label{
    font-size: 30px;
}
</style>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="autocomplete.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<div class = right-side>
<h4 class = title>
    ابحث عن الخبر
</h4>
<form action = 'search.php' method = 'POST'>
<div class = 'search'>
<label class = 'label' for = 'new'>أختر الخبر</label>
<select id="category" class="category" value = 'category' name = 'category' required>
<option value="">
اختر الخبر
</option>
<?php foreach($categories as $category){?>
<option value = '<?php echo $category[1]?>'> 
<?php echo $category[0]. "/" . $category[1];?>
</option>
<?php }?>

<div class = 'button-container'>
<a href = 'results.php'><input type='submit' name = 'search' value = 'أبحث' class = "button"></a>
</div>
</div>
    <div>
    