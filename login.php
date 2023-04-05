
<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require('logic.php');
?>

<html>
    <head>
        <title>login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>     
        <link rel="stylesheet" href="style.css"/>       
        
        <style>
            .row img{width:100%;height: 100%;}
            .h1ptitle{font-family: Lucida Console,Monospace; font-size:30px;margin-top: 90px;}
            .ppcontent{font-family: arial; font-size: 20px; margin-top: 30px;}
            .ppfooter{font-size: 12px; margin-top: 20px;}
            .col-md-4{margin-top: 20px;border-right: solid ghostwhite;}
            .h12title{font-family: arial; font-size: 20px; font-weight: bold;margin-top: 20px;}
            .p2contents{font-family: arial; font-size: 15px; }
            .p2footer{font-family: arial; font-size: 10px;}
            .col4{width:227px; border-right: solid ghostwhite;}
            h3{font-family: arial; font-size: 15px;}
            
            .nav-link{color:black; border:solid; border-color: #e0debc;border-width: 1px;height: 40px; width: 120px; 
                     margin:5px 10px; text-align: center;font-family: times;}
            .h1title{font-size:20px;font-family: times;margin:15px;10px}
            .pcontents{font-size:15px; font-family: times}
            .newspictures{height:364px; width:100%; margin:30px 0px;}
            .h1stile{font-size:15px;font-family: arial;}
            .rowside img{heigt: 100%; width: 100%}
            button{margin:45px 25px; font-family: arial; font-size:15px; color: #ae926c;background:#f4f4f4;border-color:#f4f4f4 }
        
        </style>
    </head>
    <body> 
        <?php
    require('logic.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?> 
         <?php
            require('logic.php');
            if(isset($_POST['username'])){
                $username = stripslashes($_REQUEST['username']);
                $username = mysqli_real_escape_string($con, $username);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con, $password);

                $query = "SELECT * FROM `users` WHERE username='$username' AND password='" .md5($password) . "' AND is_approved!=0";
                $result = mysqli_query($con, $query) or die(mysql_error());
                $rows = mysqli_num_rows($result);
                if($rows == 1) {
                    $_SESSION['username'] = $username;
            header("Location: index.php");
                }
            }
                ?>
        <div class = "row" style = "height:53px;border-bottom:solid;border-color:#f4f4f4;">
                    <ul class ="nav">
                        <div class ="nav-item">
                            <a class ="nav-link" href ="index.php" style ="color:#ae926c;">Home</a>
                        </div>
                        <div class ="nav-item">
                            <a class ="nav-link" href ="Business.php" style ="color:#ae926c;">Business</a>
                        </div>
                        <div class ="nav-item">
                            <a class ="nav-link" href ="technology.php">Technology</a>
                        </div> 
                        <div class ="nav-item">
                            <a class ="nav-link" href ="finance.php">Sports</a>
                        </div>                         
                        <div class ="nav-item">
                            <a class ="nav-link" href ="health.php">Health</a>
                        </div> 
                        <div class ="nav-item">
                            <a class ="nav-link" href ="arts.php">Arts</a>
                        </div> 
                        <div class ="nav-item">
                            <a class ="nav-link" href ="style.php">Style</a>
                        </div> 
                        <div class ="nav-item">
                            <a class ="nav-link" href ="food.php">Food</a>
                        </div>                         
                         <div class ="nav-item">
                            <a class ="nav-link" href ="travel.php">Travel</a>
                        </div>                        
                    </ul>                                
    </div>   
        <div class="container">
            <form class="form" method="post" name="login">
                <h1 class="login-title">Login</h1>
                <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
                <input type="password" class="login-input" name="password" placeholder="Password"/>
                <input type="submit" value="Login" name="submit" class="login-button"/>
                <p class="link" style = "margin:10px 0px"><a href="register.php">New Registration</a></p>
                <p class="link" style = "margin:10px 0px"><a href="forgetpassword.php">Forget Password</a></p>                
            </form>            
        </div>
    </body>
<?php
    }
?>
</html>
