<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Announcements</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        /* Reset default margin and padding */
        body, h1, h2, p {
            margin: 0;
            padding: 0;
        }

        /* Set a background color for the entire page */
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        /* Center the content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Style the announcement container */
        .announcement-container {
            display: flex;
            align-items: left;
            justify-content: space-between;
            margin: 20px 0;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style the announcement image */
        .announcement-image {
            flex: 1;
            max-width: 40%;
        }

        /* Style the announcement description */
        .announcement-description {
            flex: 1;
            max-width: 55%;
            padding: 20px;
        }

        /* Style the announcement title */
        h2 {
            font-size: 24px;
            color: #333;
        }

        /* Style the announcement content */
        p {
            font-size: 16px;
            color: #666;
        }

        /* Add more CSS for styling as needed */
    </style>
</head>
<body>
    <div class="container">
        <h1>Announcements</h1>

        <?php
        if (isset($_GET['ann_name'])) {
            $name = $_GET['ann_name'];

            $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");
            $sql = "SELECT * FROM announments WHERE ann_name='$name';";

            // Execute the query
            $result = $con->query($sql);

            // Check if there are results
            if ($result->num_rows > 0) {
                while ($posts = $result->fetch_assoc()) {
                    // Now display the announcement details
                    echo '<div class="announcement-container">';
                    echo '<div class="announcement-image">';
                    echo '<img src="uploads/' . $posts['img'] . '" width="100%" height="600px" alt="Announcement Image">';
                    echo '</div>';
                    echo '<div class="announcement-description">';
                    echo '<h2>' . $posts['ann_name'] . '</h2>';
                    echo '<br>'.'<br>';
                    echo '<p>' . $posts['description'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }
        }
        ?>
        <!-- Example announcement 2 -->
        <!-- Add more announcements as needed -->

    </div>
</body>
</html>
