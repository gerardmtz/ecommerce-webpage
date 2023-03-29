<!-- conneting files -->
<?php
    include('includes/connect.php');
    include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalles del carrito</title>
    <!--bootstrapt CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css files -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- <style> 
        .cart_img{
        width: 80px;
        height: 80px;;
        }
    </style> -->

  </head>
  <link rel="stylesheet" href="sytle.css">

  <body>
  <!--nav bar-->
    <div class="container-fluid p-0">

        <!--first child-->
        <nav class="navbar navbar-expand-lg bg-danger">
        <div class="container-fluid">
            <img src="./img/logo.png" alt="" class = "logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Página Principal</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="display_all.php">Productos</a> 
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Registro</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"> <sup>  <?php cart_item(); ?> </sup> </i></a>
                </li>
                <li class="nav-item">
                <!-- <a class="nav-link" href="#">Monto total: $<?php total_cart_price(); ?> </a> -->
                </li>
                <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

        <!-- Calling the cart function -->
        <?php cart(); ?>
        
        <!--second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Bienvenido: Invitado</a>
                </li>
                <li class = "nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <!--third child-->
        <div class="bg-light">
            <h3 class="text-center"> Venta de Instrumentos </h3>
            <p class="text-center">De músicos para músicos en todo México</p>
        </div>

        <!-- fourth child-table for cart-->
        <div class = "container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <thead>
                                <tr>
                                    <th>Título del producto</th>
                                    <th> Imagen del producto</th>
                                    <th> Cantidad</th>
                                    <th> Precio total </th>
                                    <th> Eliminar </th>
                                    <th colspan="2"> Operaciones </th>
                                </tr>
                        </thead>
                        <tbody>
                            <!-- php code to display dynamic cart items -->
                            <?php 
                                global $con;
                                $get_ip_add = getIPAddress();
                                $total_price = 0;
                                $cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add';";
                                $result=mysqli_query($con, $cart_query);
                            
                                while( $row=mysqli_fetch_array($result) ){
                            
                                    $product_id=$row['product_id'];
                                    $select_products="SELECT * FROM `products` WHERE product_id='$product_id';";
                                    $result_products=mysqli_query($con, $select_products);
                            
                                    while( $row_product_price=mysqli_fetch_array($result_products) ){
                            
                                        $product_price = array($row_product_price['product_price']);
                                        $price_table = $row_product_price['product_price'];
                                        $product_title= $row_product_price['product_title'];
                                        // $product_id = $row_product_price['product_id'];
                                        $product_image1=$row_product_price['product_image1'];
                                        $product_values= array_sum($product_price);
                                        $total_price += $product_values;

                                // these two whiles are closed below                                            
                            ?>
                            <tr>
                                <td> <?php echo $product_title ?> </td>
                                <td> <img src="./img/<?php echo $product_image1?>" alt="" class="cart_img"> </td>
                                <td> <input type="text" name="qty" class="form-input w-50"> </td>
                                <td> $<?php echo $price_table ?> </td>
                                <td> <input type="checkbox" name="" id="">  </td>
                                <td>
                                    <!-- <button class="bg-danger border-0 mx-2">Actualizar</button> -->
                                    <input type="submit" value="Actualizar Carrito" class="bg-danger border-0 mx-2" name="update_cart">
                                    <button class="bg-danger border-0 mx-1">Eliminar</button>
                                </td>
                                <!-- php code for updating the quantity in the databse-->
                                <?php
                                    $get_ip_add = getIPAddress();
                                    if( isset( $_POST['update_cart'] ) ){
                                        if( isset($_POST['qty']) ){
                                            $quantities=$_POST['qty'];
                                            $update_cart="UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_add' /*AND product_id=$product_id*/;";
                                            $result_products_quantitiy=mysqli_query($con,$update_cart);
                                            $total_price=$total_price*$quantities;
                                        }
                                        else{ echo "error al cargar las cantidades"; }
                                    }
                                ?>
                            </tr>
                            <!-- end of ddisplay dynamic cart items -->
                            <?php 
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                    <!-- subtotal -->
                    <div class="d-flex mb-5">
                        <h4 class="px-3">Subtotal: <strong class="text-danger"> $<?php echo $total_price?> </strong> </h4>
                        <a href="index.php"> <button class="bg-danger px-3 py-2 border-0 mx-2"> Seguir comprando </button> </a>
                        <a href="#"> <button class="bg-secondary px-3 py-2 border-0 mx-2 text-light" > Salir </button> </a>
                    </div>
                </form> <!-- end of form for sending cart info to the database -->
            </div>
        </div>
        <!--Last Nav Bar Child -->
        <!-- footer -->    
        <!-- including footer file -->
        <?php include("./includes/footer.php") ?>
    </div>
    <!--bootstrap JS links-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>