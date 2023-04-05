<!-- 03/04/2023 Video 53 -->
<!-- 04/04/2023 Video 54 -->



<!-- conneting files -->
<!-- Se agregaron nuevas diagonales para el acceso de carpetas -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taylor Usuario <?php echo $_SESSION['username'] ?></title>
    <!--bootstrapt CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!--font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!-- css files -->
<link rel="stylesheet" href="../style.css">

<!-- Se agregaron Estilos -->
    <!-- 05/04/2023 Se agrego el estilo .edit_image -->
<style>
    .body {

        overflow-x: hidden;

    }

    .profile_img {

        width: 90%;
        margin: auto;
        display: block;
        height: 100%;
        object-fit: contain;

    }
    
    .edit_image{

        width: 100px;
        height: 100px;
        object-fit: contain;

    }
</style>

<body>
    <!--nav bar-->
    <div class="container-fluid p-0">

        <!--first child-->
        <nav class="navbar navbar-expand-lg bg-danger">
            <div class="container-fluid">
                <img src="./img/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Página Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">Productos</a>
                        </li>
                        <li class="nav-item">
                            <!-- Se agrego la href del archivo profile.php -->
                            <a class="nav-link" href="profile.php">My cuenta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                        <li class="nav-item">

                            <!-- 29/03/2023 Se agrego la página cart.php y la funcion cart_item()-->
                            <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i>
                                <sup><?php cart_item(); ?></sup> </a>

                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"> <sup> <?php cart_item(); ?> </sup> </i></a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Monto total: $<?php total_cart_price(); ?> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>

                    <!-- search bar -->
                    <!-- Se restructuro esta parte del código -->
                    <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="Search-data">
                        <input type="submit" value="Search" class="btn btm-outline-light" name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>

        <!-- Calling the cart function -->
        <?php cart(); ?>

        <!--second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <!-- Se agrego una nueva función de otro video menores al 50 -->
                <?php
                if (!isset($_SESSION['username'])) {
                    echo " <li class = 'nav-item'>
                    <a class = 'nav-link' href = '#'> Bienvenido Invitado</a>
                    </li>";
                } else {
                    echo "<li class = 'nav-item'>
                    <a class = 'nav-link' href = '#'> Bienvenido" . $_SESSION['username'] . "</a>
                    </li>";
                }

                if (!isset($_SESSION['username'])) {
                    echo " <li class = 'nav-item'>
                    <a class = 'nav-link' href = './users_area/user_login.php'>Login</a>
                    <li>";
                } else {
                    echo "<li class = 'nav-item>
                    <a class = 'nav-link' href = './users_area/logout.php'> Logout </a>
                    </li>";
                }
                ?>

                <li class="nav-item">
                    <a class="nav-link" href="#">Bienvenido: Invitado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <!--third child-->
        <div class="bg-light">
            <h3 class="text-center"> Venta de Instrumentos </h3>
            <p class="text-center">De músicos para músicos en todo México</p>
        </div>

        <!-- fourth child -->

        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secundary text-center" style="height:100vh">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#">
                            <h4>Tu Perfil</h4>
                        </a>
                    </li>
                    <!-- 04/04/2023 Se agrego un username del video 54 -->
                    <?php
                    $username = $_SESSION['username'];
                    $user_image = "Select * from 'user_table' where username = '$username'";
                    $user_image = mysqli_query($con, $user_image);
                    $row_image = mysqli_fetch_array($user_image);
                    $user_image = $row_image['user_image'];
                    //Falta corregir la imagen que utilizaremos
                    echo "<li class = 'nav-item'>
                    <img src = './user_images/$user_image' class = 'profile_img my-4' alt = ''>
                    </li>";
                    ?>


                    <li class="nav-item">
                        <!-- Falta un imagen a poner como usuario -->
                        <img src="#" class="profile_img my-4" alt="">
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php">
                            Ordenes Pendientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?edit_account">
                            Editar Cuenta
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?my_orders">
                            Mis Pedidos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="profile.php?delete_account">
                            Borrar Cuenta
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="logout.php">
                            Desconectar
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <!-- 05/04/2023 Video 56 Se agrego una función para editar perfil  -->
                <?php get_user_order_details();

                if( isset ( $_GET[ 'edit_account' ] ) ) {

                    include( 'edit_account.php' );

                }
                
                ?>
            </div>
        </div>

        <!--Last Nav Bar Child -->
        <!-- footer -->

        <!-- including footer file -->
        <?php include("../includes/footer.php") ?>

    </div>
    <!--bootstrap JS links-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>