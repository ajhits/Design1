<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Form Example</title>
</head>
<body>

<?php
// Define variables to store user input
$name = $email = $number = "";

// Define an array to store errors
$errors = [];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Validate and sanitize user input
   $name = sanitize_input($_POST["name"]);
   $email = sanitize_input($_POST["email"]);
   $number = sanitize_input($_POST["number"]);

   // Validate name
   if (empty($name)) {
      $errors[] = "Name is required.";
   }

   // Validate email
   if (empty($email)) {
      $errors[] = "Email is required.";
   } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Invalid email format.";
   }

   // Validate number
   if (empty($number)) {
      $errors[] = "Number is required.";
   }

   // If there are no errors, proceed to the next form
   if (empty($errors)) {
      // Redirect to the next form with the data in the query string
      header("Location: next_form.php?name=$name&email=$email&number=$number");
      exit();
   }
}

// Function to sanitize user input
function sanitize_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>Enter Your Information</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
   <label for="name">Name:</label>
   <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>

   <label for="email">Email:</label>
   <input type="text" id="email" name="email" value="<?php echo $email; ?>"><br>

   <label for="number">Number:</label>
   <input type="text" id="number" name="number" value="<?php echo $number; ?>"><br>

   <input type="submit" value="Submit">
</form>

<?php
// Display errors if any
if (!empty($errors)) {
   echo "<h3>Errors:</h3>";
   echo "<ul>";
   foreach ($errors as $error) {
      echo "<li>$error</li>";
   }
   echo "</ul>";
}
?>

</body>
</html>
