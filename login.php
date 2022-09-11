<?php
     
    if (isset($_POST["submit"]))
    {
        $user_name = $_POST["user_name"];
        $password = $_POST["password"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "test");
 
        // check if credentials are okay, and email is verified
        $sql = "SELECT * FROM users WHERE user_name = '" . $user_name . "'";
        $result = mysqli_query($conn, $sql);
 
        if (mysqli_num_rows($result) == 0)
        {
            die("Email not found.");
        }
 
        $user = mysqli_fetch_object($result);
 
        if (!password_verify($password, $user->password))
        {
            die("Password is not correct");
        }
 
        if ($user->email_verified_at == null)
        {
            die("Please verify your email <a href='email-verification.php?email=" . $email . "'>from here</a>");
        }
 
        header("Location: http://192.168.1.5/email/mainpage.php");
        exit();
    }
?>

<!-- <form method="POST">
    <input type="email" name="email" placeholder="Enter email" required />
    <input type="password" name="password" placeholder="Enter password" required />
 
    <input type="submit" name="login" value="Login">
</form> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>SamuDaay - Login or Signup</title>

    <!-- Index.Css linked -->
    <link rel="stylesheet" href="one.css">
    <link type="text/css" rel="stylesheet" href="path-to-fontawesome/font-awesome.css">
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Anek Telugu' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mouse Memoirs|Product Sans|Concert One|Alumni Sans Inline One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">

    <!-- Any Internal Css -->
    <style>
        a{
            text-decoration: none;
        }
        
        #schema:link{
            color: rgb(12, 58, 184);
        }

        #schema:visited{
            color: rgb(12, 58, 184);
        }
        #schema:hover{
            color: grey;
            text-decoration: underline;
        }


    </style>

    <!-- Icon Added -->
    <link rel = "icon" href = 
    "Icon.png" type = "image/x-icon">
    
</head>
<style>
body {
      background-image: url('Wallpaper.webp');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100%;
      backdrop-filter: blur(60px);
      margin-top: -1px ;
      margin-bottom: 0px;
      margin-left: -1px;
      margin-right: -1px;
      overflow: hidden;
      /* background-position: 100%; */
    }
    </style>
<br>
<center>
<span id="animation_samu_daay">
          <span>
            <span id="samu_part_heading" style="font-size: 25px ;font-family:Product Sans;font-weight:bolder">SaMu</span><span id="daay_part_heading" class="font-effect-emboss" style="font-size: 25px ;font-family:Product Sans;font-weight:bolder ;">DaAy</span>
          </span>
        </span>
</center>
      
<br>

<center>
    <table style="width: 350px;
        padding-left: 100px;
        border: 0.1px solid ;
        border-color:#000000;

        /* box-shadow: 10px 10px 10px 15px #aaaaaa; */
        border-radius: 10px;
        border-collapse: collapse;
		background-color:#ffffff;">
        <form id="form_for_login" method="post">

            <tr>
            <th>
                <p p style="padding-right: 222px;font-size:27px;font-family:Anek Telugu" >Sign-in</p>
                </th>

            </tr>
            <tr>
                <th><label class="label_register" style=" font-family:Abel;font-size: 10px;padding-right:263px;" >Username</label><br>
                <input class="phone_pass_box" type="text" placeholder="Enter Username or phone number" name="user_name" required>
                </th>
            </tr>
            <tr>
                <th><label style=" font-family:Abel;font-size: 10px;padding-right:263px;"  >Password</label><br><input class="phone_pass_box" type="password" placeholder="Enter Password" name="password" required>
                </th>
            </tr>
        <tr>
        <th><br><p style="font-size:10px;padding-right:11px;padding-left:11px;font-family:Abel">By Clicking the signup button below you will agree all <a href="#">terms and conditions</a><br> of  
                <span style="color:rgb(54, 52, 52);">Samu</span> 
                <span style="color:rgb(54, 52, 52);">Daay</span>  
                powered by AcharyaInc</p>
                <hr style="width:290px ;">
        </th>
            
        </tr>
        <tr>
            <th>
                <input style="background-color:#be2525;color: white;padding: 6px 20px;margin: 8px 0;border: none;border-radius: 1px;cursor: pointer;width: 89%;font-family:Abel;" type="submit" name="submit" value="Login">
            </th>
        </tr>
        <tr>
            <th><p style="font-size:12px ;font-family:Abel">
                <a href="forgot.php">
                    Forgot password?
                </a>
            </p>
            </th>
        </tr>
    </table>
    <br>
        <hr style="width: 25%;">
            <br>
            <p style="font-size: 18px;font-family:Abel;font-weight:599" class="schema">Need a new account?<a href="register.php"> Sign up free</a></p>
        
        </div>
            
        
    </form>
</table>
</center>


<!-- Footer -->
<br><br><br><br><br><br><br><br><br><br><br><br>



<script src="signup.js"></script>


</body>
</html>