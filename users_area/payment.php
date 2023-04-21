<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de pagos</title>
    <!--bootstrapt CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- link to css stylesheet -->
    <link rel="stylesheet" href="../css/style.css"> 

</head>
<body>

    <!-- PHP code used to access the user id -->
    <?php
        $user_ip = getIPAddress();
        $get_user = "SELECT * FROM `user_table` WHERE user_ip = '$user_ip';";
        $result = mysqli_query($con, $get_user);
        $run_query = mysqli_fetch_array($result); 
        $user_id = $run_query['user_id'];


    ?>
    <div class="container">
        <h2 class="text-center text-danger"> Opciones de Pago </h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"> <img src="../img/payment.png" alt=""></a>
                <!-- <div class="col-md-6">
                    <a href="user_orders.php"> <h2> Otras formas de pago </h2> </a>  
                </div> -->
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>"> <h2 class="text-center">Otras formas de pago</h2> </a>  
            </div>    
        </div> 
    </div>
</body>
</html>