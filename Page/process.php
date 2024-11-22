<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .submitted-data {
            max-width: 400px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="submitted-data">
        <h2>Submitted Data</h2>
        <?php
        // Check if form data is submitted via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']); // Normally, never display raw passwords.

            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Password:</strong> $password</p>"; // For display purposes only.
        } 
        else {
            echo "<p>No data submitted.</p>";
        }
        ?>
    </div>
</body>
</html>
