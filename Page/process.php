<?php
// class Process {
//     private $name;
//     private $email;
//     private $password;

//     private static $file_path = "data.txt"; // Correct file extension

//     // Constructor to initialize properties
//     function __construct($name, $email, $password) {
//         $this->name = $name;
//         $this->email = $email;
//         $this->password = $password;
//     }

//     // Convert object data to CSV format
//     function csv() {
//         return "$this->name,$this->email,$this->password" . PHP_EOL;
//     }

//     // Save data to the file
//     function save() {
//         // Append data to the file
//         file_put_contents(self::$file_path, $this->csv(), FILE_APPEND);
//     }

//     // Display all saved data
//     public static function display_process() {
//         if (!file_exists(self::$file_path)) {
//             echo "No data available.";
//             return;
//         }

//         $processes = file(self::$file_path, FILE_IGNORE_NEW_LINES);
//         echo "<b>Name | Email</b><br/>";
//         foreach ($processes as $process) {
//             list($name, $email) = explode(",", $process);
//             echo "$name | $email<br/>";
//         }
//     }
// }
?>


<?php
class Process {
    private $name;
    private $email;
    private $password;

    private static $file_path = "data.txt"; // File to store data

    // Constructor to initialize properties
    function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    // Convert object data to CSV format
    function csv() {
        return "$this->name,$this->email,$this->password" . PHP_EOL;
    }

    // Save data to the file
    function save() {
        file_put_contents(self::$file_path, $this->csv(), FILE_APPEND);
    }

    // Display all saved data
    public static function display_process() {
        if (!file_exists(self::$file_path)) {
            echo "<p class='text-center'>No data available.</p>";
            return;
        }

        $processes = file(self::$file_path, FILE_IGNORE_NEW_LINES);
        echo "<table class='table-auto border-collapse border border-gray-300 mx-auto'>";
        echo "<thead><tr><th class='border border-gray-300 px-4 py-2'>Name</th><th class='border border-gray-300 px-4 py-2'>Email</th></tr></thead>";
        echo "<tbody>";
        foreach ($processes as $process) {
            list($name, $email) = explode(",", $process);
            echo "<tr><td class='border border-gray-300 px-4 py-2'>$name</td><td class='border border-gray-300 px-4 py-2'>$email</td></tr>";
        }
        echo "</tbody></table>";
    }
}
?>

