<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ecommerce";

$conn = new mysqli($servername, $username, $password, $database);

if (isset($_POST['submitBtn'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $conn->query("CALL brandAdd('$name', '$address', '$contact')");
}

if (isset($_POST['addBtn'])) {
    $name = $_POST['aName'];
    $price = $_POST['aPrice'];
    $brand_id = $_POST['productList'];

    if (!empty($name) && !empty($price) && !empty($brand_id)) {
        $conn->query("CALL productInsert('$name', '$price', '$brand_id')");
    } else {
        echo "<p class='text-red-500'>Please fill in all the fields to add a product.</p>";
    }
}

if (isset($_POST['delBtn'])) {
    $brand_id = $_POST['delBrand'];
    $conn->query("DELETE FROM addbrand WHERE id = '$brand_id'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center">E-commerce Management</h1>

        <!-- Flex Container -->
        <div class="flex flex-wrap gap-6 justify-center">

            <!-- Add Brand Section -->
            <section class="bg-white p-6 shadow-md rounded-md w-full md:w-1/3">
                <h2 class="text-xl font-bold mb-4">Add Brand</h2>
                <form method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="block text-gray-700">Name</label>
                        <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="address" class="block text-gray-700">Address</label>
                        <input type="text" name="address" id="address" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="contact" class="block text-gray-700">Contact</label>
                        <input type="text" name="contact" id="contact" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <button name="submitBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 w-full">Submit</button>
                </form>
            </section>

            <!-- Add Product Section -->
            <section class="bg-white p-6 shadow-md rounded-md w-full md:w-1/3">
                <h2 class="text-xl font-bold mb-4">Add Product</h2>
                <form method="POST" class="space-y-4">
                    <div>
                        <label for="aName" class="block text-gray-700">Product Name</label>
                        <input type="text" name="aName" id="aName" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="aPrice" class="block text-gray-700">Price</label>
                        <input type="text" name="aPrice" id="aPrice" class="w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="productList" class="block text-gray-700">Brand</label>
                        <select name="productList" id="productList" class="w-full p-2 border border-gray-300 rounded-md">
                            <?php
                            $brands = $conn->query('SELECT * FROM addbrand');
                            while ($brand = $brands->fetch_assoc()) {
                                echo "<option value='{$brand['id']}'>{$brand['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button name="addBtn" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 w-full">Add Product</button>
                </form>
            </section>

            <!-- Delete Brand Section -->
            <section class="bg-white p-6 shadow-md rounded-md w-full md:w-1/3">
                <h2 class="text-xl font-bold mb-4">Delete Brand</h2>
                <form method="POST" class="space-y-4">
                    <div>
                        <label for="delBrand" class="block text-gray-700">Select Brand</label>
                        <select name="delBrand" id="delBrand" class="w-full p-2 border border-gray-300 rounded-md">
                            <?php
                            $brands = $conn->query('SELECT * FROM addbrand');
                            while ($brand = $brands->fetch_assoc()) {
                                echo "<option value='{$brand['id']}'>{$brand['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button name="delBtn" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 w-full">Delete</button>
                </form>
            </section>
        </div>

        <!-- Product List Section -->
        <section class="bg-white p-6 shadow-md rounded-md mt-6">
            <h2 class="text-xl font-bold mb-4">Product List</h2>
            <?php
                $display = $conn->query("SELECT * FROM details");
                
                if ($display && $display->num_rows > 0) {
                    echo "<table class='table-auto w-full text-left border-collapse border border-gray-300'>";
                    echo "<thead>
                            <tr class='bg-gray-200'>
                                <th class='border border-gray-300 p-2'>Brand Name</th>
                                <th class='border border-gray-300 p-2'>Contact</th>
                                <th class='border border-gray-300 p-2'>Product Name</th>
                                <th class='border border-gray-300 p-2'>Price</th>
                            </tr>
                        </thead>";
                    echo "<tbody>";

                    while (list($bname, $contact, $iname, $price) = $display->fetch_row()) {
                        echo "<tr>
                                <td class='border border-gray-300 p-2'>" . htmlspecialchars($bname) . "</td>
                                <td class='border border-gray-300 p-2'>" . htmlspecialchars($contact) . "</td>
                                <td class='border border-gray-300 p-2'>" . htmlspecialchars($iname) . "</td>
                                <td class='border border-gray-300 p-2'>" . htmlspecialchars($price) . "</td>
                            </tr>";
                    }

                    echo "</tbody></table>";
                } else {
                    echo "<p class='text-red-500'>No records found in the Product List.</p>";
                }
            ?>
        </section>
    </div>
</body>
</html>

