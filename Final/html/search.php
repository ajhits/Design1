<?php

include '../components/connect.php';

?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<style>
   h1{
      text-align: center;
      color: white;
   }
   body{
      background-image: url("images/sas.jpg");
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
.type{
   font-family: "Segoe UI", Arial, sans-serif;
   font-size:18px;
}

#return{
   position: absolute;
   top: 0;
   left: 0;
}

button:hover{
   background-color: var(--black);
}
/*modal*/
.mpopup {
   display: none;
   position: fixed;
   z-index: 1;
   padding-top: 100px;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;
   overflow: auto;
   background-color: rgb(0,0,0);
   background-color: rgba(0,0,0,0.4);
}
.modal-content {
   /* remove the borders */
   border: none;
   /* set the background color to blue */
   background-color: black;
   /* rest of the code... */
   position: relative;
   margin: auto;
   padding: 0;
   width: 450px;
   box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
   -webkit-animation-name: animatetop;
   -webkit-animation-duration: 0.4s;
   animation-name: animatetop;
   animation-duration: 0.4s;
   border-radius: 0.3rem;
   text-align: center;
   font-family: "Segoe UI", Arial, sans-serif;
   font-size:14px;
}
.modal-header {
   /* remove the borders */
   border: none;
   /* set the background color to blue */
   background-color: var(--main-color);
   /* rest of the code... */
   padding: 2px 12px;
   color: #333;
   border-top-left-radius: 0.3rem;
   border-top-right-radius: 0.3rem;
}
.modal-header h2{
   font-size: 1.25rem;
   margin-top: 14px;
   margin-bottom: 14px;
   font-size:14px;
}
.modal-body {
   padding: 2px 12px;
}
.modal-footer {
   /* remove the borders */
   border: none;
   /* set the background color to blue */
   background-color: black;
   /* rest of the code... */
   padding: 1rem;
   color: #333;
   border-bottom-left-radius: 0.3rem;
   border-bottom-right-radius: 0.3rem;
   text-align: right;
}
.close {
   color: #888;
   float: right;
   font-size: 28px;
   font-weight: bold;
}
.close:hover, .close:focus {
   color: #000;
   text-decoration: none;
   cursor: pointer;
}

/* add animation effects */
@-webkit-keyframes animatetop {
   from {top:-300px; opacity:0}
   to {top:0; opacity:1}
}

@keyframes animatetop {
   from {top:-300px; opacity:0}
   to {top:0; opacity:1}
}

/* media query for screens smaller than 768px */
@media only screen and (max-width: 768px) {
   .mpopup {
      padding-top: 50px;
   }
   
   .modal-content {
      width: 80%;
   }
   
   .modal-header h2 {
      font-size: 1.5rem;
   }
   
   .modal-footer {
      font-size: 1rem;
   }
   
   .close {
      font-size: 24px;
   }
}
</style>
<script>

   function modal1(){
      // Select modal
var mpopup = document.getElementById('mpopupBox');

// Select trigger link
var mpLink = document.getElementById("mpopupLink");

// Select close action element
var close = document.getElementsByClassName("close")[0];

// Open modal once the link is clicked
mpLink.onclick = function() {
    mpopup.style.display = "block";
};

// Close modal once close element is clicked
close.onclick = function() {
    mpopup.style.display = "none";
};

// Close modal when user clicks outside of the modal box
window.onclick = function(event) {
    if (event.target == mpopup) {
        mpopup.style.display = "none";
    }
};
   }


   // Import the genetic-js library
const Genetic = require('genetic-js');

// Define the fitness function to evaluate candidate solutions
function fitness (chromosome) {
  // Return the fitness score for the given chromosome
  // This function should evaluate how well the chromosome solves the problem
}

// Configure the genetic algorithm
const config = {
  iterations: 100, // number of iterations to run the algorithm
  size: 50, // population size
  crossover: 0.3, // probability of crossover
  mutation: 0.1, // probability of mutation
  skip: 10 // skip logging every n-th iteration
};

// Create a new genetic algorithm instance
const genetic = Genetic.create();

// Set the fitness function
genetic.fitness(fitness);

// Configure the genetic algorithm with the provided config
genetic.optimize(config);

// Start the genetic algorithm
genetic.start();


</script>


<body>
   
