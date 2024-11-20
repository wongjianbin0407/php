<!DOCTYPE html>
<html>
    <head>
        <style>
            body {background-color:sandybrown;}
        </style>
    </head>
    <body>
        <?php
        $r = rand(0,10);

        if ($r % 2 == 0) {
            echo $r, " Its even";
        }
        else {
            echo $r, " Its odd";
        }

        ?>

    </body>
</html>