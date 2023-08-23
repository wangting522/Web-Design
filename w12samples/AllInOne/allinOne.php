<!DOCTYPE html>
<html lang="en">
<head>
<script src="test.js" defer ></script>
<link rel="stylesheet" href="style.css">

</head>
    
<body>
<?php
$name="CST8285";
$age= 30;
$discountLimit= 50; //may be from database connection

?>

    <h1> All in one </h1>
    <!-- <label for="discountLimit "></label> -->
    <!-- hiddin information -->
    <input type="text"  id="discountlimit" name="discountlimit"  hidden value = "<?= $discountLimit ?>">
    <label for="discount ">Discount:</label>   
    <input type="text"  id="discount" name="discount" onchange ="testD();">
  
    <br>
    <br>
    <select id="newitem" onchange ="testJ(this);">
    <option value="" selected disabled >select an item</option>
    //options are PHP variables
    <option value="<?= $name ?>" >Name</option> //short form for inserting php code
    <option value="<?= $age ?>" >  Age</option>
                
</body>

</html>