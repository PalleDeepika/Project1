<?php
if (isset($_POST['submit1'])) {
    $user = $_POST['id1'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $branch = $_POST['branch'];

    // Connect to the database
    $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the username is already taken
    $check_query = "SELECT * FROM clubs WHERE username = ?";
    $stmt = mysqli_prepare($con, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "Username is already taken.";
    } else {
        // Hash the password securely
        $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        // Insert the user into the database
        $insert_query = "INSERT INTO clubs (id1, pass, name, branch) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $insert_query);
        mysqli_stmt_bind_param($stmt, "ssss", $user, $pass, $name, $branch);
        if (mysqli_stmt_execute($stmt)) {
            echo "Sign up successful.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    mysqli_close($con);
}

?>