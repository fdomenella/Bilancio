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

    $importo =importo_pulisci($importo);
    $query="INSERT INTO uscite VALUES (null,$data,'$importo',$id_cat,'$nota')";
    $result = $db->query($query);
    
    header("Location: spesa.php");
}
else {
	
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Francesco Domenella">

    <title>Bilancio - Inserisci Spesa</title>
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

   <link rel="stylesheet" href="ui.theme.css" type="text/css"/>
 
 


  <style>
  .ui-autocomplete-loading {
    background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
  }
  .ui-menu{
      background-color: #007bb6;
  }
  .ui-menu-item{
      width: 200px;
      color: blue;
  }
  .ui-menu-item-wrapper{
      
  }
  </style>
  <script type="text/javascript">
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
  $(document).ready(function() {
      $('#id_cat').on('change', function() {
                alert("ciao ");
            });
     $('input[type="submit"]').prop('disabled', true);
     $('input[type="text"]').keyup(function() {
        if($(this).val() != '') {
           $('input[type="submit"]').prop('disabled', false);
        }
     });
 });
 
  </script>
  <script type="text/javascript">
        $(document).ready(function() {
            
        });
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
                    <h1 class="page-header">Inserisci Spesa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                <div class="col-lg-8">
                    
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Aggiungi spesa
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <form action="" method="POST">
                                    <input  type="hidden" name="id_cat" id="id_cat" value="" size="30">
                                    <div class="form-group">
                                            <label>Categoria</label>
                                            <input size="30" class="form-control" placeholder="Seleziona categoria" name="categoria_nome" id="birds">
                                    </div>
                                   
                                     <div class="form-group">
                                            <label>Data</label>
                                            <input  class="form-control" placeholder="gg-mm-aaaa" name="data" id="datepicker">
                                    </div>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-eur"></i>
                                        </span>
                                        <input class="form-control" placeholder="Digita l'importo" type="text" name="importo">
                                    </div>
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea class="form-control" rows="3" name="nota"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default" name="submit" value="Registra" >Registra</button>
                                </form>
                                
                            </div>
                            <!-- /.list-group -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                  
                    
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                  
                    <div class="col-lg-12 col-md-12 ">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    
                                    <div class="col-xs-12 text-right">
                                        <div class="huge">230 €</div>
                                        <div>SPESO</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                      <div class="col-lg-12 col-md-12 ">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    
                                    <div class="col-xs-12 text-right">
                                        <div class="huge">30 €</div>
                                        <div>Residuo</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
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
    
 <script type="text/javascript">

  $(function() {

     $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();

  });

  </script>
</body>

</html>
