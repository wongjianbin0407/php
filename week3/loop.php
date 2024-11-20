<!DOCTYPE html>
<html>
    <head>
        <style>
            body {background-color:sandybrown;}
        </style>
    </head>
    <body>
        <?php
        for ($r = 0; $r <= 100; $r = $r + 2){
            if ($r >= 1 && $r <= 9) {
                echo "Single digit number: $r <br>";
            }
            elseif ($r >= 10 && $r <= 99) {
                echo "Double digit number: $r <br>";
            }
            elseif ($r == 100) {
                echo "Three digit number: $r <br>";
            }
        }

        ?>
    </body>
</html>