<?php
// require('Page/process.php');

// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn_submit"])) {
//     $name = htmlspecialchars($_POST["name"]);
//     $email = htmlspecialchars($_POST["email"]);
//     $password = htmlspecialchars($_POST["password"]);

//     // Create a new Process object and save data
//     $data = new Process($name, $email, $password);
//     $data->save();
//     echo "Data saved successfully!";
// }
?>

<!-- <!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section>
        <div id="form_data">
            <form action="" method="post">
                <div class="full_form">
                    <h2 class="text-center text-2xl mt-5 mb-5 font-bold">Form Data</h2>
                    <div id="input_label">
                        <label for="name">Name</label><br>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name" required><br>
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email" required><br>
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password" placeholder="Enter Password" required><br>
                    </div>
                    <div id="submit_btn">
                        <button type="submit" name="btn_submit" value="Submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section>
        <h2 class="text-center text-xl mt-5 mb-5 font-bold">Submitted Data</h2>
        <?php
        Process::display_process();
        ?>
    </section>
</body>
</html> -->



<?php
require('Page/process.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn_submit"])) {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    // Create a new Process object and save data
    $data = new Process($name, $email, $password);
    $data->save();
    echo "Data saved successfully!";
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section>
        <div id="form_data">
            <form action="" method="post">
                <div class="full_form">
                    <h2 class="text-center text-2xl mt-5 mb-5 font-bold">Form Data</h2>
                    <div id="input_label">
                        <label for="name">Name</label><br>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name" required><br>
                        <label for="email">Email</label><br>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email" required><br>
                        <label for="password">Password</label><br>
                        <input type="password" name="password" id="password" placeholder="Enter Password" required><br>
                    </div>
                    <div id="submit_btn">
                        <button type="submit" name="btn_submit" value="Submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section>
        <a href="display.php" class="btn btn-primary mt-5">View All Submitted Data</a>
    </section>
</body>
</html>
