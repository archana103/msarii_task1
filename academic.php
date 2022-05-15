<?php
include('connect.php');

$error = '';
$output = '';


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
                        <td>'.$row["class_symbol"].'</td>
                        <form method="post" action="image_upload.php" enctype="multipart/form-data">
                        <td><input type="file" name="file" />
                        <input style="visibility:hidden;" type="text" id="id" name="id" value="'.$row["id"].'">
                        </td>
                        <td><button type="submit" name="upload">upload</button></td>
                        </form>
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
    </head>  
    <body>
        <div class="container">  
           <h3><a href="index.php" class="btn btn-success">Home</a></h3>
            <div class="row content">
            <div class="col-sm-8 text-left">
                <br>
                <br>
                <?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo "<script>alert('$error');</script>";
                }?>

                  <table class="table table-striped table-bordered">
                        <tr>
                        <td>id</td>
                            <td>class</td>
                            <td>file</td>
                            <td>action</td>
                        </tr>
                      
                        <?php
                        echo $output;
                        ?>
                    </table>
            </div>
            </div>
            </div>
            </body>
            </html>

