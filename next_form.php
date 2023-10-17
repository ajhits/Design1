<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Next Form</title>
</head>
<body>

<h2>User Information</h2>

<?php
// Retrieve and display user information from the query string
if (isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["number"])) {
   $name = htmlspecialchars($_GET["name"]);
   $email = htmlspecialchars($_GET["email"]);
   $number = htmlspecialchars($_GET["number"]);

   echo "<p>Name: $name</p>";
   echo "<p>Email: $email</p>";
   echo "<p>Number: $number</p>";
} else {
   echo "<p>No user information available.</p>";
}
?>

</body>
</html>
