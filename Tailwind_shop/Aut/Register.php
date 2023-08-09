<?php
    session_start();
    include "../CRUD/conDB.php";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Check if the username already exists
        $checkQuery = "SELECT * FROM member WHERE Username = '$username'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            	echo "<script>alert('ชื่อผู้ใช้นี้ถูกใช้ไปเเล้ว กรุณาใช้ชื่ออื่น');</script>";
                echo "<script>window.location='../index.php';</script>";
        } else {
            // Insert new user into the database
            $insertQuery = "INSERT INTO member (Username, Password) VALUES ('$username', '$password')";
            $insertResult = mysqli_query($conn, $insertQuery);

            if ($insertResult) {
            	echo "<script>alert('สมัครสมาชิกสำเร็จ');</script>";
                echo "<script>window.location='../index.php';</script>";
            } else {
            	echo "<script>alert('สมัครสมาชิกไม่สำเร็จ');</script>";
                echo "<script>window.location='../index.php';</script>";
            }
        }

        mysqli_close($conn);
    }
?>