<h1>LOST AND FOUND RTU</h1>
<!-- Modal popup box -->
<div id="mpopupBox" class="mpopup">
    <!-- Modal content -->
    <div class="modal-content">
    <div class="modal-header">
            <span class="close">×</span>
            <h2 style="color:white;">Additional Information</h2>
        </div>
        <div class="modal-body">
    <?php
     if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
     $search_box = $_POST['search_box'];
     $select_products = $conn->prepare("SELECT * FROM `Items` WHERE CONCAT_WS(' ', name, type, othertype, description, date, color, location, otherloc) LIKE '%{$search_box}%' OR name LIKE '%{$search_box}%' OR image_01 LIKE '%{$search_box}%' OR date LIKE '%{$search_box}%' OR type LIKE '%{$search_box}%' OR othertype LIKE '%{$search_box}%' OR description LIKE '%{$search_box}%' OR datefound LIKE '%{$search_box}%' OR brand LIKE '%{$search_box}%' OR color LIKE '%{$search_box}%' OR CONCAT_WS(' ', description, type, othertype, color) LIKE '%{$search_box}%' OR CONCAT_WS(' ', color, othertype, type, description) LIKE '%{$search_box}%' OR CONCAT_WS(' ', description, color) LIKE '%{$search_box}%' OR CONCAT_WS(' ', color, description) LIKE '%{$search_box}%' OR CONCAT_WS(' ', type, othertype) LIKE '%{$search_box}%' OR CONCAT_WS(' ', color, type) LIKE '%{$search_box}%' OR CONCAT_WS(' ', type, color) LIKE '%{$search_box}%' OR CONCAT_WS(' ', brand, location) LIKE '%{$search_box}%' OR CONCAT_WS(' ', datefound, brand) LIKE '%{$search_box}%' OR CONCAT_WS(' ', datefound, location) LIKE '%{$search_box}%'");     
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <span style="color:white; font-size: 18px;">Surrendered by: </span>
      <span style="color:white; font-size: 18px;"><?= $fetch_product['name']; ?></span><br>
      <input type="hidden" name="type" value="<?= $fetch_product['type']; ?>">
      <input type="hidden" name="description" value="<?= $fetch_product['description']; ?>">
   <?php
         }
      }else{
         echo '<p class="empty">No Items Found.</p>';
      }
   }
   ?>       
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
<br>
<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search_box" placeholder="Search here..." maxlength="100" class="box" required>
      <button type="submit" class="fas fa-search" name="search_btn"></button>  
   </form>

   <a href="index.html" style="text-decoration:none;">
   <button  class="fas fa-arrow-left" type="button" id="return"></button></a>

   
   
</section>

<section class="products" style="padding-top: 0; min-height:100vh;">

   <div class="box-container">

   <?php
     if(isset($_POST['search_box']) OR isset($_POST['search_btn'])){
     $search_box = $_POST['search_box'];
     $select_products = $conn->prepare("SELECT * FROM `Items` WHERE CONCAT_WS(' ', name, type, othertype, description, date, color, location, otherloc) LIKE '%{$search_box}%' OR name LIKE '%{$search_box}%' OR image_01 LIKE '%{$search_box}%' OR date LIKE '%{$search_box}%' OR type LIKE '%{$search_box}%' OR othertype LIKE '%{$search_box}%' OR description LIKE '%{$search_box}%' OR datefound LIKE '%{$search_box}%' OR brand LIKE '%{$search_box}%' OR color LIKE '%{$search_box}%' OR CONCAT_WS(' ', description, type, othertype, color) LIKE '%{$search_box}%' OR CONCAT_WS(' ', color, othertype, type, description) LIKE '%{$search_box}%' OR CONCAT_WS(' ', description, color) LIKE '%{$search_box}%' OR CONCAT_WS(' ', color, description) LIKE '%{$search_box}%' OR CONCAT_WS(' ', type, othertype) LIKE '%{$search_box}%' OR CONCAT_WS(' ', color, type) LIKE '%{$search_box}%' OR CONCAT_WS(' ', type, color) LIKE '%{$search_box}%' OR CONCAT_WS(' ', brand, location) LIKE '%{$search_box}%' OR CONCAT_WS(' ', datefound, brand) LIKE '%{$search_box}%' OR CONCAT_WS(' ', datefound, location) LIKE '%{$search_box}%' OR CONCAT_WS(' ', brand, color) LIKE '%{$search_box}%' OR CONCAT_WS(' ', color, brand) LIKE '%{$search_box}%' OR CONCAT_WS(' ', type, brand) LIKE '%{$search_box}%' OR CONCAT_WS(' ', othertype, brand) LIKE '%{$search_box}%'");     
     $graph_json;
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="first.php" method="post" class="box">
      <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
      <input type="hidden" name="type" value="<?= $fetch_product['type']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
      <a onclick="modal1()" id="mpopupLink" class="fas fa-eye"></a>
      <img src="lock.png" alt="">
      <div class="type"><?= $fetch_product['type']; ?></div>
      <div class="type"><?= $fetch_product['othertype']; ?></div>
      <div class="flex">
         <div class="price"><span>Date Surrendered: </span><?= $fetch_product['date']; ?><span></span></div>
         
      </div>
      <input type="submit" value="Claim" class="btn" name="claim">
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">No Items Found.</p>';
      }
   }
   ?>

   </div>

</section>












<?php include 'components/footer.php'; ?>

<script src="../js/script.js"></script>
<script>
<?php
// Get the starting node from a form
$start_node = $_POST['start_node'];

// Construct the graph as an adjacency list
$graph = array(
    'A' => array('B', 'C'),
    'B' => array('D', 'E'),
    'C' => array('F'),
    'D' => array(),
    'E' => array('F'),
    'F' => array()
);

// Encode the graph and the start node as JSON
$graph_json = json_encode($graph);
$start_node_json = json_encode($start_node);

// Call the dfs function using eval()
$result_json = eval("let graph = JSON.parse('$graph_json'); let start_node = JSON.parse('$start_node_json'); dfs(graph, start_node);");

// Decode the result from JSON and print it
$result = json_decode($result_json);
print_r($result);
?>

</script>

</body>
</html>