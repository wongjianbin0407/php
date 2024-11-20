<!DOCTYPE html>
<html>
    <head>
        <style>
            body {background-color:sandybrown;}
            .p1 {font-style:bold; font-size:40px;}

        </style>
    </head>
    <body>
        <?php
        $t = rand(0,10);
        $r = rand(0,10);

        if ($t > $r ) {
            echo "<p class=p1>", $t, "</p>";
            echo "<p>", $r, "</p>";
        }
        else{
            echo "<p class=p1>", $r, "</p>";
            echo "<p>", $t, "</p>";
        }

        ?>
    </body>
</html>