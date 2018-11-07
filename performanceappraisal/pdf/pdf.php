<?php
require('fpdf.php');
//A4 width
//default margin: 10mm each side
//writable horizontal: 219-(10*2) = 189mm


////connect to database
//   $servername = "localhost";
//   $username = "root";
//   $password = "";
//   $dbname = "areson";
//
//// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);
//
////get invoices data
//$query = mysqli_query($conn, "select * from invoiceprint
//                       where custdate = '".$_GET['custdate']."'");
//$invoice = mysqli_fetch_array($query);
//
////$user = $_SESSION['username'];

$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();
//Image(file name, x position, y position, width [optional], height [optional])
$pdf-> Image('watermarksbca2.png', 39, 85, 130);

//center, down, width, height
$pdf->Image('sbca-logo-red.png',70,20,60,20,0,0);
$pdf->Ln(43);

//HEADER
//Cell(width, height, text, border 0(no border) 1(border), end line 0(continue) 1(new line), [align] (L/empty string (default value) C (center) R (right))

$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(114,  5, 'San Beda College Alabang', 0, 0); 
$pdf->Cell(74,  5, 'Performance Summary', 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(114,  5, '[Alabang Hills]', 0, 0); 
$pdf->Cell(74,  5, '', 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(114,  5, '[Muntinlupa City, Philippines, 1709]', 0, 0); 
$pdf->Cell(35,  5, 'Date', 0, 0);
$pdf->Cell(39,  5, '11/03/17', 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(114,  5, 'Phone: [975-4432; 500-6183]', 0, 0); 
$pdf->Cell(35,  5, 'Faculty Name:', 0, 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(39,  5, 'Aristotle F. Musni', 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(26,  5, 'Department:', 0, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(88,  5, 'Information Technology', 0, 0); 
$pdf->Cell(74,  5, '', 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(26,  5, 'School Year:', 0, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(88,  5, '2018-2019', 0, 0); 
$pdf->Cell(74,  5, '', 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(26,  5, 'Semester:', 0, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(88,  5, '1st Semester', 0, 0); 
$pdf->Cell(74,  5, '', 0, 1); //end of line

$pdf->Ln(15);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(75,  5, 'Elements', 1, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(37.6,  5, 'Rating', 1, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(37.6,  5, 'Score %', 1, 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(37.6,  5, 'Total', 1, 1);//end of line

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Classroom Observation', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '35%', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 1);//end of line

//1
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '1. VDAA', 'R,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '2.11', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(5%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0.11', 1, 1, 'R');//end of line
//2
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '2. Chair/Coordinator', 'R', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '1.14', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(30%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0.34', 1, 1, 'R');//end of line
//space
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 1);//end of line

//performace appraisal
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Performance Appraisal', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '40%', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 1);//end of line

//1
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '1. Dean/VDAA', 'R,B', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '4.14', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(20%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0.83', 1, 1, 'R');//end of line
//2
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(5,  5, '', 'L', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(70,  5, '2. Chair/Coordinator', 'R', 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '4.14', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '(20%)', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0.83', 1, 1, 'R');//end of line
//space
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 1);//end of line

//studentsevaluation 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Students Evaluation', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '3.00', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '20%', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '0.60', 1, 1, 'R');//end of line
//space
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 1);//end of line

//selfevaluation 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(75,  5, 'Self Evaluation', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, 'No Record', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '5%', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, 'No Record', 1, 1, 'R');//end of line
//total
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(75,  5, 'Total:', 1, 0); 
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(37.6,  5, '(100%)', 1, 0); 
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(37.6,  5, '', 1, 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(37.6,  5, '1.88', 1, 1, 'R');//end of line



//
//$pdf->Cell(25,  5, '', 0, 1);
//$pdf->SetFont('Arial', '', 12);
//$pdf->Cell(25,  5, 'ADDRESS: ', 0, 0); 
//$pdf->SetFont('Arial', '', 8);
//$pdf->Cell(100,  5,  '0000', 'B', 1, 1); //end of line
//
//$pdf->Cell(25,  5, '', 0, 1);
//$pdf->SetFont('Arial', '', 12);
//$pdf->Cell(25,  5, 'SHIP TO: ', 0, 0); 
//$pdf->SetFont('Arial', '', 8);
//$pdf->Cell(100,  5,  '0000', 'B', 0, 1); //end of line
//
//$pdf->SetFont('Arial', '', 11);
//$pdf->Cell(15,  5, '', 0, 0); 
//$pdf->Cell('',  5, 'P.O. NO.:', 0, 0);  //P.O No. (R)
//$pdf->SetFont('Arial', '', 11);
//$pdf->Cell(-30,  5, '', 0, 0); 
//$pdf->Cell('',  5, '0000', 'B', 1, 1);//end of line
//
///*$pdf->Cell(25,  5, '', 0, 1);
//$pdf->SetFont('Arial', '', 12);
//$pdf->Cell(25,  5, 'VIA: ', 0, 0); 
//$pdf->SetFont('Arial', '', 12);
//$pdf->Cell(100,  5, $invoice['customer'], 'B', 0, 1); //end of line */
//
////may di pa ko nilagay 
//
////make a dummy empty cell as a vertical spacer
//$pdf->Cell(189, 10, '', 0, 1); //end of line 
//
////invoice contents
//$pdf->SetFont('Arial', 'B', 12);
//$pdf->Cell(25,  5, 'QTY',1, 0, 'C');
//$pdf->Cell(85, 5, 'DESCRIPTION', 1, 0, 'C');
//$pdf->Cell(40,  5, 'UNIT PRICE', 1, 0, 'C');
//$pdf->Cell(40,  5, 'AMOUNT', 1, 1, 'C'); //end of line 
//
//$pdf->SetFont('Arial', '', 12);
//
////Numbers are right-aligned so we give 'R' after new line parameter
//
////When the buyer buys 1 item
//	 $pdf->Cell(25,  5, '0000', 1, 0);
//	 $pdf->Cell(85	,5,'0000',1,0);
//	 $pdf->Cell(40,  5, '0000',1, 0, 'C');
//   $pdf->Cell(40,  5, '0000',1, 1,'R');
//
//////When the buyers buys a lot of items
////while($item = mysqli_fetch_array($query)){
////	$pdf->Cell(25,  5, '0000', 1, 0);
////	$pdf->Cell(85	,5,'0000',1,0);
////	$pdf->Cell(40,  5, '0000',1, 0, 'C');
////  $pdf->Cell(40,  5, '0000',1, 1,'R');
////}
//
//$pdf->Cell(25,  5, '',     1, 0);
//$pdf->Cell(85, 5, '', 1, 0);
//$pdf->Cell(40,  5, '',1, 0, 'C');
//$pdf->Cell(40,  5, '',1, 1,'R'); //end of line 
//
//$pdf->Cell(25,  5, '',     1, 0);
//$pdf->Cell(85, 5, '', 1, 0);
//$pdf->Cell(40,  5, '',1, 0, 'C');
//$pdf->Cell(40,  5, '',1, 1,'R'); //end of line 
//
////summary 
//$pdf->Cell(25,  5, '',     1, 0);
//$pdf->Cell(85, 5, 'Total Sales(Vat Inclusive)', 1, 0,'R');
//$pdf->Cell(40,  5, '',1, 0, 'C');
//$pdf->Cell(40,  5,  '0000',1, 1,'R'); //end of line 
//
//$pdf->Cell(25,  5, '',     1, 0);
//$pdf->Cell(85, 5, 'Less: VAT', 1, 0,'R');
//$pdf->Cell(40,  5, '',1, 0, 'C');
//$pdf->Cell(40,  5, '0000',1, 1,'R'); //end of line 
//
//$pdf->Cell(25,  5, '',     1, 0);
//$pdf->Cell(85, 5, 'Amount: Net of VAT', 1, 0,'R');
//$pdf->Cell(40,  5, '',1, 0, 'C');
//$pdf->Cell(40,  5, '0000',1, 1,'R'); //end of line 
//
///*$pdf->Cell(25,  5, '',     1, 0);
//$pdf->Cell(85, 5, 'Amount Due', 1, 0,'R');
//$pdf->Cell(40,  5, '',1, 0, 'C');
//$pdf->Cell(40,  5, '[-]',1, 1,'R'); //end of line */
//
//$pdf->Cell(25,  5, '',     1, 0);
//$pdf->Cell(85, 5, 'Add: VAT', 1, 0,'R');
//$pdf->Cell(40,  5, '',1, 0, 'C');
//$pdf->Cell(40,  5, '0000',1, 1,'R'); //end of line  
//
//$pdf->SetFont('Arial', '', 7.5);
//$pdf->Cell(150, 6.5, 'NOTE: Make all checks payable to ARESON TRADE AND SERVICES, INC.        TOTAL:' , 'L', 0, 'R');
//$pdf->SetFont('Arial', '', 12);
//$pdf->Cell(40, 6.5, '0000', 'R', 1, 'R');
//
//$pdf->SetFont('Arial', '', 7.5);
//$pdf->Cell(55,  10, 'Prepared by: ',1, 0);
//$pdf->Cell(40,  10, 'Delivered by: ',1, 0);
//$pdf->Cell(48,  10, 'Checked by: ',1, 0);
////$pdf->Image('bqa.png',175,165,15,20,0,0);
//$pdf->Cell(47,  10, 'Credit Approved by: B.Q.A',1, 1);
//
//$pdf->SetFont('Arial', '', 6);
//$pdf->Cell(130, 4, '1. For the purpose of securing payment of the purchase price, the goods remain the property of ARESON until fully paid for.' , 0, 0);
//
//$pdf->SetFont('Arial', '', 8);
//$pdf->Cell(60, 4, 'RECEIVED all items listed above' , 0, 1, 'R'); //R
//
//$pdf->SetFont('Arial', '', 6);
//$pdf->Cell(130, 4, '2. Any overdue account remaining unpaid after the terms indicated above shall automatically bear
// interest at the rate of 3%' , 0, 0);
//
//$pdf->SetFont('Arial', '', 8);
//$pdf->Cell(60, 4, 'in good order and condition and' , 0, 1, 'R'); //R
//
//$pdf->SetFont('Arial', '', 6);
//$pdf->Cell(130, 4, 'per month compounded monthly. In case of litigation for the collection of this account or any portion thereof the action may ' , 0, 0);
//
//$pdf->SetFont('Arial', '', 8);
//$pdf->Cell(60, 4, 'we hereby agree to the terms and' , 0, 1, 'R'); //R
//
//$pdf->SetFont('Arial', '', 6);
//$pdf->Cell(130, 4, 'be filed in any court in Metro Manila and the buyer shall pay an amount equivalent to 25% of the amount due but in no case' , 0, 0);
//
//$pdf->SetFont('Arial', '', 8);
//$pdf->Cell(60, 4, 'conditions.' , 0, 1, 'R'); //R
//
//$pdf->SetFont('Arial', '', 6);
//$pdf->Cell(130, 4, 'less than P1,000.00 as attorneys fees aside from the cost of suit.' , 0, 1);
//$pdf->Cell(130, 4, '3. Goods travel at buyers risk. Our responsibility ceases when merchandise is delivered to the carrier in good order. Claim' , 0, 0);
//
//$pdf->SetFont('Arial', '', 8);
//$pdf->Cell(60, 4, 'By: ________________________' , 0, 1, 'R'); //R
//
//$pdf->SetFont('Arial', '', 6);
//$pdf->Cell(130, 4, 'for losses and damages should be made against the carriers. Insurance charge, if any are for buyers account.' , 0, 0);
//
//$pdf->SetFont('Arial', '', 8);
//$pdf->Cell(60, 4, 'Authorized Representive    ' , 0, 1, 'R'); //R
//
//$pdf->SetFont('Arial', '', 6);
//$pdf->Cell(130, 4, '4. Demand a Provisional receipt, or Companys Official Receipt. We cannot accept a receipted Invoice, Delivery Receipt,' , 0, 0);
//
//$pdf->SetFont('Arial', '', 8);
//$pdf->Cell(60, 4, '___________________________' , 0, 1, 'R'); //R
//
//$pdf->SetFont('Arial', '', 6);
//$pdf->Cell(130, 4, 'Job Order and/or Sales Order as proof of payment.', 00, 0);  
// 
//$pdf->SetFont('Arial', '', 8);
//$pdf->Cell(60, 4, 'Name in Print                ' , 0, 1, 'R'); //R

//Cell(width, height, text, border 0(no border) 1(border), end line 0(continue) 1(new line), [align] (L/empty string (default value) C (center) R (right))]

/*$pdf->Cell(130, 5, 'GEMUL APPLIANCES CO.', 0, 0);
$pdf->Cell(59,  5, 'INVOICE', 0, 1); //end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(130, 5, '[Street Address]', 0, 0);
$pdf->Cell(59,  5, '', 0, 1); //end of line

$pdf->Cell(130, 5, '[City, Country, ZIP]', 0, 0);
$pdf->Cell(25,  5, 'Date', 0, 0); 
$pdf->Cell(34,  5, '[dd/mm/yyyy]', 0, 1); //end of line

$pdf->Cell(130, 5, 'Phone [+12345678]', 0, 0);
$pdf->Cell(25,  5, 'Invoice #', 0, 0); 
$pdf->Cell(34,  5,  '[invoiceID]', 0, 1); //end of line

$pdf->Cell(130, 5, 'Fax [+12345678]', 0, 0);
$pdf->Cell(25,  5, 'Customer ID', 0, 0); 
$pdf->Cell(34,  5,  '[clientID]', 0, 1); //end of line

//make a dummy empty cell as a vertical spacer 
$pdf->Cell(189, 10, '', 0, 1); //end of line 

//billing address
$pdf->Cell(100, 5, 'Bill to', 0, 1); //end of line 

//add dummy cell at beginning of each line for indention 
$pdf->Cell(10, 5, '', 0, 0); 
$pdf->Cell(90, 5, '[name]', 0, 1); 

$pdf->Cell(10, 5, '', 0, 0); 
$pdf->Cell(90, 5, '[company]', 0, 1); 

$pdf->Cell(10, 5, '', 0, 0); 
$pdf->Cell(90, 5, '[Address]', 0, 1); 

$pdf->Cell(10, 5, '', 0, 0); 
$pdf->Cell(90, 5, '[Phone]', 0, 1); 

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 10, '', 0, 1); //end of line 

//invoice contents
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(130, 5, 'Description', 1, 0);
$pdf->Cell(25,  5, 'Taxable',     1, 0);
$pdf->Cell(34,  5, 'Amount',      1, 1); //end of line 

$pdf->SetFont('Arial', '', 12);

//Numbers are right-aligned so we give 'R' after new line parameter
$pdf->Cell(130, 5, 'UltraCool Fridge', 1, 0);
$pdf->Cell(25,  5, '-',1, 0);
$pdf->Cell(34,  5, '3,250',1, 1,'R'); //end of line 

$pdf->Cell(130, 5, 'Supaclean Dishwasher', 1, 0);
$pdf->Cell(25,  5, '-',1, 0);
$pdf->Cell(34,  5, '1,200',1, 1,'R'); //end of line 

$pdf->Cell(130, 5, 'UltraCool Fridge', 1, 0);
$pdf->Cell(25,  5, '-',1, 0);
$pdf->Cell(34,  5, '1,000',1, 1,'R'); //end of line 

//summary 
$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25,  5, 'Subtotal',0, 0);
$pdf->Cell(4,   5, '$',1, 0);
$pdf->Cell(30,  5, '4,450',1, 1,'R'); //end of line 

$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25,  5, 'Taxable',0, 0);
$pdf->Cell(4,   5, '$',1, 0);
$pdf->Cell(30,  5, '0',1, 1,'R'); //end of line 

$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25,  5, 'Tax Rate',0, 0);
$pdf->Cell(4,   5, '$',1, 0);
$pdf->Cell(30,  5, '10%',1, 1,'R'); //end of line 

$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25,  5, 'Total Due',0, 0);
$pdf->Cell(4,   5, '$',1, 0);
$pdf->Cell(30,  5, '4450',1, 1,'R'); //end of line */

$pdf->Output();
?>