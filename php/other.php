<?php
//error_reporting(E_ALL); 
//ini_set('display_errors', 1);
$target_dir = "../files/other/";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["filename"]) && isset($_POST["data"])){
        $target_file = $target_dir . basename($_POST["filename"]) . ".txt";
        file_put_contents($target_file, $_POST["data"]);
    }
}
elseif($_SERVER["REQUEST_METHOD"] == "GET"){
    if($_GET["opt"] == 0){
        $dircontents = scandir($target_dir);
        $documents = [];
        foreach ($dircontents as $file) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if ($extension == 'txt') {
                $documents[] = explode('.', $file)[0];
            }
        }
        echo json_encode($documents, JSON_PRETTY_PRINT);
    }
    elseif($_GET["opt"] == 1 && isset($_GET["filename"])){
        $content[] = file_get_contents($target_dir . $_GET["filename"] . ".txt");
        echo json_encode($content, JSON_PRETTY_PRINT);
    }
}
?>