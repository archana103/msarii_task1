<?php
include('connect.php');
if(isset($_POST['save'])){
$phase=$_POST['phase'];
foreach($phase as $phases=>$key){
  
    $value=$phase[$phases];
    $query = "INSERT INTO phase (phase)  VALUES ('$value')";

    $statement = $connect->prepare($query);

    $statement->execute();
    header('Location: index.php?error=Data entered successfully.');
}
}
?>