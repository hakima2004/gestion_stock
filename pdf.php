<?php


// require("fpdf.php");
// require_once("client.php");
// require_once("DAO.php");
// // $pdf = new FPDF();

// // 
// // $pdf->Cell(0,10,'facture');
// // $cols=array('reference' => 23,
// //              'libelle' => "THé" ,
// //               'date' => 2022-4-12 );
// // $pdf->Cell($cols);
// // 



// // $c=DAO::Comm($numCmd);

// //header("location : nvCmd.php");
// class PDF extends FPDF{
		
// function header(){
// 	$this->Image('com.jpg', 10, 10, -600);

// 	$this->Ln(20);
// }
// function footer(){
// 	$this->setY(-15);
// 	$this->Cell(196,5,'- G-stock - ',0,0,'C');
// }
// 		}
// 		$pdf= new PDF('P','mm','A4');
// 		$pdf->AddPage();
// 		$pdf->SetTitle('Facture');
// 		$pdf->SetSubject('Facture');
// 		$pdf->setfont('Arial','', 11);
// 		$pdf->SetTextColor(0);
// 		$pdf->Text(8,38,'num de facture :'.$_GET['num']);
// 		$pdf->Text(8,43,'Date : '.$_GET['date']);
//       $c=DAO::list($_GET['c']);
//       foreach ($c as $k) {
      	
//        $pdf->Text(120,38,' nom de client : '); 
//         $pdf->Text(150,38,utf8_decode($k->__getclient('nom')));
//         $pdf->Text(120,43,' Adresse : ');
//         $pdf->Text(150,43,utf8_decode($k->__getclient('adr')));
//        $pdf->Text(120,48,' Email : ');
//         $pdf->Text(150,48,utf8_decode($k->__getclient('email')));
//     }
//     $position_entete = 80;
//     function entete_table($position_entete){
//     	global $pdf;
//     	$pdf->SetDrawColor(255,255,255);
//     	$pdf->SetFillColor(245,255,225);
//     	$pdf->SetTextColor(0);
//     	$pdf->SetY($position_entete);
//     	$pdf->Cell(40,8,'Reference',1,0,'C',1);
//     	//$pdf->SetX(80);
//     	$pdf->Cell(40,8,'quantite',1,0,'C',1);
//     	//$pdf->SetX(120);
//     	$pdf->Cell(40,8,'libelle',1,0,'C',1);
//     	$pdf->Cell(40,8,'prix unitaire',1,0,'C',1);
//       $pdf->Cell(40,8,'prix total',1,0,'C',1);

//     	$pdf->Ln();
//     	$pdf->Cell(40,8,$_GET['ref'],1,0,'C',1);
//     	//$pdf->SetX(80);
//     	$pdf->Cell(40,8,$_GET['qte'],1,0,'C',1);
//     	$u=DAO::listproduit($_GET['ref']);
//     	foreach ($u as $key) {
//     		$pdf->Cell(40,8,$key->__getproduit('lib'),1,0,'C',1);
//     		$pdf->Cell(40,8,$key->__getproduit('pu'),1,0,'C',1);
//     	  $pdf->Cell(40,8,$key->__getproduit('pu')*$_GET['qte'],1,0,'C',1);

//     	}
    	
//     	//$pdf->SetX(120);


//      }	
//      entete_table($position_entete);

//      // $position_detail = 66;
//      // $pdf->SetY($position_detail);
//      // $pdf->SetX(8);
//      // $pdf->MultiCell(158,8,utf8_decode())

//    ob_start();
//   $pdf->Output('I','../fonts/photos/fac.pdf');
//     ob_end_flush(); 
   

