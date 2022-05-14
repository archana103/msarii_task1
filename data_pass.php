<?php
include('connect.php');
$error = '';
$output = '';
$_GET['id'];
$query = "SELECT * FROM class ORDER BY id ASC";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $output .= '<tr>
                        <td>'.$row["id"].'</td>
                            <td>'.$row["class_name"].'</td>
                            <td>'.$row["class_symbol"].'</td>
                          
                            </tr>';
                    }
                }
                else
                {
                    $output .= '
                        <tr>
                            <td colspan="2">No Data Found</td>
                        </tr>
                    ';
                }
?>
<html>
    <head>
        <title>Data passing</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function(){
        var row='<tr><td><input type="text" name="class[]" class="form-control mb-2 mr-sm-2" placeholder="Enter how many class you have to add."></td><td><input type="text" name="symbol[]" class="form-control"></td><td><button type="button" class="btn btn-primary mb-2" id="delete">Delete</button></td></tr>';
   
        $("#add").click(function(){
           $("#tableupdate").append(row);
        });
        $("#tableupdate").on('click', '#delete', function () {
            $(this).closest('tr').remove();
            });
            });
</script>
    </head>  
    <body>
      
        <div class="container">  
        <h1>You have selected:<span style="color:red"> <?php echo $_GET['phase'];?></span></h1> 
     
        <a href="academic.php" class="btn btn-success">acdemic</a> 
        <a href="backup.php" class="btn btn-success">all data</a>
        <form method ="post" action="class_store.php">
                <table class="table table-hover" id="tableupdate">
                <thead>
                    <tr>
                       <th>Add class</th>
                       <th>Add symbol</th>
                        <th>Action</th>
                    </tr>
                </thead>
                        <tbody>
                            <tr>
                            <td>
                                <input type="hidden" name="phase_id" value="<?php echo $_GET['id'] ?>">
                                <input type="hidden" name="phase" value="<?php echo $_GET['phase'] ?>">
                        <input type="text" name="class[]" class="form-control mb-2 mr-sm-2" placeholder="Enter how many class you have to add."></td>
                            <td><input type="text" name="symbol[]" class="form-control"></td>
                            <td><button type="button" class="btn btn-primary mb-2" name="add" id="add">Add</button>
                            </td>
                        </tr>
                        </tbody>
                </table>
                <input type="submit" name="save" class="btn btn-danger" value="Submit" />
                <!-- <button type="submit" class="btn btn-danger" name="submit" name="save">Submit</button> -->
</form>
<table class="table table-striped table-bordered">
                        <tr>
                            <td>Id</td>
                            <td>class</td>
                            <td>symbol</td>
                          
                        </tr>
                      
                        <?php
                        echo $output;
                        ?>
                    </table>
    </body>  
</html>
