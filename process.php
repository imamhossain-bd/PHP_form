<?php
    class Process{
        private $name;
        private $email;
        private $password;

        private static $file_path="data.text";

        function __construct($names, $emails, $passwords){
            $this->name = $names;
            $this->email = $emails;
            $this->password = $passwords;
        }

        public function propertyPass() {
            return $this->name.",". $this->email.",". $this->password.PHP_EOL;
        }
        

        public function save(){
            $processes= file(self::$file_path);
            file_put_contents(self::$file_path, $this->propertyPass(), FILE_APPEND);
        }


        public static function display_process() {
            $processes = file(self::$file_path);
        
            echo "
            <table style='margin-left: 37%; padding-bottom: 10; font-size: 1.25rem; border-collapse: collapse;'>
                <thead>
                    <tr>
                        <th style='border: 1px solid black; padding: 8px;'>Name</th>
                        <th style='border: 1px solid black; padding: 8px;'>Email</th>
                        <th style='border: 1px solid black; padding: 8px;'>Password</th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($processes as $process) {
                list($name, $email, $password) = explode(",", trim($process));
                echo "
                <tr>
                    <td style='border: 1px solid black; padding: 8px;'>$name</td>
                    <td style='border: 1px solid black; padding: 8px;'>$email</td>
                    <td style='border: 1px solid black; padding: 8px;'>$password</td>
                </tr>";
            }
            echo "
                </tbody>
            </table>";
        }
        
    }

?>




