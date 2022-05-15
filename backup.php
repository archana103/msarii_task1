<?php
include('connect.php');
$output="";


?>
<html>
    <head>
        <title>Data passing</title>  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<style>

    #cl_sy{
        margin-right: 10px;
    }
    .center {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}
#phase{
    margin: 40px 0px 75px 0px;
}
</style>
</head>  
    <body>
    
        <div class="container" style="border:1px black dotted">
        <h1>All Phases</h1>
        <a href="index.php" class="btn btn-danger">Home</a> 
        <table id="table" class="center">
                    <?php
                    $query = "SELECT * FROM phase ORDER BY id ASC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                            foreach($result as $row)
                            {
                    ?>     
                                <tr style="border:1px black dotted">
                               
                                <?php
                                $phase_id=$row['id'];
                                echo $phase_name='<br><span style="color:blue" id="phase">Phase name - '.$row['phase'].'</span><br>';
                                ?>
                                </tr>
                                <tr style="border:1px black dotted">
                                    <?php
                                $query1 = "SELECT class_symbol FROM class where phase='$phase_id'";
                                $statement1 = $connect->prepare($query1);
                                $statement1->execute();  
                                $result1 = $statement1->fetchAll();
                                    foreach($result1 as $row1){
                                        echo '<span id="cl_sy" class="btn btn-success">'.$row1['class_symbol'].'</span>';
                                        
                                    }
        ?>

                    </tr>
                               
<?php }?>
                    </table>
        </div>
</body>
</html>
