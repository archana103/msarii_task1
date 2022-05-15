<?php
include('connect.php');
$phase_id=$_POST['phase_id'];
$phase_name=$_POST['phase'];
$class=$_POST['class'];
$symbol=$_POST['symbol'];
print_r($array=array_combine($class,$symbol));
foreach($array as $Key=>$value){
    $query = "INSERT INTO class (class_name,class_symbol,phase)  VALUES ('$Key','$value',$phase_id)";

    $statement = $connect->prepare($query);

    $statement->execute();
    header('Location: data_pass.php?id='.$phase_id.'&phase='.$phase_name);
}
?>