<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centered Buttons</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .button-container .button {
            display: block;
            width: 200px;
            padding: 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 10px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            margin: 10px;
            text-decoration: none;
        }

        @media only screen and (max-width: 600px) {
            .button-container .button {
                width: 150px;
                font-size: 16px;
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="button-container">
        <a href="student.php" class="button">Student</a>
        <a href="button2.html" class="button">Faculty Member</a>
        <a href="button3.html" class="button">Others</a>
    </div>
</body>
</html>
