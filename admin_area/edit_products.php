<!-- 13/04/2023 Video 65 y 66-->
<!-- 18/04/2023 Video 67-->

<?php
if (isset($_GET['edit_products'])) {
    $eidt_id = $_GET['edit_products'];
    // echo $edit_id;
    $get_data = "Select * from 'products' where product_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title = $row['product_title'];
    //echo $product_title;
    $product_description = $row['product_description'];
    $product_keywords = $row['product_keywords'];
    $category_id = $row['category_id'];
    $brand_id = $row['brand_id'];
    $product_image1 = $row['product_image1'];
    $product_image2 = $row['product_image2'];
    $product_image3 = $row['product_image3'];
    $product_price = $row['product_price'];

    // fetchig category name
    $select_category = "Select * from 'categories' where category_id=$category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];
    //echo $category_title;

    // fetchig category name
    $select_brand = "Select * from 'brands' where brand_id=$brand_id";
    $result_brand = mysqli_query($con, $select_category);
    $row_brand = mysqli_fetch_assoc($result_category);
    $brand_title = $row_brand['brand_title'];
    //echo $brand_title;
}




?>



<div class="container mt-5">
    <h1 class="text-center"> Editar Productos</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Titulo del producto</label>
            <input type="text" name="product_title" id="product_title" value="<?php echo $product_title ?>" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Descripción del Producto</label>
            <input type="text" name="product_desc" id="product_desc" value="<?php echo $product_description ?>" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Palabras Clave del Producto</label>
            <input type="text" name="product_keywords" id="product_keywords" value="<?php echo $product_keywords ?>" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Categoria del Producto</label>
            <select name="product_category" class="form_select">
                <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                <?php

                $select_brand_all = "Select * from 'brands'";
                $result_brand_all = mysqli_query($con, $select_brand_all);
                while ($row_brand_all = mysqli_fetch_assoc($result_brand_all)) {
                    $brand_title = $row_brand_all['brand_title'];
                    $brand_id = $row_brand_all['brand_id'];
                    echo "<opcion value='$brand_id'>$brand_title</option>";
                };

                ?>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
                <option value="">5</option>
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Marca del Producto</label>
            <select name="product_brands" class="form_select">
            <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Imagen 1</label>
            <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/value=<?php echo $product_image1 ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Imagen 2</label>
            <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/value=<?php echo $product_image2 ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Imagen 3</label>
            <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/value=<?php echo $product_image3 ?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Precio del Producto</label>
            <input type="text" name="product_price" id="product_price" class="form-control" required="required" value="<?php echo $product_price ?>">
        </div>

        <div class="w-50 m-auto">
            <input type="submit" name="edit_product"  value="Update product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<!-- Editor de productos -->

<?php

if(isset($_POST['edit_products'])){

    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checando los campos vacios o no

    if($product_title=='' or $product_desc=='' or $product_keywords=''
    or $product_category=='' or $product_brands=='' or $product_price==''
    or $temp_image1=='' or $temp_image2=='' or $temp_image3==''){
        echo "<script>alert('Por favor rellena todos campos y continuar con el proceso')</script>";
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_images1");
        move_uploaded_file($temp_image2,"./product_images/$product_images2");
        move_uploaded_file($temp_image3,"./product_images/$product_images3");

        //query para actualizar productos

        $update_product="update 'products' set product_title='$product_title',
        product_description='$product_desc',producto_keywords='$product_keywords',
        categoria_id='$product_category', brand_id='$product_brand',
        product_image1='$product_image1', product_image2='$product_image2',
        product_image3='$product_image3', product_price='$product_price', date=NOW() where
        product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('El producto se ha actualizado correctamente')</script>";
            echo "<script>window.open('./insert_product.php','_self')</script>";
        }
    }

}

?>