<!DOCTYPE HTML>
<html>

<head>
    <title>PDO - Read One Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Customer details</h1>
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
            $query = "SELECT username, password, firstname, lastname, gender, dob, registration_date, account_status FROM customer WHERE username = ? LIMIT 0,1";
            $stmt = $con->prepare($query);

            // this refer to the first question mark
            $stmt->bindParam(1, $name);

            // execute our query
            $stmt->execute();

            // store retrieved row to a variable
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // values to fill up our form
            $fetched_name = $row['username'];
            $fetched_password = $row['password'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $gender = $row['gender'];
            $dob = $row['dob'];
            $registration_date = $row['registration_date'];
            $account_status = $row['account_status'];
        }

        // show error
        catch (PDOException $exception) {
            die('ERROR: ' . $exception->getMessage());
        }
        ?>


        <!--we have our html table here where the record will be displayed-->
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>Username</td>
                <td><?php echo $fetched_name;  ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?php echo $fetched_password;  ?></td>
            </tr>
            <tr>
                <td>FirstName</td>
                <td><?php echo $firstname;  ?></td>
            </tr>
            <tr>
                <td>LastName</td>
                <td><?php echo $lastname;  ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $gender;  ?></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><?php echo $dob;  ?></td>
            </tr>
            <tr>
                <td>Registration Date</td>
                <td><?php echo $registration_date;  ?></td>
            </tr>
            <tr>
                <td>Account Status</td>
                <td><?php echo $account_status;  ?></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href='customer_listing.php' class='btn btn-danger'>Back to customer listing</a>
                </td>
            </tr>
        </table>


    </div> <!-- end .container -->

</body>

</html>