<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $item_code = $_POST['item_code'];
   $item_category = $_POST['item_category'];
   $item_subcategory = $_POST['item_subcategory'];
   $item_name = $_POST['item_name'];
   $quantity = $_POST['quantity'];
   $unit_price = $_POST['unit_price'];

   $sql = "INSERT INTO `item`(`id`, `item_code`, `item_category`, `item_subcategory`, `item_name`, `quantity`, `unit_price`) VALUES (NULL,'$item_code','$item_category','$item_subcategory','$item_name','$quantity','$unit_price')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: view-item.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>ERP System</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
   ADD ITEMS
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <h3>Add New Items</h3>
         <p class="text-muted">Complete the form below to add a new item</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="mb-3">
                  <label class="form-label">Item Code:</label>
                  <input type="text" class="form-control" name="item_code" placeholder="JK007">
            </div>
            <div class="row mb-3"> 
               <div class="col">
                  <label class="form-label">Item Category:</label>
                  <input type="text" class="form-control" name="item_category" placeholder="1">
               </div>
               <div class="col">
                  <label class="form-label">Item Subcategory:</label>
                  <input type="text" class="form-control" name="item_subcategory" placeholder="1">
               </div>
            </div>
            <div class="mb-3">
               <label class="form-label">Item Name:</label>
               <input type="text" class="form-control" name="item_name" placeholder="HP Laser printer">
            </div>
            <div class="mb-3">
               <label class="form-label">Quantity:</label>
               <input type="text" class="form-control" name="quantity" placeholder="10">
            </div>
            <div class="mb-3">
               <label class="form-label">Unit Price:</label>
               <input type="text" class="form-control" name="unit_price" placeholder="5000">
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="view-item.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>