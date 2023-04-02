<?php
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    include('../includes/connect.php');

    if( isset($_POST['insert_product']) ){

        $product_title=$_POST['product_title'];
        $description=$_POST['description'];
        $product_keywords=$_POST['product_keywords'];
        $product_category= intval($product_category=$_POST['product_category']);
        $product_brands= intval($product_brands=$_POST['product_brands']);
        $product_price=$_POST['product_price'];
        $product_status = 'true';

        // accessing images
        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];

        // accesing image temporal name
        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];

        // echo var_dump($product_title);
        // echo var_dump($description);
        // echo var_dump($product_keywords);
        // echo var_dump($product_category);
        // echo var_dump($product_brands);
        // echo var_dump($product_price);

        // checking empty condition
        if( $product_title=='' or $description=='' or $product_keywords=='' or
            $product_category=='' or $product_brands=='' or $product_price=='' or
            $product_image1=='' or $product_image2=='' or $product_image3=='' ) {

            echo "<script> alert('Por favor llene todos los campos') </script>";
            exit();
        }else{

            move_uploaded_file($temp_image1, "./product_images/$product_image1");
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
            move_uploaded_file($temp_image3, "./product_images/$product_image3");

            // insert query 

            $insert_products="INSERT INTO `products` ( product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) 
            VALUES ('$product_title', '$description', '$product_keywords', '$product_category', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status');";

            $result_query=mysqli_query($con, $insert_products);

            if( $result_query ){
                echo "<script> alert('Éxito al insertar el producto') </script>";
            }

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Productos-Admin Dashboard</title>

    <!--bootstrapt CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- font awesome link -->
    <!--font Awesome Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body class="bg-light">

    <div class="container mt-3">

        <h1 class="text-center">Insertar Productos</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">

        <!-- title -->
            <div class="form-outline mb-4 w-50 m-auto"> 
                <label for="product_title" class="form-label">Nombre del producto</label>
                <input type="text" name="product_title" id="product_title" class="form-control"
                placeholder="Introduzca el nombre del producto" 
                autocomplete="off" required="requiered">
            </div>

        <!-- description -->
            <div class="form-outline mb-4 w-50 m-auto"> 
                <label for="description" class="form-label">Descripción del producto</label>
                <input type="text" name="description" id="description" class="form-control"
                placeholder="Introduzca la descripcion del producto" 
                autocomplete="off" required="requiered">
            </div>

        <!-- keywords -->
            <div class="form-outline mb-4 w-50 m-auto"> 
                <label for="product_keywords" class="form-label">Plabras clave</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control"
                placeholder="Introduzca palabras clave para el producto" 
                autocomplete="off" required="requiered">
            </div>

        <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto"> 
                <select name="product_category" id="" class="form-select">

                    <option value="">Seleccionar categoría</option>

                    <?php

                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);

                        $select_query="SELECT * FROM `categories`;";
                        $result_query=mysqli_query($con, $select_query);

                        while( $row=mysqli_fetch_assoc($result_query) ){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }

                    ?>
                    <!-- <option value="">Categoría 1</option>
                    <option value="">Categoría 2</option>
                    <option value="">Categoría 3</option>
                    <option value="">Categoría 4</option>
                    <option value="">Categoría 5</option> -->
                </select>
            </div>

        <!-- brands -->
            <div class="form-outline mb-4 w-50 m-auto"> 
                <select name="product_brands" id="" class="form-select">
                    <option value="">Seleccionar marca</option>
                    
                    <?php

                        ini_set('display_errors', 1);
                        ini_set('display_startup_errors', 1);
                        error_reporting(E_ALL);

                        $select_query="SELECT * FROM `brands`;";
                        $result_query=mysqli_query($con, $select_query);

                        while( $row=mysqli_fetch_assoc($result_query) ){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>

                </select>
            </div>


        <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto"> 
                <label for="product_image1" class="form-label">Imagen 1 Producto </label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"
                required="requiered">
            </div>

        <!-- image 2 -->
            <div class="form-outline mb-4 w-50 m-auto"> 
                <label for="product_image2" class="form-label">Imagen 2 Producto</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control"
                required="requiered">
            </div>

        <!-- image 3 -->
            <div class="form-outline mb-4 w-50 m-auto"> 
                <label for="product_image3" class="form-label">Imagen 3 Producto</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control"
                required="requiered">
            </div>

        <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto"> 
                <label for="product_price" class="form-label">Precio del producto</label>
                <input type="text" name="product_price" id="product_price" class="form-control"
                placeholder="Introduzca el precio del producto" autocomplete="off"
                required="requiered">
            </div>

 
        <!-- botón para la inserción de productos -->
            <div class="form-outline mb-4 w-50 m-auto"> 
                <input type="submit" name="insert_product" id="insert_product" 
                class="btn btn-info mb-3 px-3" value="Insertar productos"
                required="requiered">
            </div>

        </form>
    </div> 
</body>
</html>