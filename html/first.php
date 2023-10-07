<?php
// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data submitted from the form
    $pid = $_POST["pid"];
    $name = $_POST["name"];
    $type = $_POST["type"];
    $image = $_POST["image"];

    // You can continue to display other data and perform any necessary processing here.
} else {
    // If the form is not submitted, you can provide a message or handle it as needed.
    echo "<p>Form not submitted.</p>";
}
?>

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
    <a href="student.php?pid=<?php echo $pid; ?>&name=<?php echo $name; ?>&type=<?php echo $type; ?>&image=<?php echo $image; ?>" class="button">Student</a>
    <a href="faculty.php?pid=<?php echo $pid; ?>&name=<?php echo $name; ?>&type=<?php echo $type; ?>&image=<?php echo $image; ?>" class="button">Faculty</a>
    <a href="others.php.php?pid=<?php echo $pid; ?>&name=<?php echo $name; ?>&type=<?php echo $type; ?>&image=<?php echo $image; ?>" class="button">Others</a>
</body>
</html>

