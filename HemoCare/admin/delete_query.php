<?php
include 'conn.php';

// Check if ID parameter exists
if(isset($_GET['id'])) {
    $que_id = $_GET['id'];

    // Delete the record
    $sql = "DELETE FROM contact_query WHERE query_id = {$que_id}";
    $result = mysqli_query($conn, $sql);

    // Close connection
    mysqli_close($conn);

    // Redirect back to query.php with success message
    header("Location: query.php?delete=success");
    exit();
} else {
    // If no ID provided, redirect with error message
    header("Location: query.php?delete=error");
    exit();
}
?>