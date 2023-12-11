<?php
session_start();
if (isset($_POST['submit'])) {
    $user = $_POST['id'];
    $password = $_POST['pass'];
    $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");
    
    // Use prepared statement to prevent SQL injection
    $q = "SELECT * FROM campuslink WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($con, $q);
    mysqli_stmt_bind_param($stmt, 'ss', $user, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['user'] = $user;
            header("Location: test1.php");
            exit();
        } else {
            echo "Login failed";
        }
    } else {
        // Log or handle the query error, don't display directly to the user
        error_log("Query failed: " . mysqli_error($con));
        echo "Login failed"; // Display a generic error message
    }
    
    mysqli_close($con);
}
?>
