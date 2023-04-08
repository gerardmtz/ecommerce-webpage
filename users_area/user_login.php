<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>

    <!--bootstrapt CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-Q2N+L5OJdw5qfhBf/24x/NSA+jElMTfc98tPZYm+yyZoXgZfLp0HJLZDPt1wFgUIykw0hflvyCprH4u89vL8Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <!-- link css files -->
    <link rel="stylesheet" href="../css/style_user.css">

    <!--

        <style>
            body{ overflow-x:hidden; }
        </style>


     -->

</head>
<body>

    <div class="container-fluid my-3">
        <h2 class="text-center">Inicio de Sesión</h2>
        <!-- <div class="row d-flex align-items-center justify-content-center"> -->
        <!-- Se tuvo que optar a una alternativa por falta de compatibilidad -->
        <div class="form-outline mb-4 w-50 m-auto mt-5">    
            <div clas="col-lg-12 col-xl-6">   <!-- enctype allows files to be sent through a POST-->
                                              <!-- Se eliminó lo siguiente: -->
                                              <!-- enctype="multipart/form-data" -->
                <form action="" method="POST">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Nombre de usuario</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Introduce el nombre de usuario" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Contraseña</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Introduce la contraseña" autocomplete="off" required="required" name="user_password"/>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Ingresar" class="bg-danger py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">¿No tiene una cuenta? Haga una <a href="user_registration.php" class="text-danger"> Aquí </a></p>
                    </div>

                </form>

            </div> 
        </div>

    </div>

</body>
</html>

<!-- Logic for the login page -->
<?php

if( isset($_POST['user_login']) ){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_username';";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    // consultando los artículos del carrito en la sesión
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip';";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);
    
    if($row_count>0){
        $_SESSION['username'] = $user_username;
        if( password_verify($user_password, $row_data['user_password']) ){

            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username'] = $user_username;
                echo "<script> alert('Sesión iniciada') </script>";
                echo "<script> window.open('profile.php','_self') </script>";
            }else{
                $_SESSION['username'] = $user_username;
                echo "<script> alert('Sesión iniciada') </script>";
                echo "<script> window.open('payment.php','_self') </script>";
            }

        }else{
            echo "<script> alert('Credenciales inválidas') </script>";
        }

    }else{
        echo "<script> alert('Credenciales inválidas') </script>";
    }
}
?>