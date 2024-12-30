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
<body class="bg-gray-50 min-h-screen flex flex-col items-center">
    <header class="bg-blue-600 w-full text-white py-4 shadow-md">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">E-commerce Management</h1>
        </div>
    </header>
    <main class="container mx-auto p-6 flex flex-col gap-6">
        <!-- Management Sections -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Add Brand Section -->
            <section class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-blue-600 mb-4">Add Brand</h2>
                <form method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="block text-gray-700 font-medium">Brand Name</label>
                        <input type="text" name="name" id="name" class="w-full p-3 border rounded-lg focus:outline-blue-500">
                    </div>
                    <div>
                        <label for="address" class="block text-gray-700 font-medium">Address</label>
                        <input type="text" name="address" id="address" class="w-full p-3 border rounded-lg focus:outline-blue-500">
                    </div>
                    <div>
                        <label for="contact" class="block text-gray-700 font-medium">Contact</label>
                        <input type="text" name="contact" id="contact" class="w-full p-3 border rounded-lg focus:outline-blue-500">
                    </div>
                    <button name="submitBtn" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                        Add Brand
                    </button>
                </form>
            </section>

            <!-- Add Product Section -->
            <section class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-green-600 mb-4">Add Product</h2>
                <form method="POST" class="space-y-4">
                    <div>
                        <label for="aName" class="block text-gray-700 font-medium">Product Name</label>
                        <input type="text" name="aName" id="aName" class="w-full p-3 border rounded-lg focus:outline-green-500">
                    </div>
                    <div>
                        <label for="aPrice" class="block text-gray-700 font-medium">Price</label>
                        <input type="text" name="aPrice" id="aPrice" class="w-full p-3 border rounded-lg focus:outline-green-500">
                    </div>
                    <div>
                        <label for="productList" class="block text-gray-700 font-medium">Select Brand</label>
                        <select name="productList" id="productList" class="w-full p-3 border rounded-lg focus:outline-green-500">
                            <?php
                            $brands = $conn->query('SELECT * FROM addbrand');
                            while ($brand = $brands->fetch_assoc()) {
                                echo "<option value='{$brand['id']}'>{$brand['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button name="addBtn" class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600">
                        Add Product
                    </button>
                </form>
            </section>

            <!-- Delete Brand Section -->
            <section class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-red-600 mb-4">Delete Brand</h2>
                <form method="POST" class="space-y-4">
                    <div>
                        <label for="delBrand" class="block text-gray-700 font-medium">Select Brand</label>
                        <select name="delBrand" id="delBrand" class="w-full p-3 border rounded-lg focus:outline-red-500">
                            <?php
                            $brands = $conn->query('SELECT * FROM addbrand');
                            while ($brand = $brands->fetch_assoc()) {
                                echo "<option value='{$brand['id']}'>{$brand['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button name="delBtn" class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600">
                        Delete Brand
                    </button>
                </form>
            </section>
        </div>

        <!-- Product List Section -->
        <section class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Product List</h2>
            <?php
            $display = $conn->query("SELECT * FROM details");
            if ($display && $display->num_rows > 0) {
                echo "<table class='table-auto w-full text-left border-collapse border border-gray-300'>";
                echo "<thead>
                        <tr class='bg-gray-200'>
                            <th class='border border-gray-300 p-3'>Brand Name</th>
                            <th class='border border-gray-300 p-3'>Contact</th>
                            <th class='border border-gray-300 p-3'>Product Name</th>
                            <th class='border border-gray-300 p-3'>Price</th>
                        </tr>
                    </thead>";
                echo "<tbody>";
                while (list($bname, $contact, $iname, $price) = $display->fetch_row()) {
                    if ($price > 5000) {
                        echo "<tr>
                            <td class='border border-gray-300 p-3'>$bname</td>
                            <td class='border border-gray-300 p-3'>$contact</td>
                            <td class='border border-gray-300 p-3'>$iname</td>
                            <td class='border border-gray-300 p-3'>$price</td>
                        </tr>";
                    }
                }
                echo "</tbody></table>";
            } else {
                echo "<p class='text-red-500'>No records found in the Product List.</p>";
            }
            ?>
        </section>
    </main>
</body>
</html>


