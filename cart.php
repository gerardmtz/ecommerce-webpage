<!-- 29/03/2023 Terminación del video 29 -->


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
    <!-- 29/03/2023 Se cambio el titulo-->
    <title>Taylor - Detalles del carrito</title>
    <!--bootstrapt CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <!-- 29/03/2023 Se agrego la página cart.php y la funcion cart_item()-->
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i>
                <sup><?php cart_item();?></sup> </a>
                </li>
                    <!-- 29/03/2023 Se Elimino un nav-item de Monto Total.-->
                <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
                    <!-- 29/03/2023 Se elimino el From de Search Bar-->
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

       <!-- 29/03/2023  Se borro el Fourth child y se crea Fourth child-table -->

       <!-- Fourth child-table -->
        <div class="container">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Titulo del Producto</th>
                            <th>Imagen del Producto</th>
                            <th>Calidad</th>
                            <th>Precio Total</th>
                            <th>Borrar</th>
                            <th>Operaciones</th>
                        </tr>
                        <tbody>
                            <tr>
                                <!-- Frase de referencia en lo que agregamos la imagen indicada -->
                                <td>Apple</td>
                                <td><img src="./images/apple.jpg" alt=""></td>
                                <td><input type="text"></td>
                                <td>9000</td>
                                <td><input type="checkbox"></td>
                                <td>
                                    <p>Actualizar</p>
                                    <p>Borrar</p>
                                </td>
                            </tr>
                        </tbody>
                    </thead>
                </table><!-- Fin de table -->
               
                <!-- Subtotal -->
                <div class = "d-flex mb-5">
                    <h4 class="px-3">Subtotal:<strong class="text-info">5000/-</strong></h4>
                    
                     <a href="index.php"><botton class = "bg-info px-3 py-2 border-0 mx-3">Continuar Comprando</botton></a>
                     <!-- Falta agregar la página de donde se va a direccionar-->
                     <a href="#"><botton class = "bg-secondary p-3 py-2 border-0 text-light">Checkout</botton></a>
                </div>
            </div>
        </div>
    <!--bootstrap JS links-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>