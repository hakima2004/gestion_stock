<?php 
   require_once("DAO.php");
   require_once("produit.php"); 

    session_start();
    if(!isset($_SESSION['login'])){
          header("location:loginn.php");
          exit();
   }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Document</title>
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

      <style>
        .result{
         color:red;
        }
        td
        {
          text-align:center;
        }
        ul,li{
         list-style-type: none;

         margin-top: 10%;

         margin-bottom: 10%;
         
        }
        body{
         background-image: url('gestion.jpg');
         background-repeat: no-repeat;
         background-size: 100%;
        }
      </style>

      <script type="text/javascript">
   var myApp = new function(){

      this.printDiv = function(){
         //alert('hi');
var div = document.getElementById("imp");
      var a = window.open('','','height=800,width=800');
      a.document.write(div.outerHTML);
      a.document.close();
      a.print();

      }
   } 
</script>
   </head>
   <body>
      <div class="navbar-default sidebar" role="navigation" style="color: black;">
                    <div class="sidebar-nav navbar-collapse" style="background-color: white;color: white; margin-top: 5%;">
                  
                           
                                
                                        <ul><h4><a href="#">Categories</a></h4>
                                          <?php  require_once("DAO.php");require_once("categorie.php");
                                          $k=DAO::listcat();
                                                foreach ($k as $v) {
                                                ?>
                                            <li>
                                                <a href="blank.php?i=<?=$v->__getcat('id_cat')?>"><?=$v->__getcat('desc')?></a>
                                            </li> <br>
                                            <?php } ?>
                                        </ul>
                                 
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
      <section class="mt-3" >

         <div class="container-fluid"> 
         <h2 class="text-center" style="color:darkblue;margin-top: 5%;"> la caisse & génération de ticket </h2>
         <h6 class="text-center">:) :) :)</h6>
         <div class="row" style="margin-left: 20%; margin-top: 5%;">
            <div class="col-md-5 mt-4 ">
               <table class="table" style="background-color:#f5f5f5;">
                  <thead>
                     <tr>
                        <th style="width:5%">No.</th>
                        <th style="width:15%">Lib</th>
                        <th style="width: 15%">Qte</th>
                        <th style="width:10%">Prix</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td scope="row" style="width: 5%">1</td>
                        <td style="width:15%">
                           <select name="vegitable" id="vegitable"  class="form-control">
                              <?php 
                                 // $sql = "SELECT * FROM orders";
                                 // $query = mysqli_query($conn,$sql);
                                 // while($row = mysqli_fetch_assoc($query)){
                              $l=DAO::affiche($_GET['i']);
                                 foreach ($l as $key) {
                                 
                                 ?>
                              <option id="<?php echo $key->__getproduit('id_cat'); ?>" value="<?php echo $key->__getproduit('ref') ?>" class="vegitable custom-select">
                                 <?php echo $key->__getproduit('lib'); ?>
                              </option>
                              <?php  }?>   
                           </select>
                        </td>
                        <td style="width:10%">
                          <input type="number" id="qty" min="0" value="0" class="form-control">
                        </td>
                        <td style="width: 15%">
               <select id="price"  class="form-control" >
                  <?php  $m=DAO::pu($_GET['i']); 
                        foreach($m as $v){
                            ?>
                  <option>
                     <?php echo $v->__getproduit('pu');?>
                  </option>
               <?php } ?>
               </select>

                        
                        </td >
                        <td style="width: 10%"><button id="add" class="btn btn-primary">Add</button></td>
                     </tr>
                  </tbody>
               </table>
               <div role="alert" id="errorMsg" class="mt-5" >
                 <!-- Error msg  -->
              </div>
            </div>
            <div class="col-md-7  mt-4" style="background-color:#f5f5f5;" id="imp">
               <div class="p-4">
                  <div class="text-center">
                     <h4>ticket</h4>
                  </div>
                  <span class="mt-4"> Time : </span><span  class="mt-4" id="time"></span>
                  <div class="row">
                     <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <span id="day"></span> : <span id="year"></span>
                     </div>
                     <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <p>Order No:</p>
                     </div>
                  </div>
                  <div class="row">
                     </span>
                     <table id="receipt_bill" class="table" >
                        <thead>
                           <tr>
                              <th> No.</th>
                              <th>Ref</th>
                              <th>Quantite</th>
                              <th class="text-center">Prix</th>
                              <th class="text-center">Total</th>
                           </tr>
                        </thead>
                        <tbody id="new" >
                          
                        </tbody>
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark" >
                                <h5><strong>Sous Total:  ₹ </strong></h5>
                                <p><strong>Tax (5%) : ₹ </strong></p>
                           </td>
                           <td class="text-center text-dark" >
                              <h5> <strong><span id="subTotal"></strong></h5>
                              <h5> <strong><span id="taxAmount"></strong></h5>
                           </td>
                        </tr>
                        <tr>
                           <td> </td>
                           <td> </td>
                           <td> </td>
                           <td class="text-right text-dark">
                              <h5><strong>Total Brut: ₹ </strong></h5>
                           </td>
                           <td class="text-center text-danger">
                              <h5 id="totalPayment"><strong> </strong></h5>
                               
                           </td>
                        </tr>
                     </table>
                   
                  </div>  <input class="btn btn-primary" type="button" onclick="myApp.printDiv()" value="click"/>
               </div>
            </div> 
         </div>
        
      </section>
   </body>
