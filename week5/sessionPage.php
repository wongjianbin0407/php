<!DOCTYPE html>
<html>

<body>
    <?php
    session_start();

    echo 'Username: ' . $_SESSION['username'] . '<br>';
    echo 'Email: ' . $_SESSION['email'] . '<br>';
    ?>
</body>

</html>