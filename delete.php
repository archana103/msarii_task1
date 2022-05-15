<?php
include("connect.php");
echo $a=$_REQUEST['id'];
 $query="delete from phase where id=$a";

        $statement = $connect->prepare($query);
            $statement->execute();
            header('Location:index.php')
?>