</html>
<script>
   $(document).ready(function(){
     $('#vegitable').change(function() {
      var id = $(this).find(':selected')[0].id;
       $.ajax({
          method:'POST',
          url:'fetch_produit.php',
          data:{id:id},
          dataType:'json',
          success:function(data)
            {
               $('#price').html(data.prixUnitaire);
 
               //$('#qty').text(data.product_qty);
            }
       });
     });
    
     //add to cart 
     var count = 1;
     $('#add').on('click',function(){
    
        var name = $('#vegitable').val();
        var qty = $('#qty').val();
        var price = $('#price').val();
 
        if(qty == 0)
        {
           var erroMsg =  '<span class="alert alert-danger ml-5">Minimum Qty should be 1 or More than 1</span>';
           $('#errorMsg').html(erroMsg).fadeOut(9000);
        }
        else
        {
           billFunction(); // Below Function passing here 
        }
         
        function billFunction()
          {
          var total = 0;
       
          $("#receipt_bill").each(function () {
          var total =  price*qty;
          var subTotal = 0;
          subTotal += parseInt(total);
          
          var table =   '<tr><td>'+ count +'</td><td>'+ name + '</td><td>' + qty + '</td><td>' + price + '</td><td><strong><input type="hidden" id="total" value="'+total+'">' +total+ '</strong></td></tr>';
          $('#new').append(table)
 
           // Code for Sub Total of Vegitables 
            var total = 0;
            $('tbody tr td:last-child').each(function() {
                var value = parseInt($('#total', this).val());
                if (!isNaN(value)) {
                    total += value;
                }
            });
             $('#subTotal').text(total);
               
            // Code for calculate tax of Subtoal 5% Tax Applied
              var Tax = (total * 5) / 100;
              $('#taxAmount').text(Tax.toFixed(2));
 
             // Code for Total Payment Amount
 
             var Subtotal = $('#subTotal').text();
             var taxAmount = $('#taxAmount').text();
 
             var totalPayment = parseFloat(Subtotal) + parseFloat(taxAmount);
             $('#totalPayment').text(totalPayment.toFixed(2)); // Showing using ID 
        
         });
         count++;
        } 
       });
           // Code for year 
             
           var currentdate = new Date(); 
             var datetime = currentdate.getDate() + "/"
                + (currentdate.getMonth()+1)  + "/"
                + currentdate.getFullYear();
                $('#year').text(datetime);
 
           // Code for extract Weekday     
                function myFunction()
                 {
                    var d = new Date();
                    var weekday = new Array(7);
                    weekday[0] = "Dimenche";
                    weekday[1] = "Lundi";
                    weekday[2] = "Mardi";
                    weekday[3] = "Mercredi";
                    weekday[4] = "Jeudi";
                    weekday[5] = "Vendredi";
                    weekday[6] = "Samedi";
 
                    var day = weekday[d.getDay()];
                    return day;
                    }
                var day = myFunction();
                $('#day').text(day);
     });
</script>
 
<!-- // Code for TIME -->
<script>
    window.onload = displayClock();
 
     function displayClock(){
       var time = new Date().toLocaleTimeString();
       document.getElementById("time").innerHTML = time;
        setTimeout(displayClock, 1000); 
     }
</script>
