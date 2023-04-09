<html>
<style>


.box{
    background-color: cornflowerblue;
    width: 200px;
    length: 200px;
    border: crimson 1px;
    padding: 2px;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  }

.head{
  color: red;
  font-family: 'Courier New', Courier, monospace;
}

</style>
<?php $employee = [ 'firstname' => 'ALI', 'lastname' => 'ALMONGY', 'age' => 18, 'headline' => 'Rising Egyptian Software Engineer ready to kick off'];?>

<p class = "box">
    <h1 class = "head"> <?php echo $employee['firstname'] ?> </h1>
<ul>
<li> Full Name = <?php echo $employee['firstname'] . ' ' .$employee['lastname']; ?>
<li> age = <?php echo $employee['age']?>
<li> headline = <i> <?php echo $employee['headline']?> </i>
</ul>
</p>

</html>
