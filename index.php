<?php
include('connect.php');
$error = '';
$output = '';

$query = "SELECT * FROM phase ORDER BY id ASC";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $output .= '<tr>
                        <td>'.$row["id"].'</td>
                            <td><a href="data_pass.php?id='.$row["id"].'&phase='.$row["phase"].'">'.$row["phase"].'</a></td>
                            <td><a href="edit.php?id='.$row["id"].'">Edit</a><a href="delete.php?id='.$row["id"].'"> Delete</a></td>
                       
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
        var row='<tr><td><input type="text" name="phase[]" class="form-control mb-2 mr-sm-2" placeholder="Enter how many phase you have to add."></td><td><button type="button" class="btn btn-primary mb-2" id="delete">Delete</button></td></tr>';
   
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

        <div align="center"><?php echo $error; ?></div>
            <form method ="post" action="phase_store.php">
                <table class="table table-hover" id="tableupdate">
                <thead>
                    <tr>
                       <th>Add Phase</th>
                        <th>Action</th>
                    </tr>
                </thead>
                        <tbody>
                            <tr>
                            <td><input type="text" name="phase[]" class="form-control mb-2 mr-sm-2" placeholder="Enter how many phase you have to add."></td>
                            <td><button type="button" class="btn btn-primary mb-2" name="add" id="add">Add</button>
                            </td>
                        </tr>
                        </tbody>
                </table>
                <input type="submit" name="save" class="btn btn-danger" value="Submit" />
                <!-- <button type="submit" class="btn btn-danger" name="submit" name="save">Submit</button> -->
</form>
<a href="academic.php" class="btn btn-success">acdemic</a>
<table class="table table-striped table-bordered">
                        <tr>
                            <td>Id</td>
                            <td>Phase</td>  <td>action</td>
                        </tr>
                      
                        <?php
                        echo $output;
                        ?>
                    </table>

            </div>
</body>
</html>