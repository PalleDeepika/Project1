<?php 
session_start();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusLink - Let's connect</title>
    <link rel="stylesheet" href="homepage.css"> 
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="nav_left">
            <h2 class="logo">CampusLink</h2>
        </div>
        
        <div class="nav_right">
            <div class="search-box">
                <form method="post">
                    <img src="search.png" alt="Search Icon">
                    <input type="text" name="search" placeholder="Search">
                    <button type="submit" name="search_button" style="background: transparent; border: none; padding: 10px; cursor: pointer;">Submit</button>
                </form>
                <div class="search-results">
                    <?php
                    if (isset($_POST['search_button'])) {
                        $search = $_POST['search'];
                        $con = mysqli_connect("localhost", "id21114212_pawan", "Abcde1@3", "id21114212_pawan");

                        if ($con->connect_error) {
                            die("Connection failed: " . $con->connect_error);
                        } else {
                            $sql = "SELECT * FROM campuslink WHERE username REGEXP '^$search'";
                            $result = $con->query($sql);

                            if ($result->num_rows > 0) {
                                echo '<ul>';
                                while ($row = $result->fetch_assoc()) {
                                    echo '<li><a href="user_profile.php?username=' . $row['username'] . '">' . $row['username'] . '</a></li>';
                                }
                                echo '</ul>';
                            } else {
                                echo "0 records";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        <center>    
            <div class="nav-user-icon online">
                <a href="pp.php"><img src="images/profile-pic.png" alt="Profile Picture"></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="left-sidebar">
            <div class="imp-links">
                <a href="#"><i class="uil uil-newspaper"></i>Latest News</a>
                <a href="#"><i class="uil uil-users-alt"></i>Friends</a>
                <a href="#"><i class="uil uil-users-alt"></i>Group</a>
                <a href="an_up.php"><i class="uil uil-megaphone"></i>announcements</a>
                <a href="pp.php"><i class="uil uil-play-circle"></i>profile</a>
                <a href="logout.php"><i class="uil uil-signout"></i>Logout</a>
                <a href="#">See More</a>
            </div>
            <div class="shortcut-links">
                <p>Your Shortcuts</p>
                <a href="#"><img src="shortcut-1.png" alt="Shortcut 1">Web Developers</a>
                <a href="#"><img src="shortcut-2.png" alt="Shortcut 2">Web Developers</a>
                <a href="#"><img src="shortcut-3.png" alt="Shortcut 3">Web Developers</a>
                <a href="#"><img src="shortcut-4.png" alt="Shortcut 4">Web Developers</a>
            </div>
        </div>
        
        
        <div class="main-content">
            <div class="write-post-container">
                <div class="post-input-container" style="padding-left:55px; padding-top:20px; width:100%; background: #fff; border-radius:6px; padding:20px; color:#626262; margin:20px 0;">
                   <?php 
                        $user=$_SESSION['user'];    
                        $con=mysqli_connect("localhost","id21114212_pawan","Abcde1@3","id21114212_pawan");                        
                        $sql = "SELECT * FROM campuslink where username='$user'";    
                        $res = mysqli_query($con, $sql);
                        if ($campuslink = mysqli_fetch_assoc($res)) {
                            echo '<div class="content">';
                            echo '<div class="profile-header">';
                            echo '<img src="uploads/' . $campuslink['profile_pic_url'] . '" alt="Profile Image" width="100" height="75" style="border-radius: 50%;">';     
                            echo '<h1 class="profile-name">' . $campuslink['name'] . '</h1>';
                            echo '<p class="profile-info">' . $campuslink['role'] . '</p>';
                            echo '<p class="profile-info">Email:' . $campuslink['email'] . '</p>';
                            echo '</div>';
                        }
                    ?>
<br>                    <hr>
                    
                   <div class="user-profile">
                    <div>
                        <?php
           $con=mysqli_connect("localhost","id21114212_pawan","Abcde1@3","id21114212_pawan");

            $sql = "SELECT * FROM posts ";
            $res = mysqli_query($con, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($posts = mysqli_fetch_assoc($res)) {
                    echo '<div class="post" style="width:100%; background: #fff; border-radius:6px; padding:20px; color:#626262; margin:20px 0;">';
                    echo '<div style="display=flex; align-items:center;">';
                    echo '<div style="margin-bottom:5px;font-weight:500;color:#626262">' . $posts['username'] . '</div>';
                    
                    echo '<div style="flex-shrink: 0; margin-right: 10px;">';
                    
                    echo '</div>';
                    echo '<div style="color:#9a9a9a; margin:15px 0;font-size:15px;">' . $posts['data'] . '</div>';
                    echo '</div>';
                    echo '<img src="uploads/' . $posts['image_url'] . '" alt="Result Image" style="width:100%;border-radius:4px";margin-bottom:5px;>';
                    
                    echo '<div style="flex-shrink: 0; display: flex; align-items: center">';
                    echo '';
                    echo '<div class="social-icons" style="display: flex; align-items: center; justify-content: space-between; color: pink;">';
                    echo '<a style="margin:5px 30px 0 30px; color:red;" href="#"><i class="uil uil-thumbs-up"></i></a>';
                    echo '<a style="margin:5px 30px 0 30px; color:red;" href="#"><i class="uil uil-comments-alt"></i></a>';
                    echo '<a style="margin:5px 30px 0 30px; color:red;" href="#"><i class="uil uil-share"></i></a>';
                    echo '</div>';
                    echo '<div style="margin-left:180px;margin-top:5px;font-size:13px;color:#9a9a9a;">'.$posts['time'].'</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
                    </div>
                    
                </div>
                </div>
            </div>
        </div>
        
      
        </div>
    </div>
    </center>
</body>
</html>
