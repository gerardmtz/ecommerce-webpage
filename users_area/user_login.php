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

</head>
<body>

    <div class="container-fluid my-3">
        <h2 class="text-center">Inicio de Sesión</h2>
        <!-- <div class="row d-flex align-items-center justify-content-center"> -->
        <!-- Se tuvo que optar a una alternativa por falta de compatibilidad -->
        <div class="form-outline mb-4 w-50 m-auto mt-5">    
            <div clas="col-lg-12 col-xl-6">   <!-- enctype allows files to be sent through a POST-->
                <form action="" method="POST" enctype="multipart/form-data">
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