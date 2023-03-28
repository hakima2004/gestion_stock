<?php 

require_once("DAO.php");
$list=DAO::listClient();

 session_start();
    if(!isset($_SESSION['login'])){
          header("location:loginn.php");
          exit();
    }
 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php include("nav.php"); ?>

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Table</h1>
                        </div>
                    </div>
                    <!-- /.row -->
                           <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                               
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    Ajouter
                                  <button type="button" class="btn btn-outline btn-primary"><a href="nvclient.php"><i class="fa fa-fw" aria-hidden="true" title="Copy to use pencil"></i></a></button>
                                    <!-- /.table-responsive -->
                                   
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    clients
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nom</th>
                                                    <th>Adresse</th>
                                                    <th>Telephone</th>
                                                    <th>Email</th>
                                                    <th>actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php 
foreach ($list as $v) {
 ?>

                                                <tr>
                                                   
                                                    <td><?=$v->__getclient('nom') ?></td>
                                                    <td><?=$v->__getclient('adr') ?></td>
                                                    <td><?=$v->__getclient('tele') ?></td>
                                                     <td><?=$v->__getclient('email') ?></td>
                                                       <td> 
<a href="modifierC.php?id_client=<?=$v->__getclient('id');?>&nom=<?=$v->__getclient('nom'); ?>&adresse=<?=$v->__getclient('adr'); ?>&tele=<?=$v->__getclient('tele'); ?>&email=<?=$v->__getclient('email'); ?>"><i class="fa fa-fw" aria-hidden="true" id="update" title="Copy to use pencil-square-o"></i></a>
<a href="delete.php?id=<?=$v->__getclient('id'); ?>"><i class="fa fa-fw" id="delete" aria-hidden="true" title="Copy to use trash-o"></i></a>
</td>
                   </td>
                                                </tr>
                                               <?php } ?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-6 -->
                       
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                   
                    <!-- /.row -->
                  
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>
