<?php

include '../components/connect.php';

if(isset($_POST['submit'])){
   
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $year = $_POST['year'];
   $year = filter_var($year, FILTER_SANITIZE_STRING);
   $department = $_POST['department'];
   $department= filter_var($department, FILTER_SANITIZE_STRING);
   $student_number = $_POST['student_number'];
   $student_number = filter_var($student_number, FILTER_SANITIZE_STRING);
   $pnumber = $_POST['pnumber'];
   $pnumber = filter_var($pnumber, FILTER_SANITIZE_STRING);
  

   echo 'Submitted, Thank you!';
    $insert = $conn->prepare("INSERT INTO `claimant`(name, level, department, studentN, PhoneN) VALUES(?,?,?,?,?)");
    $insert->execute([$name, $year, $department, $student_number, $pnumber]);


    header('Location: second.html');
   
    

};


?>
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
        <form action=""  method="post" enctype="multipart/form-data">
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
            <input name="submit" type="submit" value="Submit" class="submit-btn" style="background-color: #4CAF50; color: white; border-radius: 10px; padding: 10px;">
        </form>
    </div>
</body>

</html>
