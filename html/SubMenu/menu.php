<?php $pid = $_POST['pid']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">

   <title>Design 2</title>

    <!-- style css -->
    <link rel="stylesheet" href="../../css/css/style.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../../css/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>
    
    <div class="options">
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="titlepage">
                    <h2> <strong class="white">CLAIMANTS</strong></h2>
                    <span>The process of claiming an item in the Lost and Found AI hub involves several steps to ensure the item is returned to the rightful owner.</span>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-md-4">
              <a href="student.php?pid=<?php echo $pid; ?>">
              <div class="options_box">
                    <i><img src="../../css/images/student.png" alt="#"/></i>
                    <h4> <strong>STUDENT</strong> </h4>
                 </div>
                  </a>
                 
              </div>
              <div class="col-md-4">
               <a href="faculty.php?pid=<?php echo $pid; ?>">
                  <div class="options_box">
                     <i><img src="../../css/images/faculty.png" alt="#"/></i>
                     <h4> <strong>FACULTY</strong> </h4>
                  </div>
               </a>
                 
              </div>
              <div class="col-md-4">
               <a href="others.php?pid=<?php echo $pid; ?>">
                  <div class="options_box">
                     <i><img src="../../css/images/others.png" alt="#"/></i>
                     <h4> <strong>OTHERS</strong></h4>
                  </div>
               </a>
                 
              </div>
           </div>
        </div>
     </div>

</body>
</html>