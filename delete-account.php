<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    require 'PHPMailerr/src/Exception.php';
    require 'PHPMailerr/src/PHPMailer.php';
    require 'PHPMailerr/src/SMTP.php';
    require 'vendor/autoload.php';

    // define variables and set to empty values
    $nameErr = $emailErr = $user_nameErr = $passwordErr = "";
    $name = $email = $user_name = $password = "";


	if (isset($_POST["delete"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "test");
 
        // check if credentials are okay, and email is verified
        $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
        $result = mysqli_query($conn, $sql);
 
        if (mysqli_num_rows($result) == 0)
        {
            die("Email not found");
        }
 
        $user = mysqli_fetch_object($result);
 
        if (password_verify($password, $user->password))
        {
            $sql = "DELETE FROM users WHERE email = '" . $email . "'";
            $result = mysqli_query($conn, $sql);
        }
        else{
            die('password is incorrect');
        }
 
        header("Location: http://192.168.1.5/email/login.php");
        exit();
    }
        


function test_input($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
} 
?>
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
    <title>SD - delete my account</title>

    <!-- Index.Css linked -->
    <link href="one.css" rel="stylesheet" type="text/css"/>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Anek Telugu' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mouse Memoirs|Product Sans|Concert One|Alumni Sans Inline One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
    <!-- <link type="text/css" rel="stylesheet" href="path-to-fontawesome/font-awesome.css"> -->
    
    <!-- Any Internal Css -->
    <style>.error{color:red}</style>
    <style>

.input:disabled {
  background: rgb(219, 219, 219);
  color: whitesmoke;
}
.input:enabled {
    background-color:darkgrey;
    color: white;
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
        <!-- <a href="login2.php"><input id="button_login_login" type="button" value="Login" style="background-color: #d41011;color: white;padding: 4px;margin: 8px 0;border: none;border-radius: 5px;cursor: pointer;width: 5%;"></a> -->
      
        <br><br><br>

<center>
    <table style="width: 350px;
        padding-left: 100px;
        border: 0.1px solid ;
        border-color:#000000;
        /* box-shadow: 10px 10px 10px 15px #aaaaaa; */
        border-radius: 10px;
        border-collapse: collapse;
		    background-color:#ffffff;">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <tr>
                <th></th>
            </tr>
            <tr>
                <th>
                <p style="padding-right: 142px;font-size:25px;font-family:Anek Telugu">Delete account</p>
                </th>
            </tr>
            <tr>
                <th><label style="font-family:Abel;font-size: 10px;padding-right:252px;" >Your Email</label><br><input class="phone_pass_box" type="text" placeholder="Email Address" name="email"></th>
            </tr>
            <tr>
                <th><span style="font-size:11px ;" class="error"><?php echo $emailErr;?></span></th>
            </tr>
            <tr>
                <th><label style="font-family:Abel;font-size: 10px;padding-right:240px; " >Your Password</label><br><input class="phone_pass_box" type="password" minlength="8" maxlength="15" placeholder="Your Password" name="password"></th>
            </tr>
            <tr>
                <th><span style="font-size:11px ;" class="error"><?php echo $passwordErr;?></span></th>
            </tr>
            <tr>
            <th><input type="submit" id="submit_button" class="input" value="Delete my account" style="padding: 6px 20px;margin: 8px 0;border: none;border-radius: 1px;cursor: pointer;width: 89%;;font-family:Abel;" name="delete" disabled>
            </th>
            </tr>
            <tr>
           <th>
            <input type="checkbox" id="terms_and_conditions" value="1" onclick="terms_changed(this)"><label for="checkbox" style="font-size:12px ;font-family:Abel;">I hereby declare that i do want to delete my account</label>
           </th>
            </tr>
            <tr>
            <th><br>
            </th>
            </tr>
 
    </form>
<script>    
function terms_changed(termsCheckBox){
    //If the checkbox has been checked
    if(termsCheckBox.checked){
        //Set the disabled property to FALSE and enable the button.
        document.getElementById("submit_button").disabled = false;
    } else{
        //Otherwise, disable the submit button.
        document.getElementById("submit_button").disabled = true;
    }
}
</script>
</table>
<br><br><br><br>
<p style="font-family: Abel;font-size:17px">We really enjoyed your presence in here, thanks for being part with us!<br>Team SamuDaay</p>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<script src="signup.js"></script>


</body>
</html>





