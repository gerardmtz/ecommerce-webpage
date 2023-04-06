<!-- 05/04/2023 Video 59 -->

<?php

include('includes/connect.php');
session_start();

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    //echo $order_id;
    $select_data="Select * from 'user_orders' where order_id=$order_id";
    $result=mysqli_query($con, $select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

    <!-- boorstartp css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>

<body class="bg-secondary">
    <h1 class="text-center text-light">Confirmar pago</h1>
    <div class="container my-5">
        <form action="" method="post">

            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" 
                value="<?php echo $invoice_number ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Cantidad</label>
                <input type="text" class="form-control w-50 m-auto" name="amount"
                value="<?php echo $amount_due ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option value="">Selecciona el Método de pago</option>
                    <option value="">UPI</option>
                    <option value="">Netbanking</option>
                    <option value="">Paypal</option>
                    <option value="">Cash on Delivery</option>
                    <option value="">Payoffline</option>
                </select>
            </div>

            <div class="form-outline my-4 text-center">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm"
                name="confirm_payment">
            </div>

        </form>
    </div>

</body>

</html>