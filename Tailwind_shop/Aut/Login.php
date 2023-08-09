<?php
	session_start();
    include "../CRUD/conDB.php";

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$strSQL = "SELECT * FROM member WHERE Username = '$username' AND Password = '$password'";
	$objQuery = mysqli_query($conn, $strSQL);
	$objResult = mysqli_fetch_array($objQuery);

	if(!$objResult)
	{
		echo "<script>alert('Username and Password Incorrect!');</script>";
        echo "<script>window.location='../index.php';</script>";
	}
	else
	{
		$_SESSION["UserID"] = $objResult["UserID"];
		$_SESSION["Status"] = $objResult["Status"];
		session_write_close();
			
		if($objResult["Status"] == "ADMIN")
		{
			header("location:../CRUD/Admin.php");
		}
		else
		{   
            echo "<script>alert('เข้าสู่ระบบสำเร็จ');</script>";
			header("location:../index.php");
		}
	}
	mysqli_close($conn);
?>
