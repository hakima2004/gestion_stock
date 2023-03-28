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

    <!-- Timeline CSS -->
    <link href="../css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/morris.css" rel="stylesheet">

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

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid" style="background-image: url('gestionn.jpg'); width: 100%; height: 100%;">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">G-STOCK </h1>
                </div>
            </div>
            <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="ff.png" class="fa fa-tasks fa-3x">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php  echo DAO::nbrfournisseur(); ?></div>
                                            <div>fournisseurs</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left"></span>
                                        <span class="pull-right"></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="cl.png" class="fa fa-tasks fa-3x">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php  echo DAO::nbrclient(); ?></div>
                                            <div>clients</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left"></span>
                                        <span class="pull-right"></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="pp.png" class="fa fa-tasks fa-3x">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php  echo DAO::nbrproduit(); ?></div>
                                            <div>prouduits</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left"></span>
                                        <span class="pull-right"></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img src="cc.png" class="fa fa-tasks fa-3x" width="95px">
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?php  echo DAO::nbrcommande(); ?></div>
                                            <div>commandes</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left"></span>
                                        <span class="pull-right"></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                  
                        
          
                    </div>
         <div class="col-lg-12">
            <div class="col-lg-4">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    Produits plus vendu
                                </div>
                                <div class="panel-body">
                                        <ul class="top-sales-details">
              <?php
              $produit=DAO::GetMostcommande();
                foreach($produit as $key => $value){
                ?>
                <li>
                
                <!--<img src="images/sunglasses.jpg" alt="">-->
                <span class="product"><?php echo $value['libelle'] ?></span>
                
                </li>                   
                <?php 
                }
              ?>
            </ul>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
            <!-- ... Your content goes here ... -->
          
        </div>
        </div>
    </div>

</div>

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
