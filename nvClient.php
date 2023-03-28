<?php 

    session_start();
    if(!isset($_SESSION['login'])){
          header("location:loginn.php");
          exit();
    }

    require_once("DAO.php");  
  
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
            <?php  
            include("nav.php");
?>
            <div id="page-wrapper">
                <div class="container-fluid" style="background-image: url('gestionn.jpg'); width: 100%;">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">NV CLIENT</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    VEUILLEZ SAISIR NV CLIENT!!
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form role="form" method="POST" action="ajouter.php">
                                              
                                             
                                                    <input class="form-control" placeholder="Enter text" type="hidden" name="id">
                                                
                                                <div class="form-group">
                                                    <label>nom</label>
                                                    <input class="form-control" name="nom" placeholder="Enter text">
                                                    <p class="help-block">Example alami.</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>adresse</label>
                                                    <input class="form-control" placeholder="Enter text" name="adr">
                                                </div>
                                                  <div class="form-group">
                                                    <label>telephone</label>
                                                    <input class="form-control" placeholder="Enter text" name="tele">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <p class="form-control-static">email@example.com</p>
                                                </div>
                                               <div class="form-group input-group">
                                                    <span class="input-group-addon">@</span>
                                                    <input type="email" class="form-control" placeholder="Username" name="email">
                                                </div>
                                               
                                             
                                             
                                            
                                                
                                              
                                            
                                                <button type="submit" class="btn btn-default">Submit Button</button>
                                                <button type="reset" class="btn btn-default">Reset Button</button>
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                      
                            
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
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

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

    </body>
</html>
