<!DOCTYPE html>
<html>
    <body>
        <?php
        if (isset($_GET["email"])){
            $email = $_GET["email"];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                echo("$email is not a valid email address");
            }
        }
        if (isset($_GET["age"])){
            $age = $_GET["age"];

            if ($age >= 18 && $age <= 100){
                echo("Your age is $age");
            }
        }
       
        ?>
        <form name="user" action="<?php echo $_SERVER["PHP_SELF"];?>"  method="get">
        Name: <input type="text"name="name"><br>
        Email: <input type="text"name="email"><br>
        Age: <input type="text"name="age"><br>
        <input type="submit" value="Submit">
        </form>
    </body>
</html> 