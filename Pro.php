<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lucida+Handwriting">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .font {
            font-family: "Lucida Handwriting", fantasy;
        }
        .sidebar-icons {
            font-size: 24px;
            gap: 0px;
            color: darkslateblue;
        }
        .search-box {
            gap: 0px;
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .mySlides {
            height: 50%;
        }
        .post-section {
            width: 65%;
            gap: 0px;
            background-color: white;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
            margin: 0px;
        }
        .chat-box {
            position: fixed;
            bottom: 10px;
            right: 10px;
            background-color: #3498db;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .post {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
        }
        .user-info {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .post-content {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        .post-text {
            flex-grow: 1;
        }
        .post-text pre {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .post-content img {
            max-width: 200px;
            max-height: 150px;
        }
        .post-actions {
            display: flex;
            justify-content: flex-end;
        }
        .like-btn, .comment-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-left: 10px;
            cursor: pointer;
        }
        .comment-btn {
            background-color: #e74c3c;
        }
        .sidebar{
            display: flex;
            margin-left: 100px;
        }
        .sidebar ul{
            display: flex;
        }
        .bar-item{
           padding: 10px 10px;
        }
    </style>
    
</head>
<body>
    <div>
        <div class="sidebar" id="mySidebar">
            <div class="font">
                <img src="logo.jpg" width="200" height="200">
            </div>
            <ul>
                <li><a class="bar-item button active large" href="#home"><i class="fa fa-home sidebar-icons"></i><b>Home</b></a></li><br>
                <li><a class="bar-item button active large" href="#friends"><i class="fa fa-link sidebar-icons"></i><b>Friends</b></a></li><br>
                <li><a class="bar-item button active large" href="pp.php"><i class="fa fa-user sidebar-icons"></i><b>Profile</b></a></li><br>
                <li><a class="bar-item button active large" href="post.php"><i class="fa fa-plus sidebar-icons"></i> <b>Post</b></a></li><br>
                <li><a class="bar-item button active large" href="#settings"><i class="fa fa-cog sidebar-icons"></i><b>Settings</b></a></li><br>
                <div class="w3-dropdown-hover">
                    <button class="button">
                        <li><a class="bar-item" href="#clubs"><i class="fa fa-users sidebar-icons"></i>Clubs<i class="fa fa-caret-down"></i></a></li><br>
                    </button>
                    <div class="w3-dropdown-content w3-bar-block">
                        <a href="#" class="w3-bar-item w3-button">Voice club</a>
                        <a href="#" class="w3-bar-item w3-button">Entrepreneur club</a>
                        <a href="#" class="w3-bar-item w3-button">UI/UX club</a>
                        <a href="#" class="w3-bar-item w3-button">Coding club</a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <center>
        <div style="max-width:800px">
            <img class="mySlides" src="img_la.jpg" style="width:100%">
            <img class="mySlides" src="img_ny.jpg" style="width:100%">
            <img class="mySlides" src="img_chicago.jpg" style="width:100%">
        </div>
        <div class="post-section">
            <?php
$con=mysqli_connect("localhost","id21114212_pawan","Abcde1@3","id21114212_pawan");
$sql = "SELECT * FROM posts ORDER BY post_id DESC";
            $res = mysqli_query($con, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($posts = mysqli_fetch_assoc($res)) {
                    echo '<div class="post" style="display: flex; align-items: center; border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">';
                    echo '<div style="flex-grow: 1;">';
                    echo '<div style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">' . $posts['username'] . '</div>';
                    echo '<div style="flex-shrink: 0; margin-right: 10px;">';
                    echo '<img src="uploads/' . $posts['image_url'] . '" alt="Result Image" width="100" height="75" style="border: 1px solid #ccc;">';
                    echo '</div>';
                    echo '<div style="white-space: pre-wrap;">' . $posts['data'] . '</div>';
                    echo '</div>';
                    echo $posts['time'];
                    echo '<div style="flex-shrink: 0; display: flex; align-items: center;">';
                    echo '<button style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 5px; margin-right: 5px;">Like</button>';
                    echo '<button style="background-color: #e74c3c; color: white; border: none; padding: 10px 20px; border-radius: 5px;">Comment</button>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
            <br>
            <br><br>
            <br></br>
        </div>
   
    <div class="search-container">
        <form method="post">
            Search <input type="text" name="search">
            <input type="submit">
        </form>
        </center>
    </div>
    <?php
    $search = $_POST['search'];
$con=mysqli_connect("localhost","id21114212_pawan","Abcde1@3","id21114212_pawan");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $sql = "SELECT * FROM campuslink WHERE username REGEXP '^$search';";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           echo '<center>';
            echo '<ul>';

            echo '<hr>';
            echo '<a href="user_profile.php?username=' . $row['username'] . '">' . $row['username'] . '</a>';

            echo '</ul>';
            echo '</center>'; }
    } else {
        echo "0 records";
    }

    $con->close();
    ?>
    <div class="chat-box">
        <i class="fa fa-comment" style="font-size: 20px;"></i> Chat
    </div>
    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 1000); // Change image every 2 seconds
        }
    </script>
</body>
</html>
