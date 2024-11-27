<!DOCTYPE html>
<html>
    <body>

    Welcome <?php echo $_GET["name"]; ?><br>
    Your Email: <?php echo $_GET["email"]; ?><br>
    Your Age: <?php echo $_GET["age"]; ?><br>
    <?php if($_GET["name"]==""){
        echo "Please enter your name.";
    }
    if($_GET["email"]==""){
        echo "Please enter your email.";
    }
    if($_GET["age"]==""){
        echo "Please enter your age.";
    }
    ?>
    </body>
</html>