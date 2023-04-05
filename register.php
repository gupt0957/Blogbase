<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>     
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    
    <?php
    require('logic.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);
        
        $fname    = stripslashes($_REQUEST['fname']);
        $fname    = mysqli_real_escape_string($conn, $fname);
        
        $lname    = stripslashes($_REQUEST['lname']);
        $lname    = mysqli_real_escape_string($conn, $lname);        

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        $query    = "INSERT into `users` (username,fname, lname, password, email)
                     VALUES ('$username', '$fname','$lname','" . md5($password) . "', '$email')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <div class ="container">
        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="text" class="login-input" name="firstname" placeholder="First Name" required />
            <input type="text" class="login-input" name="lastname" placeholder="Last Name" required />
            <input type="text" class="login-input" name="email" placeholder="Email Adress">
            <input type="password" class="login-input" name="password" placeholder="Password">
            
            <div class="form-group">
              <label for="Admin">Admin:</label>
              <input type="checkbox" id="Admin" name="Admin" value="1" class="#"/>
              <br>
              <label for="graphic_Des">Graphic Designer:</label>
              <input type="checkbox" id="graphic_Des" name="graphic_Des" value="1" class="#"/>
              <br>
              <label for="writer">Writer:</label>
              <input type="checkbox" id="writer" name="writer" value="1" class="#"/>
              <br>
              <label for="reader">Reader:</label>
              <input type="checkbox" id="reader" name="reader" value="1" class="#" required />
              <br>
              <label for="advr">Advertiser:</label>
              <input type="checkbox" id="advr" name="advr" value="1" class="#"/>
            </div>
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link"><a href="login.php">Click to Login</a></p>
        </form>
    </div>
</body>
<?php
    }
?>
</html>