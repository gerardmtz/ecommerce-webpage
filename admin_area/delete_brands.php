<!-- 21/04/93 Video 71-->

<?php 

if(isset($_GET['delete_brands'])){
    $delete_brands=$_GET['delete_brands'];
    //echo $delete_category

    $delete_query="Delete from 'brands' where 
    brand_id=$delete_query";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('La marca se ha eliminado correctamente')</script>";
        echo "<script>window.open('./index.php?wiew_brands','_self')</script>";
    }
}