?>
<?php 
  require ("fpdf.php");
  require_once("client.php");
  require_once("DAO.php");
  //customer and invoice details
      $c=DAO::list($_GET['c']);
       foreach ($c as $k) {
      
  $info=[
    "Nom"=>$k->__getclient('nom'),
    "Adresse"=>$k->__getclient('adr'),
    "E-mail"=>$k->__getclient('email'),
  ];
  
  }
  //invoice Products
  $u=DAO::listproduit($_GET['ref']);
    	foreach ($u as $key) {
    	
  $products_info=[
    [
      "Reference"=>$key->__getproduit('lib'),
      "prix unitaire"=>$key->__getproduit('pu'),
      "quantite"=>$key->__getproduit('qte'),
      "total"=>$key->__getproduit('pu')*$_GET['qte']
    ],
  ];
  }
  class PDF extends FPDF
  {
    function Header(){
      
      //Display Company Info
      $this->SetFont('Arial','B',14);
      $this->Cell(50,10,"ABC COMPUTERS",0,1);
      $this->SetFont('Arial','',14);
      $this->Cell(50,7,"West Street,",0,1);
      $this->Cell(50,7,"Salem 636002.",0,1);
      $this->Cell(50,7,"PH : 8778731770",0,1);
      
      //Display INVOICE text
      $this->SetY(15);
      $this->SetX(-40);
      $this->SetFont('Arial','B',18);
      $this->Cell(50,10,"Facture",0,1);
      
      //Display Horizontal line
      $this->Line(0,48,210,48);
    }
    
    function body($info,$products_info){
      
      //Billing Details
      $this->SetY(55);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(50,10,"Client: ",0,1);
      $this->SetFont('Arial','',12);
      $this->Cell(50,7,"Nom: ".$info["Nom"]); $this->Ln();
      $this->Cell(50,7,"Adresse: ".$info["Adresse"]); $this->Ln();
      $this->Cell(50,7,"E-mail: ".$info["E-mail"]);

      
      
      //Display Invoice no
      $this->SetY(55);
      $this->SetX(-60);
      $this->Cell(50,7,"Numero commande : ".$_GET['num']);
      
      //Display Invoice date
      $this->SetY(63);
      $this->SetX(-60);
      $this->Cell(50,7,"Date : ".$_GET['date']);
      
      //Display Table headings
      $this->SetY(95);
      $this->SetX(10);
      $this->SetFont('Arial','B',12);
      $this->Cell(80,9,"DESCRIPTION",1,0);
      $this->Cell(40,9,"PRIX",1,0,"C");
      $this->Cell(30,9,"QTE",1,0,"C");
      $this->Cell(40,9,"total",1,1,"C");
      $this->SetFont('Arial','',12);
      
      //Display table product rows
      $products_info=DAO::listproduit($_GET['ref']);
      foreach($products_info as $row){
        $this->Cell(80,9,$row->__getproduit("lib"),"LR",0);
        $this->Cell(40,9,$row->__getproduit("pu"),"R",0,"R");
        $this->Cell(30,9,$_GET['qte'],"R",0,"C");
        $this->Cell(40,9,$row->__getproduit('pu')*$_GET['qte'],"R",1,"R");
     
      //Display table empty rows
      for($i=0;$i<12-count($products_info);$i++)
      {
        $this->Cell(80,9,"","LR",0);
        $this->Cell(40,9,"","R",0,"R");
        $this->Cell(30,9,"","R",0,"C");
        $this->Cell(40,9,"","R",1,"R");
      }
      //Display table total row
      $this->SetFont('Arial','B',12);
      $this->Cell(150,9,"TOTAL",1,0,"R");
      $this->Cell(40,9,$row->__getproduit('pu')*$_GET['qte'],1,1,"R");
       }
     
    
      
    }
    function Footer(){
      
      //set footer position
      $this->SetY(-50);
      $this->SetFont('Arial','B',12);
      $this->Cell(0,10,"for ABC COMPUTERS",0,1,"R");
      $this->Ln(15);
      $this->SetFont('Arial','',12);
      $this->Cell(0,10,"Authorized Signature",0,1,"R");
      $this->SetFont('Arial','',10);
      
      //Display Footer Text
      $this->Cell(0,10,"This is a computer generated invoice",0,1,"C");
      
    }
    
  }
  //Create A4 Page with Portrait 
  $pdf=new PDF("P","mm","A4");
  $pdf->AddPage();
  $pdf->body($info,$products_info);ob_start();
  $pdf->Output();
?>