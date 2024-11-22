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
        <div id="form_data" class="">
            <form action="process.php" method="post">
                <div class= "full_form">
                    <h2 class="text-center text-2xl mt-5 mb-5 font-bold">Form Data</h2>
                    <div id="input_label">
                        <label for="">Name</label><br>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name"><br>
                        <label for="">Email</label><br>
                        <input type="email" name="email" id="email" placeholder="Enter Your Name"><br>
                        <label for="">Password</label><br>
                        <input type="password" name="password" id="password" placeholder="Enter Password"><br>
                    </div>
                    <div id="submit_btn">
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php

    ?>
</body>
</html>