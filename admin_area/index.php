<!-- 12/04/23 Video 63 -->


<!--  connect file -->
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
    <title>Admin Dashboard</title>

    <!--bootstrapt CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- font awesome link -->
    <!--font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <!--navbar-->
    <div class="container-fluid pd-0">

        <!--Fist child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-danger">
            <div class="container-fluid">
                <img src="../img/logo.png" alt="" class="logo">

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Bienvenido: Invitado</a>
                        </li>
                    </ul>


                </nav>

            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Administrar Detalles</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"> <img src="../img/artista4.jpg" alt="" class="admin_image"> </a>
                    <p class="text-light text-center">Nombre Administrador</p>
                </div>
                <div class="button text-center">

                    <button class="my-3"> <a href="insert_product.php" class="nav-link text-light bg-danger my-1"> Insertar Productos </a> </button>
                    <button> <a href="index.php?view_products" class="nav-link text-light bg-danger my-1"> Ver Productos </a> </button>
                    <button> <a href="index.php?insert_category" class="nav-link text-light bg-danger my-1"> Insertar Cateogrías </a> </button>
                    <button> <a href="index.php?view_categories" class="nav-link text-light bg-danger my-1"> Ver Categorías </a> </button>
                    <button> <a href="index.php?insert_brand" class="nav-link text-light bg-danger my-1"> Insertar Marcas </a> </button>
                    <button> <a href="index.php?view_brands" class="nav-link text-light bg-danger my-1"> Ver Marcas </a> </button>
                    <button> <a href="index.php?list_orders" class="nav-link text-light bg-danger my-1"> Todas las órdenes </a> </button>
                    <button> <a href="" class="nav-link text-light bg-danger my-1"> Todos los pagos </a> </button>
                    <button> <a href="" class="nav-link text-light bg-danger my-1"> lista de usuarios </a> </button>
                    <button> <a href="" class="nav-link text-light bg-danger my-1"> Salir </a> </button>

                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">

            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }

            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_products'])) {
                include('delete_products.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['edit_brands'])) {
                include('edit_brands.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['delete_brands'])) {
                include('delete_brands.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            ?>

        </div>

        <!--Last Nav Bar Child -->
        <!-- footer -->
        <!-- 
        
                Video 64 - Se comento esta parte.
        
        <div class="bg-danger p-3 text-center footer">
            <p>Todos los Derechos Reservados © Taylor-2023 </p>
        </div> -->

        <!-- Video 63 minuto 4:05 se agrega esta linea de código-->
        <?php include("../includes/footer.php") ?>

    </div>

    <!--bootstrap JS links-->
   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>