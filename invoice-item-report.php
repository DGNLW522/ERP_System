<?php
include "db_conn.php";
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
  <div class="text-center mb-4">
         <h3>Invoice Item Report</h3> 
      </div>
  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="view-customer.php" class="btn btn-dark">View Customer</a>
    <a href="view-item.php" class="btn btn-dark">View Item</a> 
    <a href="invoice-report.php" class="btn btn-dark">Invoice Report</a>
    <a href="item-report.php" class="btn btn-dark">Item Report</a>
    <a href="./invoice-item-search/index.php" class="btn btn-dark">Search Invoice Item</a>
  <br><br>
    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Invoice Number</th>
          <th scope="col">Invoiced Date</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Item Name & Code</th>
          <th scope="col">Item Category</th>
          <th scope="col">Item Unit Price</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT i.id, i.invoice_no, i.date, c.first_name, t.item_name, t.item_category, t.unit_price FROM customer c JOIN invoice i ON (i.customer = c.id) JOIN invoice_master m ON (m.invoice_no = i.invoice_no) JOIN item t ON(t.id = m.item_id)";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["invoice_no"] ?></td>
            <td><?php echo $row["date"] ?></td>
            <td><?php echo $row["first_name"] ?></td>
            <td><?php echo $row["item_name"] ?></td>
            <td><?php echo $row["item_category"] ?></td>
            <td><?php echo $row["unit_price"] ?></td>
             
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>