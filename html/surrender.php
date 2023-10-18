<?php

include '../components/connect.php';

if(isset($_POST['add_item'])){
   
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $date = $_POST['date'];
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
   $othertype = $_POST['other_type'];
   $othertype = filter_var($othertype, FILTER_SANITIZE_STRING);
   $brand = $_POST['brand'];
   $brand = filter_var($brand, FILTER_SANITIZE_STRING);
   $color = $_POST['color'];
   $color = filter_var($color, FILTER_SANITIZE_STRING);
   $date_today = $_POST['date_today'];
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $location = $_POST['location'];
   $location = filter_var($location, FILTER_SANITIZE_STRING);
   $other_loc = $_POST['other_loc'];
   $other_loc = filter_var($other_loc, FILTER_SANITIZE_STRING);

   function generateRandomCode($length = 6) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = '';
      $max = strlen($characters) - 1;
  
      for ($i = 0; $i < $length; $i++) {
          $code .= $characters[rand(0, $max)];
      }
  
      return $code;
  }
   $code = generateRandomCode();
   $select_products = $conn->prepare("SELECT * FROM `Items` WHERE name = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'Item already exist!';
   }else{
      echo 'Item Surrendered, Thank you!';
      $insert_products = $conn->prepare("INSERT INTO `items`(name, datefound, type, othertype, brand, color, date, description, location, otherloc,code) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
      $insert_products->execute([$name, $date, $type, $othertype, $brand, $color, $date_today, $description, $location, $other_loc, $code]);

         if($insert_products){
            if($image_size_01 > 2000000 OR $image_size_02 > 2000000 OR $image_size_03 > 2000000){
               echo 'Image size is too large!';
            }else{
               
               header('Location: capture.html');
            }
   
         }

   }  

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparing</title>

   <!-- style css -->
   <link rel="stylesheet" href="../css/css/style.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/css/bootstrap.min.css">
    <!-- responsive -->
    <link rel="stylesheet" href="../css/css/responsive.css">
 
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<body>

    <a href="../html/index.html" class="back-button"><i class="fa fa-arrow-left"></i> Back</a>

    <section class="information">
        <div class="container">
            <div class="center">
                    <div class="text-compare">
                        <h1>SURRENDER ITEM</h1>
                    </div>
                        <form action="" method="post" enctype="multipart/form-data" id="request" class="main_form" >
                            <div class="row">
                                <div class="col-md-12 ">
                                    <input class="contactus" placeholder="Surrenderer Name" type="text" name="name"> 
                                </div>
                                <div class="col-md-12 ">
                                    <span style="color:white;">Date Recovered:</span>
                                    <input class="contactus" placeholder="Date Recovered" type="date" name="date" id="date"> 
                                </div>
                                <div class="col-md-12">
                                    <select class="form-select" style="height: 55px; " required maxlength="100" id="pleaseSpecify" name="type">
                                    <option selected>Select Item Type</option>
                                    <option value="Cellphone">Cellphone</option>
                                    <option value="Wallet">Wallet</option>
                                    <option value ="Coin Purse">Coin Purse</option>
                                    <option value="Umbrella">Umbrella</option>
                                    <option value="Book">Book</option>
                                    <option value="Notebook">Notebook</option>
                                    <option value="Ballpen">Ballpen</option>
                                    <option value="Tumbler">Tumbler</option>
                                    <option value="Handkerchief">Handkerchief</option>
                                    <option value="Hair Clip">Hair Clip</option>
                                    <option value ="Earphone">Earphone</option>
                                    <option value ="ID">ID</option>
                                    <option value ="Purse">Purse</option>
                                    <option value ="Jewelry">Jewelry</option>
                                    <option value ="Keys">Keys</option>
                                    <option value ="Headwear">Headwear</option>
                                    <option value ="Cutlery">Cutlery</option>
                                    <option value ="Watches">Accessories</option>
                                    <option value ="USB flash drives">USB flash drives</option>
                                    <option value ="Calculators ">Calculators </option>
                                    <option value ="Chargers">Chargers</option>
                                    <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <!-- Additional input box initially hidden -->
                                    <input class="contactus" placeholder="Please Specify" name="other_type" id="other_type" style="display: none;">
                                </div>
                                <div class="col-md-12 ">
                                    <input class="contactus" placeholder="Item Brand" type="text" name="brand" id="brand"> 
                                </div>
                                <div class="col-md-12 ">
                                    <input class="contactus" placeholder="Item Color" type="text" name="color"> 
                                </div>
                                <input type="hidden" name="date_today" value="<?php echo date('Y-m-d'); ?>">
                                <div class="col-md-12 ">
                                    <input class="contactus" placeholder="Item Description: Keychain,Logo,Amount of Money" type="text" name="description"> 
                                </div>
                                <div class="col-md-12">
                                    <select class="form-select" style="height: 55px; " required maxlength="100" id="location" name="location">
                                    <option selected>Select Location Found</option>
                                    <option value="CEA Building">CEA Building</option>
                                    <option value="CBEA Building">CBEA Building</option>
                                    <option value="CAS Building">CAS Building</option>
                                    <option value="CED Building">CED Building</option>
                                    <option value="Old Canteen">Old Canteen</option>
                                    <option value="New Canteen">New Canteen</option>
                                    <option value="Park">Park</option>
                                    <option value="Court">Court</option>
                                    <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <!-- Additional input box initially hidden -->
                                    <input class="contactus" placeholder="Please Specify" name="other_loc" id="other_loc" style="display: none;">
                                </div>
                                <div class="col-sm-12">
                                    <button class="send_btn" type="submit" value="Surrender"  name="add_item">Surrender</button>
                                </div>
                            </div>
                        </form>   
                </div>
            </div>
     </section>
</body>
<script>
    document.getElementById("pleaseSpecify").addEventListener("change", function () {
        var otherType = document.getElementById("other_type");
        if (this.value === "Other") {
            otherType.style.display = "block";
        } else {
            otherType.style.display = "none";
        }
    });

    document.getElementById("location").addEventListener("change", function () {
        var otherLoc= document.getElementById("other_loc");
        if (this.value === "Other") {
            otherLoc.style.display = "block";
        } else {
            otherLoc.style.display = "none";
        }
    });
</script>
</html>