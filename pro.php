<?php
session_start();
?>
<html>
<head>
    
    <style>
        /* styles.css */

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

/* Header styles */
header {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px;
}

/* Navigation styles */
nav ul {
    list-style-type: none;
    padding: 0;
}

nav li {
    display: inline;
    margin-right: 20px;
}

nav a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
}

/* Section styles */
section {
    background-color: white;
    padding: 20px;
    margin: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Footer styles */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
}

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #ddd;
}

    </style>
    <title>Club Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to the <?php echo $_SESSION['user'];?></h1>
    </header>

    
        <a href="faculty.php">Faculty Members</a>
        <a href="student.php">Student Members</a>
        <a href="an_up.php">Make An Announcement</a>
         <form method="post" enctype="multipart/form-data">
        <div class="post">
            <input type="text" placeholder="Write something..." name="Name" id="Name" />
            <input type="text" placeholder="Write something..." name="post" id="post" />
            <input type="file" name="my_image">
            <br>
            <br>
            <input type="submit" name="submit" value="Upload">
            <br>
            <br>
        </div>
    </form>
    
    <?php
    if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
        $name = $_POST['Name']; // Use 'Name' instead of 'name'
        $post = $_POST['post'];
         $user=$_SESSION['user'];
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];

        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");

// Check if the user ID matches a club in the 'clubs' table
echo $user;
$check_query = "SELECT name FROM clubs WHERE id1 = '$user'";
$check_result = mysqli_query($con, $check_query);

if ($check_result && mysqli_num_rows($check_result) > 0) {
    $club_name = mysqli_fetch_assoc($check_result)['name'];
    $y = "INSERT INTO announments (ann_name, description, img, club) VALUES ('$name', '$post', '$new_img_name', '$club_name')";
    $z = mysqli_query($con, $y);
    if ($z) {
        echo "Posted";
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "User's club not found or invalid user ID.";
}

mysqli_close($con);

               
            }
        }
    }
    ?>
    

   
    
    <section id="announcements">
        <h2>Announcements</h2>
        <?php
        $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");
        $user=$_SESSION['user'];
        $check_query = "SELECT name FROM clubs WHERE id1 = '$user'";
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
        mysqli_close($con);
        ?>
    </section>

    <footer>
        &copy; 2023 Campuslink
    </footer>
</body>
</html>
