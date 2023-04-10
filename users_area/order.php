<!-- 02/04/2023 Video 50 y 51 -->
<!-- 03/04/2023 Corrección de corchetes en la Linea 10 Columna 16 y 27 -->

<?php include('../includes/connect.php');
include('../functions/common_function.php');

//Función de mostrar el usuario por medio del ID
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
} 

//Obteniendo el total de precio de todos los items

$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address';";

$result_cart_price = mysqli_query( $con, $cart_query_price );

//Variables nuevas del video 51----------------------------------
$invoice_number = mt_rand();
$status = 'pending';
//---------------------------------------------------------------

$count_products = mysqli_num_rows( $result_cart_price );

//Ciclo que cuenta cuantos items tiene el usuario
while ($row_price = mysqli_fetch_array( $result_cart_price ) ) {
    $product_id = $row_price['product_id'];

    $select_products = "SELECT * FROM `products` WHERE product_id = $product_id";

    $run_price = mysqli_query( $con, $select_products );
    while ( $row_product_price = mysqli_fetch_array( $run_price ) ) {
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum( $product_price );
        $total_price += $product_values;
    }
}
//Desarrollo del video 51----------------------------------
// Obtener la cantidad del carrito
$get_cart = "SELECT * FROM `cart_details`;";
$run_cart = mysqli_query($con, $get_cart);
$get_iem_quantity = mysqli_fetch_array( $run_cart );
$quantity = $get_iem_quantity['quantity'];
if ($quantity == 0) {
    $quantity = 1;
    $subtotal = $total_price;
} else {
    $quantity = $quantity;
    $subtotal = $total_price * $quantity;
}

$insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number,
                total_products, order_date, order_status)
                VALUES ($user_id, $subtotal, $invoice_number, $count_products, NOW(),'$status')";

$result_query = mysqli_query($con, $insert_orders);

if ($result_query) {
    echo "<script>alert('Las ordenes se enviaron exitosamente')</script>";
    echo "<script>window.open('profile.php' , '_self')</script>";
}


//03/04/2023 Video 52 -------------------------------------------------------
//Código de Ordenes Pendientes Carrito
$insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number,
                product_id,quantity, order_status)
                VALUES ($user_id, $invoice_number, $product_id, $quantity,'$status')";

$result_pending_orders = mysqli_query($con, $insert_pending_orders);

//Código de Eliminar Items en Carrito
$empty_cart = "DELETE FROM * `cart_details` WHERE ip_address = '$get_ip_address'";
                $result_delete = mysqli_query($con, $empty_cart);
?>