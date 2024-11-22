<?php
require('Page/process.php');
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section>
        <h2 class="text-center text-xl mt-5 mb-5 font-bold">Submitted Data</h2>
        <div class="data-table">
            <?php
            Process::display_process();
            ?>
        </div>
        <div class="text-center mt-5">
            <a href="main.php" class="btn btn-secondary">Go Back to Form</a>
        </div>
    </section>
</body>
</html>
