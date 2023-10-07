<?php
// Check if the 'pid' parameter exists in the URL
if (isset($_GET['pid'])) {
    // Retrieve the 'pid' value from the URL
    $pid = $_GET['pid'];

  

    // You can use $pid to perform any actions or display content based on it
} else {
    // Handle the case where 'pid' is not present in the URL
    echo "No pid parameter found in the URL.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script defer src="face-api.min.js"></script>
  <script defer src="script.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    canvas {
      position: absolute;
    }
  </style>
</head>
<body>
  <h1 style="position: absolute;top: 20px;left: 50%;transform: translateX(-50%);">Facial Capture</h1>
  <video id="video" width="720" height="500" autoplay muted></video>
  <canvas id="canvas" width="720" height="500" ></canvas>
  <p style="margin-top: 90px; text-align: center; position: absolute;bottom: 50px;left: 50%;transform: translateX(-50%); font-family: 'Segui', sans-serif;font-size: 18px;">Note: This is an AI Facial Emotion Recognition to validate that a real human face is being recorded to the database. </p>
  <p style="font-family: 'Segui', sans-serif;font-size: 18px;position: absolute;bottom: 20px;left: 50%;transform: translateX(-50%);">Smile to Capture. </p>
  <form id="redirectForm" action="../compare.php" method="get">
  <input type="hidden" name="pid" value="<?php echo $pid; ?>">
</form>

</body>
</html>