<?php
// Include your database connection code here (e.g., connect.php)
include '../../components/connect.php';

if (isset($_POST['send_btn'])) {
    // Retrieve and sanitize form data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
    $phoneNumber = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Insert faculty information into the database
    $stmt = $conn->prepare("INSERT INTO claimothers (name, department, number, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $department, $phoneNumber, $email]);

    // Check if the insertion was successful
    if ($stmt->rowCount() > 0) {
        $pid = $_GET['pid'];
        header("Location: index.php?pid=" . urlencode($pid));
        exit(); // Make sure to exit to prevent further execution
    } else {
        echo "Error: Failed to insert faculty information.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Others</title>

     <!-- style css -->
     <link rel="stylesheet" href="../../css/css/facandothers.css">
     <!-- bootstrap css -->
     <link rel="stylesheet" href="../../css/css/bootstrap.min.css">
 
     <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>
<body>

    <a href="menu.php" class="back-button"><i class="fa fa-arrow-left"></i> Back</a>
    
    <section class="information">
        <div class="container">
            <div class="row d_flex">
                <div class="col-md-6">
                    <div class="text-bg">
                        <div class="img-logo">
                            <i><img src="../../css/images/otherss.png" alt="#"/></i>
                        </div>
                        <h1>Others Information</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <form id="request" action="" method="post" class="main_form">
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="Name" type="type" name="name" required> 
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" style="height: 55px;" id="positionSelect" name="department">
                                    <option selected>Specify position</option>
                                    <option value="Visitor">Visitor</option>
                                    <option value="Parent">Parent</option>
                                    <option value="Volunteer">Volunteer</option>
                                    <option value="Other">Other</option> <!-- Added "Other" option -->
                                </select>
                            </div>
                            <div class="col-md-12">
                                <!-- Additional input box initially hidden -->
                                <input class="contactus" placeholder="Specify Position" name="others" type="text" id="otherPosition" style="display: none;">
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Phone Number" type="type" name="phone" required>                          
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Email" type="type" name="email" required>                          
                            </div>
                            <div class="col-sm-12">
                                 <button class="send_btn" type="submit" name="send_btn">Send</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>    
     </section>

</body>
<script>
        document.getElementById("positionSelect").addEventListener("change", function () {
            var otherPositionInput = document.getElementById("otherPosition");
            if (this.value === "Other") {
                otherPositionInput.style.display = "block";
            } else {
                otherPositionInput.style.display = "none";
            }
        });
    </script>
</html>