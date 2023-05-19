<?php

$conn = mysqli_connect('localhost', 'ali', 'alif2004' , 'news') or die($conn); 

// Get search term from AJAX request
$searchTerm = $_GET['term'];

// SQL query to get matching titles
$query = "SELECT title FROM news WHERE title LIKE '%".$searchTerm."%'";

$result = mysqli_query($con, $query);

$data = array();

// Loop through query results and add to data array
while ($row = mysqli_fetch_assoc($result)) {
    array_push($data, $row['title']);
}

// Send data array as JSON response
echo json_encode($data);
?>
