<?php

include '../components/connect.php';

?>
<?php
// Check if the 'pid' parameter exists in the URL
if (isset($_GET['pid'])) {
    // Retrieve the 'pid' value from the URL
    $pid = $_GET['pid'];

    // Now, you can use the $pid variable in your page as needed
    echo "Received pid: " . $pid;

    // You can use $pid to perform any actions or display content based on it
} 


    // Validate pid
    if (empty($pid)) {
        $errors[] = "Product ID is required.";
    }

    // If there are no errors, proceed to display the product details
    if (empty($errors)) {
        // Prepare and execute a query to retrieve product details based on pid
        $stmt = $conn->prepare("SELECT * FROM items WHERE id = :pid");
        $stmt->execute([':pid' => $pid]);

        if ($stmt->rowCount() > 0) {
            // Fetch product details
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            // Close the database connection
            $conn = null;
        } else {
            // Product not found
            $errors[] = "Product not found.";
        }
    }


// Function to sanitize user input
function sanitize_input($data)
{
    $data = trim($data);
    return $data;
}
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
 
     <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

</head>
<body>
    <a href="index.html" class="back-button"><i class="fa fa-arrow-left"></i> Back</a>

    <section class="information">
        <div class="container">
            <div class="center">
                    <form id="request" class="main_form" >
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="Type" type="type" id="type1"> 
                            </div>
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="Brand" type="type" id="brand1"> 
                            </div>
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="Color" type="type" id="color1"> 
                            </div>
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="Description" type="type" id="description1"> 
                            </div>
                            <div class="col-sm-12">
                                <button class="send_btn" onclick="compareText()">Claim</button>
                            </div>
                            <div class="col-md-12">
                                <p style="color: white; ">Input the correct specifications of your item to validate ownership.</p>
                            </div>       
                        </div>
                    </form>
                    
                    <form id="request" class="main_form">
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="Name" type="type" id="type2" value="<?php echo $product['type']; ?>"> 
                            </div>
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="Brand" type="type" id="brand2" value="<?php echo $product['brand']; ?>"> 
                            </div>
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="color" type="type" id="color2" value="<?php echo $product['color']; ?>"> 
                            </div>
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="description" type="type" id="description2" value="<?php echo $product['description']; ?>"> 
                            </div>
                        </div>
                    </form> 

                </div>     
            </div>
            <script>
        function compareText() {
            var type1 = document.getElementById('type1').value.toLowerCase();
            var brand1 = document.getElementById('brand1').value.toLowerCase();
            var color1 = document.getElementById('color1').value.toLowerCase();
            var description1 = document.getElementById('description1').value.toLowerCase();
    
            var type2 = document.getElementById('type2').value.toLowerCase();
            var brand2 = document.getElementById('brand2').value.toLowerCase();
            var color2 = document.getElementById('color2').value.toLowerCase();
            var description2 = document.getElementById('description2').value.toLowerCase();
            
            var similarity = 0;
            
            // Compare type
            if (type1 === type2) {
                similarity += 1;
            }
            
            // Compare brand
            if (brand1 === brand2) {
                similarity += 1;
            }
            
            // Compare color
            if (color1 === color2) {
                similarity += 1;
            }
            
            // Compare description
            if (description1 === description2) {
                similarity += 1;
            }
            
            var percent = (similarity / 4) * 100;
            var resultMessage = "Similarity: " + percent.toFixed(2) + "%";
            alert(resultMessage);
        }
    </script>
     </section>

</body>
</html>