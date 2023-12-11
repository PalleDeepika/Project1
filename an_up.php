<?php
        $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");
    
        $check_query = "SELECT name FROM clubs ";
$check_result = mysqli_query($con, $check_query);


    $club_name = mysqli_fetch_assoc($check_result)['name'];
        $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");
        $sql = "SELECT * FROM announments where club='$club_name';";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            while ($posts = $result->fetch_assoc()) {
                echo '<a href="https://snpawan1107.000webhostapp.com/PROJECT/ann.php?ann_name=' . $posts['ann_name'] . '">' . $posts['ann_name'] . '</a>';
                echo "<br>";
            }
        }