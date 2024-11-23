

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
                        <input type="text" name="inputName" id="name" placeholder="Enter Your Name" required><br>
                        <label for="email">Email</label><br>
                        <input type="email" name="inputEmail" id="email" placeholder="Enter Your Email" required><br>
                        <label for="password">Password</label><br>
                        <input type="password" name="inputPassword" id="password" placeholder="Enter Password" required><br>
                    </div>
                    <div id="submit_btn">
                        <button type="submit" name="btn_submit" value="Submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <section>
        <h2 class="ml-[57%] text-xl mt-5 mb-5 font-bold">Submitted Data</h2>
        <?php
                require('Page/process.php');
                if(  isset($_POST["btn_submit"])){
                    $name= ($_POST["inputName"]);
                    $email = ($_POST["inputEmail"]);
                    $password = ($_POST["inputPassword"]);
            
                        $process = new Process($name, $email, $password);
                        $process->save();
                        echo "<div class='ml-[44%]'>Data saved successfully!</div>";
                }
        ?>
        <?php
        Process::display_process();
        ?>
    </section>
</body>
</html>

