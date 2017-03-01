<?php
$target_dir = "../files/";
echo file_put_contents("test.txt","Hello World. Testing!");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["filename"]) && isset($_POST["data"])){
        $target_file = $target_dir . basename($_POST["filename"]);
        file_put_contents($target_file, $_POST["data"]);
    }
}
?>


<?php
/*
$target_dir = "files/";
echo file_put_contents("test.txt","Hello World. Testing!");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["filename"]) && isset($_POST["data"])){
        $target_file = $target_dir . basename($_POST["filename"]);
        file_put_contents($target_file, $_POST["data"]);
    }
}
?>
*/

