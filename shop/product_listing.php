<!DOCTYPE HTML>
<?php
include 'menu.php';
session_start();
session_regenerate_id(true);
// Check if the user is logged in
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
            <h1>Read Products</h1>
        </div>

        <?php
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
        $ascdesc = isset($_GET['ascordesc']) ? $_GET['ascordesc'] : 'asc';

        // include database connection
        include 'config/database.php';

        // delete message prompt will be here

        // select all data

        // read current record's data

        $query = "SELECT id, name, description, price, product_cat_name FROM products INNER JOIN product_cat ON products.product_cat = product_cat_id ORDER BY $sort $ascdesc";
        $stmt = $con->prepare($query);

        // this is how to get number of rows returned

        // link to create record form
        $stmt->execute();

        echo "<a href='product_create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";
        echo "<a href='?keyword=keyword'> </a>";

        $num = $stmt->rowCount();
        //check if more than 0 record found
        if ($num > 0) {

            echo "<table class='table table-hover table-responsive table-bordered'>"; //start table

            //creating our table heading
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name<a href='?ascordesc=asc&sort=name'> ⇃ </a><a href='?ascordesc=desc&sort=name'> ↾ </a></th>";
            echo "<th>Description</th>";
            echo "<th>Product Category</th>";
            echo "<th>Price<a href='?ascordesc=asc&sort=Price'> ⇃ </a><a href='?ascordesc=desc&sort=Price'> ↾ </a></th>";
            echo "<th>Action</th>";
            echo "</tr>";


            // retrieve our table contents
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // extract row
                // this will make $row['firstname'] to just $firstname only
                extract($row);
                // creating new table row per record
                echo "<tr>";
                echo "<td>{$id}</td>";
                echo "<td>{$name}</td>";
                echo "<td>{$description}</td>";
                echo "<td>[$product_cat_name]</td>";
                echo "<td>{$price}</td>";
                echo "<td>";
                // read one record
                echo "<a href='product_details.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";

                // we will use this links on next part of this post
                echo "<a href='product_update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";

                // we will use this links on next part of this post
                echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
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