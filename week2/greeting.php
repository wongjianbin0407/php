<!DOCTYPE html>
<html>
    <head>
        <style>
            body {background-color:sandybrown;}
        </style>
    </head>
    <body>
        <?php
        $r = rand(0,23);

        if ($r >= 5 && $r <= 11) {
            echo "Good Morning! ", $r;
        }
        elseif ($r >= 12 && $r <= 17) {
            echo "Good afternoon! ", $r;
        }
        elseif ($r >= 18 && $r <= 21) {
            echo "Good evening! ", $r;
        }
        else {
            echo "Goodnight! ", $r;
        }

        ?>
    </body>
</html>