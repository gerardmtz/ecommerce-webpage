<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../includes/connect.php');

if( isset($_POST['insert_cat']) ) {

    $category_title=$_POST['cat_title'];

    $select_query="SELECT * FROM `categories` WHERE category_title='$category_title';";

    $resul_select=mysqli_query($con, $select_query);
    $number=mysqli_num_rows($resul_select);

    if($number>0){

        echo "<script> alert('Esta categoría ya se encuentra en la base de datos') </script>";

    }
    else{

        $insert_query="INSERT INTO `categories` (category_title) VALUES ('$category_title');";
        $result=mysqli_query($con, $insert_query);
    
        if($result){
            echo "<script> alert('La categoría se inserto exitosamente') </script>";
        }

    }  
}
?>

<h2 class="text-center">Insertar Categorias</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text br-danger" id="basic-addon1"> <i class="fa-solid fa-receipt"></i> </span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insertar categorias" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
    
        <input type="submit" class="bg-danger border-0 p-2 my-3" name="insert_cat" value="Insertar categorias" aria-label="Username" aria-describedby="basic-addon1">
        
    </div>
    

</form> 