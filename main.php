<?php
require('Process.php');
$error = []; // Array to store error messages

if (isset($_POST["btn_submit"])) {
    $name = trim($_POST["inputName"]);
    $email = trim($_POST["inputEmail"]);
    $password = $_POST["inputPassword"];

    // Email Validation
    if (empty($email)) {
        $error[] = "Email is required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Invalid email format!";
    }

    // Password Validation
    if (empty($password)) {
        $error[] = "Password is required!";
    } elseif (strlen($password) < 6) {
        $error[] = "Password must be at least 6 characters long!";
    }

    // If no errors, save the data
    if (empty($error)) {
        $process = new Process($name, $email, $password);
        $process->save();

        // Redirect to display.php after saving
        header('Location: display.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section>
        <div id="form_data" class="max-w-md mx-auto mt-36">
            <form action="" method="post">
                <div class="full_form bg-white p-6 rounded-lg shadow-2xl">
                    <h2 class="text-center text-2xl mb-5 font-bold">Form Data</h2>

                    <!-- Display Error Messages -->
                    <?php if (!empty($error)): ?>
                        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                            <?php foreach ($error as $err): ?>
                                <p><?php echo htmlspecialchars($err); ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Input Fields -->
                    <div id="input_label" class="mb-4">
                        <label for="name" class="block mb-1 font-semibold">Name</label>
                        <input type="text" name="inputName" id="name" placeholder="Enter Your Name" class="w-full p-2 border rounded" required>

                        <label for="email" class="block mt-4 mb-1 font-semibold">Email</label>
                        <input type="text" name="inputEmail" id="email" placeholder="Enter Your Email" class="w-full p-2 border rounded" required>

                        <label for="password" class="block mt-4 mb-1 font-semibold">Password</label>
                        <input type="password" name="inputPassword" id="password" placeholder="Enter Password" class="w-full p-2 border rounded" required>
                    </div>

                    <!-- Submit Button -->
                    <div id="submit_btn" class="mt-6">
                        <button type="submit" name="btn_submit" value="Submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
