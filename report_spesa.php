<?php

include_once("db.php");
include_once("funzioni.php");

// SELECT *, DATE_FORMAT(FROM_UNIXTIME(`data`), '%d-%m-%Y') AS 'date_formatted' FROM `uscite` 


$anno = date("Y");
if(!isset($_GET['month'])){
    $month = current_month();
}else{
    $month = $_GET['month'];
}
$dateObj   = DateTime::createFromFormat('!m', $month);
$monthName = $dateObj->format('F'); // March

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
  <script type="text/javascript">
  function doSomething(selectedIndex){
    
        window.location.replace("report_spesa.php?month="+selectedIndex);
      
  }
  </script>

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
                    <h1 class="page-header">Report - Spesa <?php echo $anno; ?> - mese <?php echo $monthName; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                   Seleziona il mese: <select name="ab" onchange="if (this.selectedIndex) doSomething(this.selectedIndex);">
    <option value="-1">--</option>
    <option value="1">Gennaio</option> 
    <option value="2">Febbraio</option>
    <option value="3">Marzo</option>
    <option value="4">Aprile</option>
    <option value="5">Maggio</option>
    <option value="6">Giugno</option>
    <option value="7">Luglio</option>
    <option value="8">Agosto</option>
    <option value="9">Settembre</option>
    <option value="10">Ottobre</option>
    <option value="11">Novembre</option>
    <option value="12">Dicembre</option>
</select>
                 	<table  class="table table-striped table-bordered table-hover" id="example" >
        <thead>
            <tr>
                <th>Categoria</th>
                
                <th>Media/mese</th>
                <th>speso mese/mese</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Categoria</th>
               
                <th>Preventivato </th>
                <th>consuntivo</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <?php
                
             
             /**
              * 
              * 
              * inizio mese
              * fine mese dinamico
              * in timestap per query
              */
        
            
            $anno = current_year();
           
           
               
           //echo "end day: " . $lastday . " in data :". timestamp_to_data($lastday);
           
                    
                 
            
            
                $query = "SELECT * FROM budget RIGHT JOIN categoria ON categoria.id = budget.id_cat";
                
                 $result = $db->query($query);
              
                while($row=mysqli_fetch_array($result)){
                    if($row['anno']==$anno OR is_null($row['anno'])){
                        $budget_mese="";
                        $spesa_mese="";
                        echo '<tr>';
                        echo '<td>';
                        echo $row['nome'];
                        echo '</td>';
                        echo '<td>';
                        $budget_mese = round($row['importo'] /12);
                         echo $budget_mese;
                        echo '</td>';
                        echo '<td>';
                        $spesa_mese = report_totale_speso_categoria_mese($row['id_cat'],  $month, $anno);
                        if($spesa_mese > $budget_mese){
                            echo '<span style="color: red;"><strong>';
                        }
                        echo $spesa_mese;
                        if($spesa_mese > $budget_mese){
                            echo '</strong></span>';
                        }
                        echo '</td>';
                      
                        echo '</tr>';
                    }
                }
                
                
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
