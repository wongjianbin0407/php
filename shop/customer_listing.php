<!DOCTYPE HTML>
<?php
include 'menu.php';
// Check if the user is logged in
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}
?>
<html>

<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- container -->
    <div class="container">
        <div class="page-header">
            <h1>Read Customers</h1>
        </div>

        <?php
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'username';
        $ascdesc = isset($_GET['ascordesc']) ? $_GET['ascordesc'] : 'asc';
        // include database connection
        include 'config/database.php';

        // delete message prompt will be here

        // select all data
        $query = "SELECT username, firstname, lastname, gender, dob FROM customer ORDER BY $sort $ascdesc";
        $stmt = $con->prepare($query);
        $stmt->execute();

        // this is how to get number of rows returned
        $num = $stmt->rowCount();

        // link to create record form
        echo "<a href='customer_create.php' class='btn btn-primary m-b-1em'>Create New Customer</a>";

        //check if more than 0 record found
        if ($num > 0) {

            echo "<table class='table table-hover table-responsive table-bordered'>"; //start table

            //creating our table heading
            echo "<tr>";
            echo "<th>Username<a href='?ascordesc=asc&sort=username'> ⇃ </a><a href='?ascordesc=desc&sort=username'> ↾ </a></th>";
            echo "<th>FirstName<a href='?ascordesc=asc&sort=FirstName'> ⇃ </a><a href='?ascordesc=desc&sort=FirstName'> ↾ </a></th>";
            echo "<th>LastName<a href='?ascordesc=asc&sort=LastName'> ⇃ </a><a href='?ascordesc=desc&sort=LastName'> ↾ </a></th>";
            echo "<th>Gender</th>";
            echo "<th>Date of Birth</th>";
            echo "</tr>";

            // retrieve our table contents
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // extract row
                // this will make $row['firstname'] to just $firstname only
                extract($row);
                // creating new table row per record
                echo "<tr>";
                echo "<td>{$username}</td>";
                echo "<td>{$firstname}</td>";
                echo "<td>{$lastname}</td>";
                echo "<td>{$gender}</td>";
                echo "<td>{$dob}</td>";

                echo "<td>";
                // read one record
                echo "<a href='customer_details.php?username={$username}' class='btn btn-info m-r-1em'>Read</a>";

                // we will use this links on next part of this post
                echo "<a href='customer_update.php?username={$username}' class='btn btn-primary m-r-1em'>Edit</a>";

                // we will use this links on next part of this post
                echo "<a href='#' onclick='delete_user({$username});'  class='btn btn-danger'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }

            // end table
            echo "</table>";
        }
        // if no records found
        else {
            echo "<div class='alert alert-danger'>No records found.</div>";
        }
        ?>

    </div> <!-- end .container -->

    <!-- confirm delete record will be here -->

</body>

</html>