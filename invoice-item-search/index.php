<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css" />


    <title>ERP System</title>
</head>

<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
  <h3>ERP System</h3>
  </nav>
  <div class="text-center mb-4">
         <h3>Invoice Item Report</h3> 
      </div>
    <div class="container">
        <div class="row"> 
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-3">
                        <!-- Table -->
                        <div class="table-responsive">
                        <a href="../invoice-item-report.php" class="btn btn-dark">Invoice Item Report</a>
                        <br><br>
                            <table class="table table-hover text-center" id="record_table">
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>

    <!-- Moment Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script> 
    //Fetch Records

    function fetch(std, res) {
        $.ajax({
            url: "records.php",
            type: "post",
            data: {
                std: std,
                res: res
            },
            dataType: "json",
            success: function(data) {
                var i = 1;
                $('#record_table').DataTable({
                    "data": data,
                    "responsive": true,
                    "columns": [{
                            "data": "id",
                            "render": function(data, type, row, meta) {
                                return i++;
                            }
                        },
                        {
                            "data": "invoice_no"
                        },
                        {
                            "data": "date"
                        },
                        {
                            "data": "first_name"
                        },
                        {
                            "data": "item_name",
                            "render": function(data, type, row, meta) {
                                return `${row.item_name}`;
                            }
                        },
                        {
                            "data": "item_category",
                            "render": function(data, type, row, meta) {
                                return `${row.item_category}`;
                            }
                        },
                        {
                            "data": "unit_price"
                        } 
                    ]
                });
            }
        });
    }
    fetch();
 
    </script>
</body>

</html>