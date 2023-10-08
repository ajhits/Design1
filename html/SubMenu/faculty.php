<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty</title>

     <!-- style css -->
     <link rel="stylesheet" href="../../css/css/facandothers.css">
     <!-- bootstrap css -->
     <link rel="stylesheet" href="../../css/css/bootstrap.min.css">
     <!-- responsive -->
    <link rel="stylesheet" href="../../css/css/responsive.css">
 
     <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
    <a href="../search.php" class="back-button"><i class="fa fa-arrow-left"></i> Back</a>
    
    <section class="information">
        <div class="container">
            <div class="row d_flex">
                <div class="col-md-6">
                    <div class="text-bg">
                        <div class="img-logo">
                            <i><img src="../../css/images/professors.png" alt="#"/></i>
                        </div>
                        <h1>Faculty Information</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php
                    // Include your database connection code here (e.g., connect.php)
                    include '../../components/connect.php';

                    if (isset($_POST['add_faculty'])) {
                        // Retrieve and sanitize form data
                        $name = filter_var($_POST['Name'], FILTER_SANITIZE_STRING);
                        $department = filter_var($_POST['Department'], FILTER_SANITIZE_STRING);
                        $phoneNumber = filter_var($_POST['PhoneNumber'], FILTER_SANITIZE_STRING);
                        $email = filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL);

                        // Insert faculty information into the database
                        $stmt = $conn->prepare("INSERT INTO claimfaculty (name, department, phone, email) VALUES (?, ?, ?, ?)");
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

                    <form id="request" method="post" class="main_form">
                        <div class="row">
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Name" type="text" name="Name" required> 
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" style="height: 55px;" name="Department">
                                    <option selected>Select department</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="CS">Computer Science</option>
                                    <option value="ENG">Engineering</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Phone Number" type="text" name="PhoneNumber" required>                          
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Email" type="text" name="Email" required>                          
                            </div>
                            <div class="col-sm-12">
                                <button class="send_btn" type="submit" name="add_faculty">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
     </section>
</body>
</html>
