<?php
include('connect.php');
$output="";

 $query = "SELECT phase.phase,class.class_symbol 
 FROM phase
 LEFT JOIN class ON phase.id = class.phase GROUP BY class.class_symbol ORDER BY phase.phase";
// $query="SELECT * FROM phase ORDER BY id ASC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
        foreach($result as $row)
        {
            $output .= '<tr>
            <td>'.$row["phase"].'</td>
            <td>'.$row["class_symbol"].'</td>
               </tr>';
        }
    
                  
     
?>
<html>
    <head>
        <title>Data passing</title>  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="../Jquery/javascript.js">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"crossorigin="anonymous">
</script>

<script src="jquery.js"></script>

</head>  
    <body>
        <div class="container" style="border:1px black dotted">
        <table id="table">
                      
                      <tr>
                        <?php
                        echo $output;
                        
                        ?>
                        <tr>
                    </table>
        </div>
</body>
</html>
<script>
 $('#myTable').margetable({
  type: 1,
  colindex: [{
    index: 1, 
    dependent: [0]
  }]
});


    </script>