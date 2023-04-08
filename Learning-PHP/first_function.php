<?php

$footballPositions = [
    ['name' => 'keeper', 'abbreviation' => 'GK', 'description' => 'keeping the ball out of the net preventing goals'],
    ['name' => 'defender', 'abbreviation' => 'CB', 'description' => 'Making attackers job as hard as possible by intercepting the ball'],
    ['name' => 'midfielder', 'abbreviation' => 'CM', 'description' => 'Passing and receiving the ball to help the attack keep going'],
    ['name' => 'attacker', 'abbreviation' => 'ST', 'description' => 'Shooting and scoring goals']
];

function footballFormating($position){
    return "{$position['name']} is abbreviated as {$position['abbreviation']} <br/> {$position['description']}";
}

?>

<html>
<head>
    <title> <?php echo 'PHP noob'; ?> </title>
</head>
<body>
<h1><i>Football Positions</i></h1>
<ul>
    <?php for ($i = 0; $i < count($footballPositions); $i++) { ?>
        <h3><?php echo "{$footballPositions[$i]['name']} ({$footballPositions[$i]['abbreviation']})" ?></h3>
        <li> <?php echo $footballPositions[$i]['description'] ?></li>
    <?php } ?>
</ul>
</body>
</html>
