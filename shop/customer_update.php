<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Update Customer</h1>
        </div>
        <?php
        // get passed parameter value, in this case, the record ID
        // isset() is a PHP function used to verify if a value is there or not
        $name = isset($_GET['username']) ? $_GET['username'] : die('ERROR: Record ID not found.');

        //include database connection
        include 'config/database.php';

        // read current record's data
        try {
            // prepare select query
            $query = "SELECT username, password, firstname, lastname, gender, dob FROM customer WHERE username = ?";
            $stmt = $con->prepare($query);

            // this is the first question mark
            $stmt->bindParam(1, $name);

            // execute our query
            $stmt->execute();

            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // values to fill up our form
            $user = $row['username'];
            $pass = $row['password'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $sex = $row['gender'];
            $dateofbirth = $row['dob'];
        }

        // show error
        catch (PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
        ?>

        <?php
        // check if form was submitted
        if ($_POST) {
            try {
                // write update query
                // in this case, it seemed like we have so many fields to pass and
                // it is better to label them and not use question marks
                $query = "UPDATE customer
                  SET username=:username, password=:password, firstname=:firstname, lastname=:lastname, gender=:gemder, dob=:dob WHERE username = ?";
                // prepare query for excecution
                $stmt = $con->prepare($query);
                $stmt->bindParam(1, $name);
                // posted values
                $password = htmlspecialchars(strip_tags($_POST['password']));
                $firstname = htmlspecialchars(strip_tags($_POST['firstname']));
                $lastname = htmlspecialchars(strip_tags($_POST['lastname']));

                $dob = htmlspecialchars(strip_tags($_POST['dob']));

                if (empty($password)) {
                    $errors[] = "Description is required.";
                }
                if (empty($firstname)) {
                    $errors[] = "Product category is required.";
                }
                if (empty($lastname)) {
                    $errors[] = "Price is required.";
                }
                if (isset($_POST['gender']) && !empty($_POST['gender'])) {
                    $gender = htmlspecialchars(strip_tags($_POST['gender']));
                } else {
                    $errors[] = "error";
                }
                if (empty($dob)) {
                    $errors[] = "Expired date is required.";
                }

                // If there are errors, display them
                if (!empty($errors)) {
                    echo "<div class='alert alert-danger'><ul>";
                    foreach ($errors as $error) {
                        echo "<li>{$error}</li>";
                    }
                    echo "</ul></div>";
                } else {
                    // bind the parameters
                    $stmt->bindParam(':username', $user);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':firstname', $firstname);
                    $stmt->bindParam(':lastname', $lastname);
                    $stmt->bindParam(':gender', $gender);
                    $stmt->bindParam(':dob', $dob);
                    // Execute the query
                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>Record was updated.</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
                    }
                }
            }
            // show errors
            catch (PDOException $exception) {
                die('ERROR: ' . $exception->getMessage());
            }
        } ?>


        <!--we have our html form here where new record information can be updated-->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?username={$name}"); ?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>Password</td>
                    <td><textarea name='password' class='form-control'><?php echo $pass;  ?></textarea></td>
                </tr>
                <tr>
                    <td>First name</td>
                    <td><input type='text' name='firstname' value="<?php echo $firstname;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Last name/td>
                    <td><input type='text' name='lastname' value="<?php echo $lastname;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><input type='radio' name='gender' value='male' />
                        <label for='male'>Male</label<br>
                            <input type='radio' name='gender' value='female' />
                            <label for='Female'>Female</label<br>
                    </td>
                </tr>
                <tr>
                    <td>DOB</td>
                    <td><input type='date' name='dob' value="<?php echo $dateofbirth;  ?>" class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save Changes' class='btn btn-primary' />
                        <a href='customer_listing.php' class='btn btn-danger'>Back to Customer listing</a>
                    </td>
                </tr>
            </table>
        </form>

    </div>
    <!-- end .container -->
</body>

</html>