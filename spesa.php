<?php

include_once("db.php");
include_once("funzioni.php");

// SELECT *, DATE_FORMAT(FROM_UNIXTIME(`data`), '%d-%m-%Y') AS 'date_formatted' FROM `uscite` 


if (isset($_POST['submit'])) {
    $id_cat=$_POST['id_cat'];
    $importo =$_POST['importo'];
    $data=$_POST['data'];
    $nota=$_POST['nota'];

    $data = data_to_timestamp($data);

    $importo = str_replace(",",".", $importo);
    $query="INSERT INTO uscite VALUES (null,$data,'$importo',$id_cat,'$nota')";
    $result = $db->query($query);
    if($result){
        header("Location: spesa.php");

    }

}
else {
	
}



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Bilancio v1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="ui.theme.css" type="text/css"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

  <script>

  $( function() {

     $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();

  } );

  </script>


  <style>
  .ui-autocomplete-loading {
    background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
  }
  </style>
  <script>
  $(function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#birds" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "categoria_search.php", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
            
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
         terms.push( "" );
          $( "#id_cat" ).val( ui.item.id );
          this.value = terms.join( ", " );
          return false;
        }
      });
  });
  </script>
</head>

<body>

    <form action="" method="POST">
        
        
        
     <input  type="hidden" name="id_cat" id="id_cat" value="" size="30">
        Categoria value<input type="text" name="categoria_nome" id="birds" size="30"><br>
        
        data<input type="text" name="data" id="datepicker" size="30"><br>
        
        importo<input type="text" name="importo" id="" size="30"><br>
        Nota<input type="text" name="nota" id=""><br>
        <input type="submit" name="submit" value="Registra">
    </form>

</body>
</html>



