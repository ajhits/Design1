<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            align-items: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 16px;
        }

        .form-group input[type="text"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group select {
            height: 40px;
        }

        .form-group .submit-btn {
            display: block;
            width: 100%;
            padding: 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 18px;
        }

        @media only screen and (max-width: 600px) {
            .form-container {
                max-width: 100%;
                padding: 0 20px;
            }
        }
    </style>
</head>
<body>
    <h1>Claimant's Information</h1>
    <div class="form-container">
        <form action="submit.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="year">Year Level:</label>
                <input type="text" id="year" name="year" placeholder="Enter your year level" required>
            </div>
            <div class="form-group">
                <label for="department">Department:</label>
                <select id="department" name="department" required>
                    <option value="">Select department</option>
                    <option value="IT">Information Technology</option>
                    <option value="CS">Computer Science</option>
                    <option value="ENG">Engineering</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="student_number">Student Number:</label>
                <input type="text" id="student_number" name="student_number" placeholder="Enter your student number" required>
            </div>
            <div class="form-group">
                <label for="pnumber">Phone Number:</label>
                <input type="text" id="pnumber" name="pnumber" placeholder="Enter phone number" required>
            </div>
            <input type="submit" value="Submit" class="submit-btn" style="background-color: #4CAF50; color: white; border-radius: 10px; padding: 10px;">
        </form>
    </div>
</body>
<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    //Load Composer's autoloader
    require 'vendor/autoload.php';
 
    if (isset($_POST["submit"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
 
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
 
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'your_email@gmail.com';
 
            //SMTP password
            $mail->Password = 'your_password';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;
 
            //Recipients
            $mail->setFrom('your_email@gmail.com', 'your_website_name');
 
            //Add a recipient
            $mail->addAddress($email, $name);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
 
            $mail->send();
            // echo 'Message has been sent';
 
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
 
            // connect with database
            $conn = mysqli_connect("localhost:8889", "root", "root", "test");
 
            // insert in users table
            $sql = "INSERT INTO users(name, email, password, verification_code, email_verified_at) VALUES ('" . $name . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
            mysqli_query($conn, $sql);
 
            header("Location: email-verification.php?email=" . $email);
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
</html>
