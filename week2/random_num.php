<!DOCTYPE html>
<html>
    <head>
        <style>
            body {background-color:sandybrown;}
            p1 {font-style:italic; color:green;}
            p2 {font-style:italic; color:blue;}
            p3 {font-style:bold; color:red;}
            p4 {font-style:italic; font-style:bold; color:black;}

        </style>
    </head> 
    <body>

        <?php
        $values = rand(100,200);
        $values1 = rand(100,200);
        $valuestotal = $values + $values1;
        $valuestotal1 = $values * $values1;

        echo "<p1>" . "The first random number is: " . $values . "</p1>";
        echo "<br>";
        echo "<p2>" . "The second random number is: " . $values1 . "</p2>";
        echo "<br>";
        echo "<p3>" . "After sum: " . $valuestotal . "</p3>";
        echo "<br>";
        echo "<p4>" . "After multiplication: " . $valuestotal1 . "</p4>";

        ?>

    </body>
</html>