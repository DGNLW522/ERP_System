<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
   $first_name = $_POST['first_name'];
   $middle_name = $_POST['middle_name'];
   $last_name = $_POST['last_name'];
   $title = $_POST['title'];
   $contact_no = $_POST['contact_no'];
   $district = $_POST['district'];

  $sql = "UPDATE `customer` SET `first_name`='$first_name',`middle_name`='$middle_name',`last_name`='$last_name',`title`='$title',`contact_no`='$contact_no',`district`='$district' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: view-customer.php?msg=Data updated successfully");
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
    ERP System
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit Customer Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>

    <?php
    $sql = "SELECT * FROM `customer` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">First Name:</label>
                  <input type="text" class="form-control" name="first_name" placeholder="saman">
               </div>
               <div class="col">
                  <label class="form-label">Middle Name:</label>
                  <input type="text" class="form-control" name="middle_name" placeholder="shantha">
               </div>
               <div class="col">
                  <label class="form-label">Last Name:</label>
                  <input type="text" class="form-control" name="last_name" placeholder="kumara">
               </div>
            </div>
            <div class="form-group mb-3">
               <label>Title:</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="mr" id="mr" value="mr">
               <label for="mr" class="form-input-label">Mr</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="mrs" id="mrs" value="mrs">
               <label for="mrs" class="form-input-label">Mrs</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="miss" id="miss" value="miss">
               <label for="miss" class="form-input-label">Miss</label>
            </div> 
            <div class="mb-3">
               <label class="form-label">Contact No:</label>
               <input type="text" class="form-control" name="contact_no" placeholder="0724468955">
            </div>
            <div class="mb-3">
               <label class="form-label">District:</label>
               <input type="text" class="form-control" name="district" placeholder="5">
            </div>
        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="view-customer.php" class="btn btn-danger">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>