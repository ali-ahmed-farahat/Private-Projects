<?php

$products = [
    ['name' => 'Banana', 'Description' => 'Yellow-Peelable and delicious', 'price' => 15],
    ['name' => 'Apple', 'Description' => 'Red-Green-Yellow and firm and Sugary', 'price' => 30],
    ['name' => 'Strawberry', 'Description' => 'Red and tiny and yummy', 'price' => 10]
];

?>

<html>

<head>
    <title> <?php echo 'PHP noob'; ?> </title>
</head>
<body>
<h2>Products you can buy with 15$</h2>
<ul>
<?php  foreach ($products as $product) { ?>
<?php if ($product['price'] <= 15) {?>
<h3><?php echo $product['name'] ?></h5>
<li> <?php echo $product['Description'] ?></li>
<?php } ?>
<?php } ?>
</ul>
</body>
</html>
