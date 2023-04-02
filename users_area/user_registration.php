<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>

    <!--bootstrapt CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-Q2N+L5OJdw5qfhBf/24x/NSA+jElMTfc98tPZYm+yyZoXgZfLp0HJLZDPt1wFgUIykw0hflvyCprH4u89vL8Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <!-- link css files -->
    <link rel="stylesheet" href="../css/style_user.css">

</head>
<body>

    <div class="container-fluid my-3">
        <h2 class="text-center">Registro de nuevo usuario</h2>
        <!-- <div class="row d-flex align-items-center justify-content-center"> -->
        <!-- Se tuvo que optar a una alternativa por falta de compatibilidad -->
        <div class="form-outline mb-4 w-50 m-auto">    
            <div clas="col-lg-12 col-xl-6">   <!-- enctype allows files to be sent through a POST-->
                <form action="" method="POST" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Introduce el nombre de usuario" autocomplete="off" required="required" name="user_username"/>
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="text" id="user_email" class="form-control" placeholder="Introduce el email" autocomplete="off" required="required" name="user_email"/>
                    </div>
                    <!-- image field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="text" id="user_email" class="form-control" placeholder="Introduce el email" autocomplete="off" required="required" name="user_email"/>
                    </div>

                </form>

            </div> 
        </div>

    </div>

</body>
</html>