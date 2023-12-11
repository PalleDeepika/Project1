<?php
    session_start();
    $user = $_SESSION['user'];?>
    <!DOCTYPE html>
<html>
<head>
    <title>Club Page</title>
    <style>
        /* styles.css */
        #faculty-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        #faculty-table th, #faculty-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        #faculty-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        #faculty-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #faculty-table tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <?php

     // Connect to the database (replace with your database credentials)
    $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");

      //Check the connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

     // SQL query to retrieve faculty members' information based on the user's club using a nested query
    $query = "SELECT * from faculty_members
              WHERE club = (
                  SELECT name 
                  FROM clubs 
                  WHERE id1 = '$user'
              )";

//Execute the query
    $result = mysqli_query($con, $query);

      //Check if there are results
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table id='faculty-table'>";
            echo "<tr><th>Name</th><th>Department</th><th>Club</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
              
                echo "<td>" . $row['dept'] . "</td>";
                echo "<td>" . $row['club'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No faculty members found.";
        }
    } else {
        echo "Query execution failed: " . mysqli_error($con);
    }

     // Close the database connection
    mysqli_close($con);
    ?>
</body>
</html>
