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
                    <form id="request" action="../FaceDetect/" method="post" class="main_form">
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="Name" type="type" name="Name" required> 
                            </div>
                            <div class="col-md-12">
                                <select class="form-select" style="height: 55px; " >
                                <option selected>Specify position</option>
                                <option value="IT">Information Technology</option>
                                <option value="CS">Computer Science</option>
                                <option value="ENG">Engineering</option>
                                <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Phone Number" type="type" name="Phone Number" required>                          
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Email" type="type" name="Email" required>                          
                            </div>
                            <div class="col-sm-12">
                                <button class="send_btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
     </section>

</body>
</html>