<?php

include_once("db.php");

include_once("funzioni.php");


if(isset($_GET['submit'])){
    
    $anno=$_GET['anno'];
    $id_cat = $_GET['id_cat'];
    $importo=$_GET['importo'];
    
    $importo = importo_pulisci($importo);
    
    
    if($_GET['azione']=="add"){
      
        // qui vado di insert
        $query ="INSERT INTO budget VALUES($anno,$id_cat,$importo)";
        $result = $db->query($query);
        
        
}
    }
    if($_GET['azione']=="mod"){
      
        //qui vado di update
      
        $query ="UPDATE budget SET importo = $importo WHERE anno=$anno and id_cat=$id_cat";
        
        $result = $db->queryInsert($query);
        
       
    }
    



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Bilancio v1.0 - Budget Edit</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">






<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.1.2/css/autoFill.dataTables.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.3.2/css/colReorder.dataTables.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.1.2/css/rowReorder.dataTables.min.css"/>

 

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/autofill/2.1.2/js/dataTables.autoFill.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.3.2/js/dataTables.colReorder.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

    $('#example').DataTable({
  "pageLength": 50,
  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
});

} );            
 </script>
</head>

<body>




<div id="body">
	<div id="head">
		
	</div>
	
	
	<div id="center">
		
                    
		<table width="500px" class="display" id="example" cellspacing="0">
        <thead>
            <tr>
                 <th>Anno</th>
                <th>Categoria</th>
                <th>Importo</th>
                <th>opzioni</th>
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Anno</th>
                <th>Categoria</th>
                <th>Importo</th>
                <th>opzioni</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <?php
                $anno = date("Y");
             
              
               
               
                $query = "SELECT * FROM budget RIGHT JOIN categoria ON categoria.id = budget.id_cat  ";
                
                 $result = $db->query($query);
              
                while($row=mysqli_fetch_array($result)){
                    if($row['anno']==$anno OR is_null($row['anno'])){
                        echo '<form action="" method="GET">';

                        echo "<tr>";
                        echo "<td>";
                        echo $anno;
                        echo '<input type="hidden" name="anno" value="'.$anno.'">';
                        echo "</td>";
                        echo "<td>";
                        echo $row['nome'];
                         echo '<input type="hidden" name="id_cat" value="'.$row['id'].'">';
                        echo "</td>";
                        echo "<td>";
                        echo '<input type="text" name="importo" size="6" id="" value="'.$row['importo'].'">';
                        echo "</td>";

                        echo "<td>";
                        if (bdg_check_bdg_set($anno, $row['id'])){
                            echo '<input type ="submit" name="submit" value="Aggiorna"/>';
                            echo '<input type="hidden" name="azione" value="mod">';

                        }else{
                            echo '<input type ="submit" name="submit" value="Aggiungi" />';
                             echo '<input type="hidden" name="azione" value="add">';
                        }

                        echo "</td>";
                        echo "</tr>";
                        echo '</form>';
                    }
                }
                
                
                ?>
                
               
                
                
            </tr>   
            
            
        </tbody></table>
	

		


</div>

</body>
</html>