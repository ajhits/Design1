<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Next Page</title>
</head>
<body>
   <h1>Form Data from Previous Page</h1>
   
   <?php
   // Check if the form data has been submitted via POST
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       // Retrieve and display the form data
       $pid = $_POST['pid'];
       $name = $_POST['name'];
       $type = $_POST['type'];
       $image = $_POST['image'];

       // Display the form data
       echo "<p>Product ID: $pid</p>";
       echo "<p>Name: $name</p>";
       echo "<p>Type: $type</p>";
       echo "<p>Image: $image</p>";
       
       // You can add more HTML and formatting as needed
   } else {
       // Handle the case where the form data is not available
       echo "<p>Form data not available.</p>";
   }
   ?>

   <!-- Your additional HTML content for the next page goes here -->

</body>
</html>
