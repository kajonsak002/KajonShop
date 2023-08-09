<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link
    href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css"
    rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php
include "conDB.php";
$ids=$_GET['id'];
$sql="DELETE FROM product WHERE id = '$ids' ";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('ทำการลบข้อมูลเรียบร้อย');</script>" ;
    echo "<script>window.location='Admin.php';</script>" ;
} else {
    echo "Error :" .$sql . "<br>" . mysqli_error($conn);
    echo "<script>alert('ทำการลบข้อมูลไม่สำเร็จ')</script>";
}
mysqli_close($conn);

?>
</body>
</html>
