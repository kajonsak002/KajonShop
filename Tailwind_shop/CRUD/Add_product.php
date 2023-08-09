<?php
    include "conDB.php";
    $p_name = isset($_POST['name']) ? $_POST['name'] : '';
    $p_img = isset($_POST['image']) ? $_POST['image'] : '';
    $p_detail = isset($_POST['description']) ? $_POST['description'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';



    $sql="INSERT INTO product(name,image,description,price) VALUES('$p_name','$p_img','$p_detail','$price')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>" ;
        echo "<script>window.location='Admin.php';</script>" ;
    } else {
        echo "<script>alert('เพิ่มข้อมูลไม่สำเร็จ');</script>" ;
        
    }
    mysqli_close($conn);
?>