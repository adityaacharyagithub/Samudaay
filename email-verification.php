<?php

    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "test");
 
        // mark email as verified
        $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
 
        if (mysqli_affected_rows($conn) == 0)
        {
            die("Verification code failed.");
        }
 
        echo "<p>You can login now.</p>"."<br><br>";
        echo "<a href='login.php'><button>Login</button></a>";
        exit();
    }
 
?>

<!-- <form method="POST">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="text" name="verification_code" placeholder="Enter verification code" required />
 
    <input type="submit" name="verify_email" value="Verify Email">
</form> -->

<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!--  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>SD - email verify</title>

    <!-- Index.Css linked -->
    <link rel="stylesheet" href="one.css">
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Anek Telugu' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mouse Memoirs|Product Sans|Concert One|Alumni Sans Inline One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
    
    <!-- Any Internal Css -->
    <style>
        #mail_e:link{
            color: blue;
            text-decoration: none;
        }
        #mail_e:visited{
            color: blue;
            text-decoration: none;
        }
        #mail_e:hover{
            color: blue;
            text-decoration: underline;
        }
        
    </style>
    
    <!-- Icon Added -->
    <link rel = "icon" href = 
    "Icon.png" type = "image/x-icon">
        
</head>
    
<!-- <body style="background-color: #ffffff;"> -->
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
      
<br><br>

<center>
    <table style="width: 300px;
        padding-left: 100px;
        border: 0.1px solid ;
        border-color:#000000;
        /* box-shadow: 10px 10px 10px 15px #aaaaaa; */
        border-radius: 10px;
        border-collapse: collapse;
		background-color:#ffffff;">
        <form method="post">

            <tr>
                <th>
                    <p style="padding-right: 138px;font-size:25px;font-family:Anek Telugu">Verify Email</p><br>
                </th>

            </tr>
            <th><label style=";font-size: 10px;padding-right:238px;font-family:Abel ">Verify</label><br><input type="hidden" name="email" value="<?php echo $_GET['email']; ?>"required></th>
            <tr>
                <th><input class="phone_pass_box" type="text" placeholder="Enter Verification code" name="verification_code"></th>
            </tr>
        <tr>
        <th><br><p style="font-size:11px;padding-right:11px;padding-left:11px;font-family:Abel;">
                <span style="color:red">Samu</span><span style="color:rgb(54, 52, 52);">Daay</span>  
                powered by AcharyaInc</p>
                <hr style="width:260px ;">
        </th>
        </tr>
        <tr>
            <th><input type="submit" value="Verify Email" style="background-color: darkgrey;color: white;padding: 6px 20px;margin: 8px 0;border: none;border-radius: 1px;cursor: pointer;width: 89%;font-family:Abel;" name="verify_email">
            </th>
        </tr>
        <tr>
          <th></th>
        </tr>
        <tr>
          <th></th>
        </tr>
        <tr>
          <th></th>
        </tr>
        <tr>
          <th>
    </form>
</table>
<br><br>
<p style="font-family: Abel;font-size:16px">didn't received mail? Try <a href="register.php" id="mail_e">signing up</a> again</p>
<p style="font-family: Abel;font-size:11px">by clicking the link above would result further investigation of the error so these problem's do not occur again in the future</p>

<br><br><br><br><br><br><br><br><br><br><br><br>




<script src="signup.js"></script>


</body>
</html>