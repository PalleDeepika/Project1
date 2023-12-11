<?php
session_start();
    if(isset($_POST['submit'])){
        $user = $_POST['id']; // Changed to 'email' since that's what the form uses
        $password = $_POST['password'];
            $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");

        $q = "SELECT * FROM clubs  WHERE id1='$user'  and pass='$password'";
        $result = mysqli_query($con,$q);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $_SESSION['user']=$user;
               header("Location: pro.php"); // Redirect to pro.php
                exit();
            } else {
                echo "Login failed";
            }
        } else {
            echo "Query failed: " . mysqli_error($con);
        }
        mysqli_close($con);
    }
?>