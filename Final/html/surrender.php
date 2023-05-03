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

   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = '../uploaded_img/'.$image_01;

   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = '../uploaded_img/'.$image_02;


   $select_products = $conn->prepare("SELECT * FROM `Items` WHERE name = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'Item already exist!';
   }else{
      echo 'Item Surrendered, Thank you!';
      $insert_products = $conn->prepare("INSERT INTO `Items`(name, datefound, type, othertype, brand, color, date, description, location, otherloc, image_01, image_02) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
      $insert_products->execute([$name, $date, $type, $othertype, $brand, $color, $date_today, $description, $location, $other_loc, $image_01, $image_02]);

         if($insert_products){
            if($image_size_01 > 2000000 OR $image_size_02 > 2000000 OR $image_size_03 > 2000000){
               echo 'Image size is too large!';
            }else{
               move_uploaded_file($image_tmp_name_01, $image_folder_01);
               move_uploaded_file($image_tmp_name_02, $image_folder_02);
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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Surrender</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="../css/admin_style.css">

   <style>

   body{
      background-image: url("../html/images/sas.jpg");
   }
   button{
   font-size: 2.5rem;
   height: 5.5rem;
   line-height: 5.5rem;
   background-color: var(--main-color);
   cursor: pointer;
   color:var(--white);
   border-radius: .5rem;
   width: 6rem;
   text-align: center;
}

#return{
   position: absolute;
   top: 0;
   left: 0;
}

button:hover{
   background-color: var(--black);
}
/



   </style>

</head>
<body>


<section class="add-products">

   <h1 style="color:white;" class="heading">Surrender Item</h1>

   <a href="../html/index.html" style="text-decoration:none;">
   <button  class="fas fa-arrow-left" type="button" id="return"></button></a>

   <form action="" method="post" enctype="multipart/form-data">
      <div class="flex">
         <hidden class="inputBox">
            <span>Surrenderer Name:</span>
            <input type="text" class="box" placeholder="Name" name="name">
         </div>
         <div class="inputBox">
            <span><br>Date Recovered</span>
            <input type="date" class="box"  name="date" id="date">
         </div>
      <div class="inputBox">
         <span><br>Item Type</span>
         <select type="text" class="box" required maxlength="100" placeholder="Item Type" name="type" onchange="showInputBox(this)">
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
         <div class="inputBox" id="inputbox" style="display: none;">
          <span><br>Please Specify</span>
            <input type="text" class="box" placeholder="Example: Gloves" name="other_type" id="other_type">
         </div>
         <div class="inputBox">
            <span><br>Item Brand</span>
            <input type="text" class="box" placeholder="Example: Iphone" name="brand" id="brand">
         </div>
         <div class="inputBox">
            <span><br>Item Color</span>
            <input type="text" class="box" placeholder="Example: Red" name="color">
         </div>
         <input type="hidden" name="date_today" value="<?php echo date('Y-m-d'); ?>">
         <div class="inputBox">
            <span><br>Item Description: Keychain,Logo,Amount of Money</span>
            <textarea name="description" placeholder="Enter Item Details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
         </div>
         <div class="inputBox">
         <span><br>Location Found</span>
         <select type="text" class="box" required maxlength="100" placeholder="location" name="location" onchange="showInputBox2(this)">
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
         <div class="inputBox" id="inputbox2" style="display: none;">
          <span><br>Please Specify</span>
            <input type="text" class="box" placeholder="Example: CR CEA" name="other_loc" id="other_loc">
         </div>
         <div class="inputBox">
            <span>Picture Item</span>
            <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" id="fileInput" required>
       </div>
        <div class="inputBox">
            <span>Picture Item</span>
            <input type="file" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>

      </div>
      
      <input type="submit" value="Surrender" class="btn" name="add_item">
   </form>
<button name="hidden-btn" onclick="modal1();" id="mpopupLink" hidden>click me</button>

      

</section>
<script>
  const fileInput = document.getElementById('fileInput');
  fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.addEventListener('load', (event) => {
      const img = document.createElement('img');
      img.src = event.target.result;
      // Do something with the image, such as upload it to the server
    });
    reader.readAsDataURL(file);
  });
</script>

<script src="../js/admin_script.js"></script>
<script>
function showInputBox(select) {
  var inputbox = document.getElementById("inputbox");
  if (select.value === "Other") {
    inputbox.style.display = "block";
  } else {
    inputbox.style.display = "none";
  }
}
function showInputBox2(select) {
  var inputbox = document.getElementById("inputbox2");
  if (select.value === "Other") {
    inputbox.style.display = "block";
  } else {
    inputbox.style.display = "none";
  }
}

</script>
   
</body>
</html>