<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    require 'PHPMailerr/src/Exception.php';
    require 'PHPMailerr/src/PHPMailer.php';
    require 'PHPMailerr/src/SMTP.php';
    require 'vendor/autoload.php';

    $nameErr = $emailErr = $user_nameErr = $passwordErr = "";
    $name = $email = $user_name = $password = "";
    if (isset($_POST["register"]))
    { 
        $conn = mysqli_connect("localhost", "root", "", "test");
        $email = $_POST['email'];
        $check_email = mysqli_query($conn, "SELECT * FROM users where email = '$email' ");
    if(mysqli_num_rows($check_email) > 0)
    {
            echo"<script>window.alert('Account with Email Already exists')</script>";
    }
    else
    {
		if (isset($_POST["register"])) 
        {
            if (empty($_POST["name"])) 
            {
              $nameErr = "Required";
            } 
            else 
            {
              $name = test_input($_POST["name"]);
              // check if name only contains letters and whitespace
              if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Invalid format";
              }
            }
            
            if (empty($_POST["email"])) 
            {
                $emailErr = "Required";
              } 
              else 
              {
                  $email = test_input($_POST["email"]);
                  // check if e-mail address is well-formed
                  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      $emailErr = "Invalid format";
                  }
              }
              
              
              
              if (empty($_POST["user_name"])) 
              {
                $user_nameErr = "Required";
              } 
              else 
              {
                $user_name = test_input($_POST["user_name"]);
                // check if name only contains letters and whitespace
                if(!preg_match("/^[a-zA-Z0-9]+$/",$user_name)) {
                  $user_nameErr = "Invalid format";
                }
              }
          
          
              if (empty($_POST["password"])) 
              {
                $passwordErr = "Required";
              } 
              else 
              {
                $password = test_input($_POST["password"]);
                // check if name only contains letters and whitespace
                if (!preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/',$password)) {
                  $passwordErr = "Invalid format";
                }
              }
          
        }
        if (isset($_POST["register"])) 
        {
        $user_name = $_POST['user_name'];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();                                           
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'samudaayverify@gmail.com';                    
            $mail->Password   = 'jsdeuhrklslblxdd';                             
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465; 

            //Recipients
            $mail->setFrom('samudaayverify@gmail.com', 'no-reply_SamuDaay');

            //Add a recipient
            $mail->addAddress($email, $name);

            //Set email format to HTML
            $mail->isHTML(true);

            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

            $mail->Subject = 'Email Verification';
            $mail->Body    = '<div style="width:550px ;height:320px; margin: 0 auto;"><span style="color: red;font-size: 20px;font-family:Franklin Gothic Medium, Arial Narrow, Arial, sans-serif">Samu</span><span style="color: grey;font-size: 20px;font-family:Franklin Gothic Medium, Arial Narrow, Arial, sans-serif">Daay</span><font style="color:rgb(0, 0, 0) ;">&nbsp;|&nbsp;<span style="font-size: 15px;font-family:Tahoma;font-weight: 900;">Verify</span><hr><p style="font-family: Tahoma;">To verify your email address, please use the following One Time Password (OTP):<br><br><b style="font-size: 15px;">' . $verification_code . '</b><br><br>Do not share this OTP with anyone. SamuDaay takes your account security very seriously. SamuDaay will never ask you to disclose or verify your SamuDaay password or OTP. If you receive a suspicious email having no recognisable Email-id, do not click it, it could be a phishing mail, report the email to SamuDaays official mail which is (samudaayverify@gmail.com) for further investigation.<br><br>Thank you for registering with us!, Team samudaay<font style="color: rgb(0, 0, 0) ;font-size:10px;font-family: verdana;"><center>This mail was for '.$name.', if this was not you click below <br><a href="delete-account.php" style="color: rgb(0, 0, 0);"><span style="color:grey">Unsubscribe Here</span></a></font></p></center></div>';

            $mail->send();
            // echo 'Message has been sent';

            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

            // connect with database
            $conn = mysqli_connect("localhost", "root", "", "test");

            // insert in users table
            $sql = "INSERT INTO users(user_name,name, email, password, verification_code, email_verified_at) VALUES ('".$user_name."','" . $name . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
            mysqli_query($conn, $sql);

            header("Location: email-verification.php?email=" . $email);
            exit();
        } catch (Exception $e) {
            echo "";
        }
        }

    }
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
    <title>SamuDaay - Signup</title>

    <!-- Index.Css linked -->
    <link href="one.css" rel="stylesheet" type="text/css"/>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Anek Telugu' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mouse Memoirs|Product Sans|Concert One|Alumni Sans Inline One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=neon|outline|emboss|shadow-multiple">
    <!-- <link type="text/css" rel="stylesheet" href="path-to-fontawesome/font-awesome.css"> -->
    
    <!-- Any Internal Css -->
    <style>.error{color:red}</style>
    
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <tr>
                <th>
                  <br>
                <p style="padding-right: 142px;font-size:25px;font-family:Anek Telugu">Create account</p>
                </th>
            </tr>
            <tr>
                <th><label style="font-size: 10px;padding-right:255px;font-family:Abel" >Your Name</label><br><input class="phone_pass_box" type="text" minlength="6" maxlength="50" placeholder="First and Last Name" name="name"></th>
            </tr>
            <tr>
                <th><span style="font-size:11px ;" class="error"><?php echo $nameErr;?></span></th>
            </tr>
            <tr>
                <th><label style="font-family:Abel;font-size: 10px;padding-right:240px; " >Your Username</label><br><input class="phone_pass_box" type="text" minlength="6" maxlength="25" placeholder="Enter Username" name="user_name"></th>
            </tr>
            <tr>
                <th><span style="font-size:11px ;" class="error"><?php echo $user_nameErr;?></span></th>
            </tr>
            <tr>
                <th><label style="font-family:Abel;font-size: 10px;padding-right:252px;" >Your Email</label><br><input class="phone_pass_box" type="text" placeholder="Email Address" name="email"></th>
            </tr>
            <tr>
                <th><span style="font-size:11px ;" class="error"><?php echo $emailErr;?></span></th>
            </tr>
            <tr>
                <th><label style="font-family:Abel;font-size: 10px;padding-right:240px; " >Your Password</label><br><input class="phone_pass_box" type="password" minlength="8" maxlength="15" placeholder="New Password" name="password"></th>
            </tr>
            <tr>
                <th><span style="font-size:11px ;" class="error"><?php echo $passwordErr;?></span></th>
            </tr>
            <tr>
                <th><i style="color:#6660ff;font-size:10px;font-family:Abel;padding-right:100px">i : password should have at least 8 characters </i></th>
            </tr>
        <tr>
            <th><br><p style="padding-right:12px;color:darkgrey;font-size: 10px;">* We will send a message to your registered mail-id to verify</p>
                <hr style="width:290px ;">
            </th>
        </tr>
        <tr>
            <th><input type="submit" value="Signup" style="background-color: #42b72a;color: white;padding: 6px 20px;margin: 8px 0;border: none;border-radius: 1px;cursor: pointer;width: 89%;;font-family:Abel;" name="register">
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
          <th></th>
        </tr>
    </form>
</table>
</center>
<!-- Footer -->
<br><br><br><br><br><br><br><br><br><br>



<script src="signup.js"></script>


</body>
</html>





