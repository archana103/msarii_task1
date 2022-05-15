<?php 
$id="";
$id=$_GET['id'];
$output="";

include_once 'connect.php';
$query = "SELECT * FROM phase where id='$id'";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $output .= $row['phase'];
                    }
                }
               
?>
<html>
    <head>
        <title>Phase editing</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>  
    <body>
        <div class="container">   
        <h3> <a href="index.php"><- home</a> </h3> 
            <div class="row content">
            
            </div>
            <br></br>
                <div class="col-sm-8 text-left">
                
                <form method="post" action="edit_phase.php">
                        <div class="row">
                            <label class="col-md-3 text-right">update Phase name:</label>
                            <div class="col-md-9">
                            <input readonly type="text" class="form-control" name="id" value="<?php echo $id?>">
                            <input type="text" class="form-control" name="upt_name" value="<?php echo $output?>">
                                 
                                
                            </div>
                            <br>
                            
                        </div>
                        <br />
                        <div align="center">
                            <input type="submit" name="saveit" class="btn btn-primary" value="submit" />
                        </div>
                </form>
               
            </div>
        </div>
    </body>  
</html>