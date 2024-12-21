<?php
$conn = new mysqli("localhost", "root", "", "economics");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Add Product form submission
if (isset($_POST["addBtn"])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    // Execute the stored procedure for adding a product
    $conn->query("CALL brandadd('$name', '$address', '$contact')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mt-6 mx-auto p-6">
  <!-- Flex Container for Forms -->
  <div class="flex flex-wrap gap-6">
    <!-- Add Product Form -->
    <div class="flex-1 bg-white p-6 rounded-lg shadow-md">
      <h2 class="text-2xl font-bold text-center mb-4">Add Product</h2>
      <form method="POST" class="space-y-4">
        <!-- Name -->
        <div>
          <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
          <input type="text" id="name" name="name" placeholder="Enter name" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500" required />
        </div>

        <!-- Address -->
        <div>
          <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
          <input type="text" id="address" name="address" placeholder="Enter address" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500" required />
        </div>

        <!-- Contact -->
        <div>
          <label for="contact" class="block text-gray-700 font-medium mb-2">Contact</label>
          <input type="text" id="contact" name="contact" placeholder="Enter contact" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500" required />
        </div>

        <!-- Submit Button -->
        <div>
          <button name="addBtn" type="submit" class="w-full bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600">
            Add Product
          </button>
        </div>
      </form>
    </div>

    <!-- Insert Product Form -->
    <div class="flex-1 bg-white p-6 rounded-lg shadow-md">
  <h2 class="text-2xl text-center font-bold mb-4">Insert Product</h2>
  <form method="POST" class="space-y-4">
    <!-- Name -->
    <div>
      <label for="insert_name" class="block text-gray-700 font-medium mb-2">Name</label>
      <input 
        type="text" 
        id="insert_name" 
        name="insert_name" 
        placeholder="Enter name" 
        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
        required />
    </div>

    <!-- Price -->
    <div>
      <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
      <input 
        type="number" 
        id="price" 
        name="price" 
        placeholder="Enter price" 
        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
        required />
    </div>

    <!-- Add Brand ID -->
    <div>
      <label for="addbrand_id" class="block text-gray-700 font-medium mb-2">Product List</label>
      <select 
        name="addbrand_id" 
        id="addbrand_id" 
        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" 
        required>
        <?php
        // Fetch brand list from the database
        $productList = $conn->query('SELECT id, name FROM brand');
        while (list($id, $name) = $productList->fetch_row()) {
          echo "<option value='$id'>$name</option>";
        }
        ?>
      </select>
      
    </div>
     
  </form>
</div>

  </div>
</div>
</body>
</html>
