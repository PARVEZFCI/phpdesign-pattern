<?php

class SingleTone {

    private static $instance;
    public static function getInstance(){
        if (null === self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct(){

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    public function store($data){

        $jsonString = json_encode($data);
        $fileName = 'data.json';
//        $createFile = file_put_contents($fileName,$jsonString);
       // $jsonString = json_encode($data);


        $file = fopen($fileName, 'w');

        if ($file) {
            // Step 4: Write the JSON string to the file

    $jsonString = file_get_contents($fileName);

    // Decode the JSON data into a PHP array
    $data = json_decode($jsonString, true);
print_r($data);
            // Step 5: Close the file
            fclose($file);
            echo "JSON data has been written to $fileName.";
        } else {
            echo "Unable to open the file for writing.";
        }

    }
}
$data = [
       'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'age' => 30
    ];
$object = SingleTone::getInstance();
$object->store($data);

