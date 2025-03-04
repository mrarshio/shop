<?php
include("../conn.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize input
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Check if a file was uploaded
    if (isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../images/'; // Specify your upload directory
        $uploadFile = $uploadDir . basename($_FILES['picture']['name']);

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile)) {
            // Prepare the SQL statement
            $sql_insert = "INSERT INTO products (title, description, price, picture) VALUES ('$title', '$description', '$price', '$uploadFile')";
            $stmt = mysqli_prepare($conn, $sql_insert);
            // mysqli_stmt_bind_param($stmt, 'ssds', $title, $description, $price, $uploadFile);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                header("Location: index.php?new");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "No file uploaded or there was an upload error.";
    }
}

// Close the database connection
mysqli_close($conn);
?>