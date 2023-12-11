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
                        $sql = "SELECT * FROM posts ";    
                        $res = mysqli_query($con, $sql);
                        if(mysqli_num_rows($res) > 0) {
                            while ($posts = mysqli_fetch_assoc($res)) {
                                echo '<br>';
                                echo $posts['username'];
                                echo '<div class="post">';
                                echo $posts['data'];
                                echo '<div style="text-align: left;"></div>';
                                echo '</div>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        
        <div class="right-sidebar">
            <div class="sidebar-title">
                <h4>Events</h4>
                <a href="#">See All</a>
            </div>
            <div class="event">
                <div class="left-event">
                    <h3>18</h3>
                    <span>March</span>
                </div>
                <div class="right-event">
                    <h4>Social Media</h4>
                    <p><i class="uil uil-map-pin-alt"></i>Visakhapatnam</p>
                    <a href="#">More Info</a>
                </div>
            </div>
            <div class "event">
                <div class="left-event">
                    <h3>22</h3>
                    <span>August</span>
                </div>
                <div class="right-event">
                    <h4>Culturals</h4>
                    <p><i class="uil uil-map-pin-alt"></i>Visakhapatnam</p>
                    <a href="#">More Info</a>
                </div>
            </div>
            <div class="sidebar-title">
                <h4>Conversations</h4>
                <a href="#">Hide Chat</a>
            </div>
            <div class="online-list">
                <div class="online"></div>
            </div>
        </div>
    </div>
</body>
<?php
if (isset($_POST['submit']) && isset($_FILES['my_image'])) {  
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
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
            $img_upload_path = 'uploads/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);
            
            $con=mysqli_connect("localhost","id21114212_pawan","Abcde1@3","id21114212_pawan");             
            $y = "INSERT INTO posts(data, username, image_url) VALUES('$post', '$user','$new_img_name')";
            $z = mysqli_query($con, $y);
            if ($z) {
                echo "Posted";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }
    }
    mysqli_close($con);
}
?>
</html>
