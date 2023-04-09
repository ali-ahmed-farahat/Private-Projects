<?php

#Passing values by refrence example

$age = 18;
function increment(&$num)
{
    $num++;
    echo "$num (inside function)";
}
increment($age);
echo "<br />";
echo "num after incrementation = $age";
?>

<html>
<head>
    <title> <?php echo 'PHP noob'; ?> </title>
</head>
<body>

</body>
</html>
