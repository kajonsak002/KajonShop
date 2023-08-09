<?php
	session_start();
	if(empty($_SESSION['UserID']))
	{
		echo "Please Login!";
		exit();
	}

	if($_SESSION['Status'] != "ADMIN")
	{
		echo "This page is for Admin only!";
		exit();
	}	
	
	include "conDB.php";
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysqli_query($conn, $strSQL);
	$objResult = mysqli_fetch_array($objQuery);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
  </head>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.css"
    rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/flowbite.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <body>
    <div class="container mx-auto">
      <h1 class="text-xl text-red-600 text-center mt-5 font-bold">
        Welcome to Admin Page!
      </h1>
      <table class="text-sm text-left text-gray-500 dark:text-gray-400">
        <tbody>
          <tr>
            <td scope="col " class="text-black">Username :</td>
            <td scope="col"><?php echo $objResult["Username"];?></td>
          </tr>
          <tr>
            <td scope="col" class="text-black">Name :</td>
            <td scope="col"><?php echo $objResult["Name"];?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="container mx-auto mt-5">
      <a
        href="Edit_User.php"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
        >Edit User</a
      >
      <a
        href="../Aut/logout.php"
        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
        >Logout</a
      >
    </div>

    <div class="container flex flex-row mx-auto mt-10">
      <button
        data-modal-target="AddProduct"
        data-modal-toggle="AddProduct"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        เพิ่มสินค้า
      </button>
    </div>

    <!-- Form Add Product -->
    <form method="post" action="Add_product.php">
      <div
        id="AddProduct"
        tabindex="-1"
        aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div
              class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
              <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                เพิ่มสินค้า
              </h3>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
              <form>
                <div class="mb-6">
                  <label
                    for="text"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >ชื่อสินค้า</label
                  >
                  <input
                    type="text"
                    id="name"
                    name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="ชื่อสินค้า"
                    required />
                </div>
                <div class="mb-6">
                  <label
                    for="text"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >รายละเอียดสินค้า</label
                  >
                  <input
                    type="text"
                    id="description"
                    name="description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="รายละเอียดสินค้า..."
                    required />
                </div>
                <div class="mb-6">
                  <label
                    for="text"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >ราคาสินค้า</label
                  >
                  <input
                    type="number"
                    id="price"
                    name="price"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="ราคาสินค้า..."
                    required />
                </div>
                <div class="mb-6">
                  <label
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    for="user_avatar"
                    >เลือกรูปสินค้า</label
                  >
                  <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help"
                    id="image"
                    name="image"
                    type="file" />
                </div>
                <input
                  value="ยืนยัน"
                  type="Submit"
                  class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" />
                <button
                  data-modal-hide="LoginModal"
                  type="Close"
                  class="mt-3 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Close
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- Form Add product -->

    <!-- Show product -->
    <div class="container mx-auto">
      <div class="mt-10 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table
          class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead
            class="text-lg text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">ID</th>
              <th scope="col" class="px-6 py-3">ชื่อสินค้า</th>
              <th scope="col" class="px-6 py-3">รูปภาพ</th>
              <th scope="col" class="px-6 py-3">รายละเอียดสินค้า</th>
              <th scope="col" class="px-6 py-3">ราคา</th>
              <th scope="col" class="px-6 py-3">แก้ไข</th>
              <th scope="col" class="px-6 py-3">ลบ</th>
            </tr>
          </thead>
          <?php
    include "conDB.php";
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
    ?>
          <tbody>
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
              <th
                scope="row"
                class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                <?php echo $row['id']; ?>
              </th>
              <td class="text-gray-900 px-6 py-4">
                <?php echo $row['name']; ?>
              </td>
              <td class="text-gray-900 px-6 py-4">
                <img
                  class="mx-auto w-20"
                  src="<?php echo $row['image']; ?>"
                  alt="" />
              </td>
              <td class="text-gray-900 px-6 py-4">
                <?php echo $row['description']; ?>
              </td>
              <td class="text-gray-900 px-6 py-4">
                <?php echo $row['price']; ?>
              </td>
              <td class="px-6 py-4">
                <a
                  href="Edit_product.php?id=<?= $row['id']; ?>"
                  class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                  >Edit</a
                >
              </td>
              <td class="px-6 py-4">
                <a
                  href="Del_product.php?id=<?= $row['id']; ?> "
                  onclick="Del(this.href);return false;"
                  class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                  >Delete</a
                >
              </td>
            </tr>
          </tbody>
          <?php
    }
    mysqli_close($conn); //ปิดการเชื่อมต่อฐานข้อมูล
    ?>
        </table>
      </div>
    </div>
    <!-- End Show product -->

    <script language="JavaScript">
      function Del(mypage) {
        var agree = confirm("คุณต้องการที่จะลบข้อมูลใช่หรือไม่");

        if (agree) {
          window.location = mypage;
        }
      }

      // Alert section

      var alertPlaceholder = document.querySelector("#alertPlaceholder");
      var alertBtn = document.querySelector("#alertBtn");

      const alert = (message, type) => {
        const wrapper = document.createElement("div");
        wrapper.innerHTML = ``;

        alertPlaceholder.append(wrapper);
      };

      if (alertBtn) {
        alertBtn.addEventListener("click", () => {
          alert("Nice , you trigger this alrt message!!", "primary");
        });
      }

      console.log(alertPlaceholder);
      console.log(alertBtn);
    </script>
  </body>
</html>
