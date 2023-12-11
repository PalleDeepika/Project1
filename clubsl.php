<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="cont">
    <div class="form sign-in">
      <h2>Sign In</h2>
      <form method="post"  action="loginc.php">
        <label>
          <span>UserName</span>
          <input type="text" name="id" id="id"/>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password" id="password"/>
        </label>
        <button class="submit" type="submit" name="submit">Sign In</button>
        
      </form>
      
      <p class="forgot-pass">Forgot Password ?</p>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover a great amount of new opportunities!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already have an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>Sign Up</h2>
        <form method="post" action="registerc.php" >
        <label>
          <span>Clubname</span>
          <input type="text" id="id1" name="id1" />
        </label>
        <label>
          <span>Password</span>
          <input type="password" id="pass" name="pass" />
        </label>
        <label>
          <span>Club Name</span>
          <input type="text" id="name" name="name" />
        </label>
        <label>
          <span>Branch</span>
          <input type="text" id="branch" name="branch" />
        </label>
        <button class="submit" type="submit" name="submit1">Register</button>
      </form>
    </div>
    
  </div>
<script type="text/javascript" src="script.js"></script>

</body>
</html>
