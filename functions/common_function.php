<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

// including connection file
include ('./includes/connect.php');

// function for getting products
function getProducts(){
    global $con;

    // cheking if the brands are set or not
    if( !isset( $_GET['category'] ) ){

        if( !isset( $_GET['brand'] ) ){

            $select_query="SELECT * FROM `products` ORDER BY rand() LIMIT 0,3;";
            $result_query=mysqli_query($con, $select_query);

            while( $row=mysqli_fetch_assoc($result_query) ){

                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                echo " 
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Añadir al carrito</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ver más</a>
                            </div>
                        </div>
                    </div>
                ";
            }

        }
    }  
}

// getting all products
function get_all_products(){
    global $con;

    // cheking if the brands are set or not
    if( !isset( $_GET['category'] ) ){

        if( !isset( $_GET['brand'] ) ){

            $select_query="SELECT * FROM `products` ORDER BY rand();";
            $result_query=mysqli_query($con, $select_query);

            while( $row=mysqli_fetch_assoc($result_query) ){

                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                echo " 
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Añadir al carrito</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ver más</a>                                
                            </div>
                        </div>
                    </div>
                ";
            }

        }
    }
}

// getting categories
function get_unique_categories(){
    global $con;

    // checking if the cateogry is set or not
    if( isset( $_GET['category'] ) ){

        $category_id=$_GET['category'];

        $select_query="SELECT * FROM `products` WHERE category_id=$category_id";
        $result_query=mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);

        if( $num_of_rows == 0 ){

            echo " <h2 class='text-center text-danger'> Existencias agotadas para esta categoría </h2> ";
        }

        while( $row=mysqli_fetch_assoc($result_query) ){

            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            echo " 
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Añadir al carrito</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ver más</a>                        </div>
                    </div>
                </div>
            ";
        }
    }  
}

// getting brands

function get_unique_brands(){
    global $con;

    // checking if the cateogry is set or not
    if( isset( $_GET['brand'] ) ){

        $brand_id=$_GET['brand'];

        $select_query="SELECT * FROM `products` WHERE brand_id=$brand_id";
        $result_query=mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);

        if( $num_of_rows == 0 ){

            echo " <h2 class='text-center text-danger'> Esta marca actualmente no está disponible </h2> ";
        }

        while( $row=mysqli_fetch_assoc($result_query) ){

            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            echo " 
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Añadir al carrito</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ver más</a>                        
                        </div>
                    </div>
                </div>
            ";
        }
    }  
}


// displaying the brands in the side nav
function getBrands(){

    global $con;
    $select_brands="SELECT * FROM `brands`";
    $result_brands=mysqli_query($con, $select_brands);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];

    while( $row_data=mysqli_fetch_assoc($result_brands) ){

        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];

        echo " <li class='nav-item'> <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a> </li>";
    }
}

// displaying the categories in the side nav
function getCategories(){

    global $con;
    $select_categories="SELECT * FROM `categories`";
    $result_categories=mysqli_query($con, $select_categories);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];

    while( $row_data=mysqli_fetch_assoc($result_categories) ){

        $category_title=$row_data['category_title'];
        $category_id=$row_data['category_id'];

        echo "<li class='nav-item'> <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a> </li>";
    }
}

// searching products function
function search_product(){

    global $con;
    if( isset($_GET['search_data_product']) ){

        $search_data_value=$_GET['search_data'];

        $search_query="SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%';";
        $result_query=mysqli_query($con, $search_query);

        $num_of_rows=mysqli_num_rows($result_query);

        if( $num_of_rows == 0 ){

            echo " 
                <h2 class='text-center text-danger'>
                No hay resultados para la búsqueda. No se encontró ningún producto 
                </h2> 
            ";
        }

        while( $row=mysqli_fetch_assoc($result_query) ){

            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            echo " 
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Añadir al carrito</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>Ver más</a>                        
                        </div>
                    </div>
                </div>
            ";
        }
    }
}

// view details function
function view_details(){
    global $con;

    if( isset($_GET['product_id']) ){

        // cheking if the categories and brands are set or not
        if( !isset( $_GET['category'] ) ){

            if( !isset( $_GET['brand'] ) ){
                $product_id=$_GET['product_id'];

                $select_query="SELECT * FROM `products` WHERE product_id=$product_id;";
                $result_query=mysqli_query($con, $select_query);

                while( $row=mysqli_fetch_assoc($result_query) ){

                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_image2=$row['product_image2'];
                    $product_image3=$row['product_image3'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $brand_id=$row['brand_id'];
                    echo " 
                        <div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Añadir al carrito</a>
                                    <a href='index.php' class='btn btn-secondary'>Página Principal</a>
                                </div>
                            </div>
                        </div>

                        <div class='col-md-8'>
                            <!-- related images -->

                            <div class='col-md-12'>
                                <h4 class='text-center text-info mb-5'>Productos relacionados</h4>
                            </div>
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>

                            </div>
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                                
                            </div>
                        </div>

                    ";
                }

            }
        }
    }
}

// get the user IP Address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// cart function
function cart(){

    if( isset( $_GET['add_to_cart'] ) ){

        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id;";

        $result_query=mysqli_query($con, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);

        if( $num_of_rows > 0){
            echo " <script> alert( 'Este artículo ya fue agregado al carrito ') </script> ";
            echo " <script> window.open('index.php', '_self') </script> ";
        }else{

            $insert_query="INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ( '$get_product_id', '$get_ip_add', 0);";
            $result_query=mysqli_query($con, $insert_query);
            echo " <script> alert( 'El artículo fue agragado al carrito') </script> ";
            echo " <script> window.open( 'index.php', '_self' ) </script> ";
        }
    } 
}
?>

