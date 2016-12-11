<?php

include_once("db.php");

include_once("funzioni.php");



if (isset($_GET['id_tipo_cliente'])) {
	$id_tipo_cliente = $_GET['id_tipo_cliente'];
}
else {
	$id_tipo_cliente = "";
}



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Bilancio v1.0</title>
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
		<div id="sx">
			
		</div>
		<div id="dx">
                    
		<table width="1000px" class="display" id="example" cellspacing="0">
        <thead>
            <tr>
                 <th>Data</th>
                <th>Categoria</th>
                <th>Importo</th>
                <th>Nota</th>
               
                
            </tr>
        </thead>
        <tfoot>
            <tr>
                 <th>Data</th>
                <th>Categoria</th>
                <th>Importo</th>
                <th>Nota</th>
                
            </tr>
        </tfoot>
        <tbody>
            <tr>
                
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
                
            </tr>   
            
            
        </tbody></table>
	
	</div>
		


</div>

</body>
</html>