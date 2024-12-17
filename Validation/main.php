<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Open Sans', sans-serif;
    }
    
    body {
        min-height: 120vh;
        padding: 0 10px;
        background: #d1d1d1;
        padding-top: 10%;
    }

    #form_data{
        background-color: rgb(255, 255, 255);
        margin-left: 20%;
        width: 100%;
        max-width: 500px;
        box-shadow: 6px 6px 15px rgb(170,170,170);
        padding: 25px;
        border-radius: 10px;
        float: left;
    }
    #input_label label{
        font-size: 21px;
        font-weight: 500;
    }
    #input_label input{
        width: 100%;
        padding: 10px;
        border: 2px solid #8b8b8b;
        outline: none;
        border-radius: 6px;
        margin-top: 10px;
        margin-bottom: 7px;
    }

    #submit_btn{
        width: 100%;
        padding: 10px;
        background-color: #bb00bbc7;
        color: #fff;
        margin-top: 20px;
        border-radius: 7px;
        font-size: 21px;
        text-align: center;
        border: none;
    }
</style>
<body>
<section>
        <div id="form_data">
            <form action="" method="post"  enctype="multipart/form-data">
                <div class="full_form">
                    <h2 class="text-center text-2xl mt-5 mb-5 font-bold">Form Data</h2>
                    <div id="input_label">
                        <!-- <label for="">Name</label><br>
                        <input type="text" name="name" id="name" placeholder='Enter Your Name' require><br>
                        <label for="email">Email</label><br>
                        <input type="text" name="inputEmail" id="email" placeholder="Enter Your Email" required><br>
                        <label for="password">Password</label><br>
                        <input type="password" name="inputPassword" id="password" placeholder="Enter Password" required><br> -->
                        <label for="image">Image</label><br>
                        <input type="file" name="imgFile" id="image" required><br>
                        <button type="submit" name="imgUpload" class="px-3 py-2 border-2  rounded-lg">Upload</button>
                    </div>
                    <div id="submit_btn">
                        <button   type="submit" name="btnSubmit" value="Submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php
        if(isset($_POST['imgUpload'])){
            $fileName = $_FILES['imgFile']['name'];
            $tempFile = $_FILES['imgFile']['tmp_name'];
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileSize = $_FILES['imgFile']['size'];
            $img = "Pages/img/images";
            $kb = $fileSize/1024;


            if($kb > 100 || !in_array($fileType, ["jpg", "png", "jpeg", "gif"])){
               if($kb > 100){
                    echo "Image is too large. Your image must be a maximum of 100 KB. ";
               }
               if(!in_array($fileType, ["jpg", "png", "jpeg", "gif"])){
                    echo "Also Sorry, only jpg, png, jpeg, or gif formats are allowed!";
               }
            }
            else{
                move_uploaded_file($tempFile, $img.$fileName);
                echo "Successfully";
            }
        }
    ?>

<?php
    if(isset($_POST['imgUpload'])){
        echo "<img src='$img$fileName' style = 'width:300px; margin-left: 60%;'>";
    }
?>

    <?php
    // if(isset($_POST['btnSubmit'])){
    //     $email = $_POST['inputEmail'];
    //     $password = $_POST['inputPassword'];
        
    //     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //         echo "<p style='color:red;'>Please enter a valid email address.</p>";
    //     }
    //     else{
    //         echo "<p style='color:green;'>Email is valid.</p>";
    //     };

    //     if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)){
    //         echo "<p class='text-red-500 text-center mt-10 text-xl font-semibold'>
    //         Password must be at least 8 characters long and include one uppercase letter, one lowercase letter, and one number.
    //         </p>";
    //     }
    //     else{
    //         echo "Your Password Is Valid";
    //     }
    // }
?>

<?php
    require('Pages/Process.php');
    if (isset($_POST["btn_submit"])) {
        $name = $_POST["inputName"];
        $email = $_POST["inputEmail"];
        $password = $_POST["inputPassword"];

        // Save data
        $process = new Process($name, $email, $password);
        $process->save();

        // Redirect to display.php
        header('Location: display.php');
        exit;
    }
    ?>
</body>
</html>