<!DOCTYPE html>
<html>
    <head>
        <style>
            body {background-color:sandybrown;}
        </style>
    </head>
    <body>
        <?php
        $start = 1;
        $end = 10;
        $total = 0;
        for ($i = $start; $i <= $end; $i++) {
            $total += $i;
        }

        echo "Total number is " . $total;
        ?>
    </body>
</html>