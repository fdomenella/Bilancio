<?php

include_once("db.php");
include_once("funzioni.php");

// SELECT *, DATE_FORMAT(FROM_UNIXTIME(`data`), '%d-%m-%Y') AS 'date_formatted' FROM `uscite` 


$anno = date("Y");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Francesco Domenella">

    <title>Bilancio - Report - Budget</title>
<script src="./vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="./vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Bilancio</a>
            </div>
            <!-- /.navbar-header -->
            
            
            <!-- /.navbar-top-links -->

            <?php echo layouts_navigation(); ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Report - Budget <?php echo $anno; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                 	<table  class="table table-striped table-bordered table-hover" id="example" >
        <thead>
            <tr>
                <th>Categoria</th>
                <th>Preventivato</th>
                <th>Consuntivato</th>
                <th>Media/mese</th>
                <th>speso mese/mese</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Categoria</th>
                <th>Preventivato</th>
                <th>Consuntivato</th>
                <th>Media/mese</th>
                <th>speso mese/mese</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <?php
                
             
              
               
               
                $query = "SELECT * FROM budget RIGHT JOIN categoria ON categoria.id = budget.id_cat  ";
                
                 $result = $db->query($query);
               $totale_anno="";
               $totale_mese="";
                while($row=mysqli_fetch_array($result)){
                    if($row['anno']==$anno OR is_null($row['anno'])){
                        echo '<tr>';
                        echo '<td>';
                        echo $row['nome'];
                        echo '</td>';
                        echo '<td>';
                        echo number_format($row['importo'],2);
                        echo '</td>';
                        echo '<td>';
                        echo number_format(report_totale_speso_categoria($row['id_cat'], $anno),2);
                        echo '</td>';
                        echo '<td>';
                        echo number_format(round($row['importo'] /12),2);
                        echo '</td>';
                        echo '<td>';
                        
                        echo '</td>';
                        echo '</tr>';
                        $totale_anno+=$row['importo'];
                        $totale_mese+=round($row['importo'] /12);
                    }
                }
                 echo '<tr>';
                        echo '<td>';
                        echo "TOTALE";
                        echo '</td>';
                        echo '<td>';
                        echo "<strong>";
                        echo number_format($totale_anno,2);
                        echo "</strong>";
                        echo '</td>';
                        echo '<td>';
                        echo "";
                        echo '</td>';
                        echo '<td>';
                        echo "<strong>";
                        echo number_format($totale_mese,2);
                        echo "</strong>";
                        echo '</td>';
                        echo '<td>';
                        
                        echo '</td>';
                        echo '</tr>';
                
                ?>
                
               
                
                
            </tr>   
            
            
        </tbody></table>
	
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="./vendor/raphael/raphael.min.js"></script>
    <script src="./vendor/morrisjs/morris.min.js"></script>
    <script src="./data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>
   
</body>

</html>
