<!DOCTYPE html>
<html>

<head>
    <title>document</title>
</head>

<body>

    <h1>Passing data from PHP to JavaScript</h1>


    <?php
    $hi = "Hello World";
    ?>

    <script>
        var x = "<?php echo "$hi" ?>"; //passing data
        document.write(x);
    </script>
    <h1>Passing array from PHP to JavaScript</h1>
    <?php

    // Create an array
    $inventory = array(
        array("mandolin", 225, 460),
        array("classical guitar", 568, 1200),
        array("acoustic guitar", 365, 750),
        array("kazoo", 3.25, 6.8),
        array("djembe", 123, 250),
        array("sitar", 378, 810),
        array("bamboo flute", 15, 48)
    );

    ?>

    <script>
        // Access the array elements
        var passedArray = <?php echo json_encode($inventory); ?>;

        // Display the array elements
        for (var i = 0; i < passedArray.length; i++) {
            document.write(passedArray[i] + "<br>");

        }
    </script>

</body>

<html>