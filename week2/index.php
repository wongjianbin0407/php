<!DOCTYPE html>
<html>
    <head>
        <style>
           body {background-color: lightyellow;}
           span {color:orange}
           span1 {color:pink}
           span2 {color:blue}

        </style> 
    </head>
    <body>

    <?php
    date_default_timezone_set("Asia/Kuala_Lumpur");
    echo "<span>" . "Wong Jian Bin" . "</span>";
    echo "<br>";
    echo "<span1>" . date ("d.M.Y") . "</span1>";
    echo "<br>";
    echo "<span2>" . date("h:i:sa") . "</span2>";
    ?>

    </body>
</html>