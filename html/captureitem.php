<!DOCTYPE html>
<html>
<head>
    <title>Camera Capture</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <video id="video" width="320" height="240" autoplay></video>
    <button id="capture">Capture</button>
    <canvas id="canvas" width="320" height="240" style="display:none;"></canvas>
    <script>
        var video = document.querySelector("#video");
        navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            video.srcObject = stream;
        });
        $("#capture").click(function() {
            var canvas = document.querySelector("#canvas");
            var context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            var dataURL = canvas.toDataURL();
            $.ajax({
                type: "POST",
                url: "capture.php",
                data: { image: dataURL }
            }).done(function(msg) {
                alert("Image saved to database!");
            });
        });
    </script>
</body>
</html>
