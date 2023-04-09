<?php

include 'content.php';
require 'content.php';
#include and require are the same the only diffrence is that require results in fetal error if the file doesn't exist
#while the include result in warning and the rest of th file executes noramlly
?>

<html>
<head>
    <title> <?php echo 'PHP noob'; ?> </title>
</head>
<body>

</body>
</html>
