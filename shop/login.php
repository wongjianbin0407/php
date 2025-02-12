<!DOCTYPE HTML>
<?php
session_start();
session_regenerate_id(true);
?>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<style>
    html,
    body {
        height: 100%;
    }

    .form-signin {
        max-width: 330px;
        padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .form-signin button[type="submit"] {
        background-color: blue;

    }
</style>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
            <img class="mb-4" src="https://media1.tenor.com/m/nXo2iPFb_IQAAAAd/burnice-zzz.gif" width="240"
                height="240">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" class="form-control" name="cincaila" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email/Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="sidanla" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <?php
            include 'config/database.php';

            if ($_POST) {
                // posted values
                $email = $_POST['cincaila'];
                $password = $_POST['sidanla'];
                $errors = [];

                if (empty($email)) {
                    $errors[] = "Email or username is required.";
                }
                if (empty($password)) {
                    $errors[] = "Password is required.";
                }

                // If there are errors, display them
                if (!empty($errors)) {
                    echo "<div class='alert alert-danger'><ul>";
                    foreach ($errors as $error) {
                        echo "<li>{$error}</li>";
                    }
                    echo "</ul></div>";
                } else {
                    // Query to check if email or username exists
                    $query = "SELECT username, password, account_status FROM customer WHERE username = ? LIMIT 1";

                    $stmt = $con->prepare($query);
                    $stmt->bindParam(1, $email);
                    $stmt->execute();
                    $num = $stmt->rowCount();
                    if ($num > 0) {
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $hashed_password = $row['password'];
                        $fetch_status = $row['account_status'];
                        if ($password == $hashed_password) {
                            if ($fetch_status == 1) {
                                $_SESSION['user_id'] = 1; // Example user ID
                                $_SESSION['username'] = $email;
                                $_SESSION['is_logged_in'] = true; // Login flag
                                header("Location: product_listing.php");
                                exit();
                            } else {
                                echo "<div class='alert alert-danger'>Account not active</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Invalid password.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Invalid username or email.</div>";
                    }
                }
            }
            ?>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>
</body>

</html>