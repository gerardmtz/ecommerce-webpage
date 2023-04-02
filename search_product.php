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
    <title>Taylor</title>
    <!--bootstrapt CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <!-- css files -->
  <link rel="stylesheet" href="./css/style.css">

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
                <a class="nav-link active" aria-current="page" href="#">Página Principal</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Productos</a> 
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Registro</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"> <sup> <?php cart_item(); ?> </sup> </i></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Monto total: $<?php total_cart_price(); ?> </a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>

            <!-- search bar -->
            <form class="d-flex" role="search" action="" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <!-- <button class="btn btn-outline-light" type="submit">Buscar</button> -->
                <input type="submit" value="Search" class="btn-outline-light" name="search_data_product">
            </form>
            </div>
        </div>
        </nav>

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

        <!--fourth child -->
        <div class="row px-3">
            <div class="col-md-10">
                <!--productos-->
                <div class="row">
                    <!-- <div class="col-md-4 mb-2"> -->
                        <!-- fetching the products -->
                        <?php 
                            search_product();
                            get_unique_categories();
                            get_unique_brands();
                        ?>
                    <!-- </div> -->
                </div>
            </div> <!-- column end -->

                <div class="col-md-2 bg-secondary p-0">
                <!--side nav-->
                <!-- marcas de guitarras que serán desplegadas-->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-danger ">
                        <a href="#" class="nav-link text-light"> <h4> Marcas Asociadas </h4> </a>
                    </li>

                    <!-- fetching the brands into the side bar from the index -->
                    <?php
                        getBrands();
                    ?>
                </ul>

                <!--Categorías desplegadas -->

                <ul class="navbar-nav me-auto text-center">

                    <li class="nav-item bg-danger ">
                        <a href="#" class="nav-link text-light"> <h4> Cetegorías </h4> </a>
                    </li>

                    <!-- fetching the categories into the side bar from the index -->

                    <?php
                        getCategories();
                    ?>
                </ul>
            </div>

        </div> <!-- row end -->

        <!--Last Nav Bar Child -->
        <!-- footer -->    
        <div class="bg-danger p-3 text-center">
            <p>Todos los Derechos Reservados © Taylor-2023 </p>
        </div>   
    </div>
    <!--bootstrap JS links-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>