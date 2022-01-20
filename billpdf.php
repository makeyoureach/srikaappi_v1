<?php
    require('fpdf184/fpdf.php');

    require_once "dbConfig.php";
    
    $bill= 0;
    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }

    $sql = "SELECT billnumber FROM sri_recepit ORDER BY billnumber DESC LIMIT 1";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $bill=$row["billnumber"];
        }
    }

    // $sql="select * from sri_recepit";
    // $res=$con->query($sql);
    // $bill= 0;
    // while($row=$res->fetch_assoc()){
    // $bill=$row["billnumber"];
    // }

    $sql="select * from selected_items";
    $res=$con->query($sql);
    
    $count=0;

    $sql = "SELECT id FROM selected_items ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
            $count=$row["id"];
        }
        
    }

    $billHeight=77+(6*$count);

    // while($row=$res->fetch_assoc()){
    //    $count++;
    //    $billHeight=$billHeight+6;
    // }


    $pdf = new FPDF('P','mm',array(58,$billHeight));
    $pdf->AddPage(); 
    $pdf->SetFont('Arial','',5);
    $pdf->SetLeftMargin(1);
    $pdf->SetRightMargin(1);
    $pdf->SetAutoPageBreak(false);
    $pdf->SetTopMargin(0);
    $pdf->Cell(38,5,'.',0,1,'C');
    $pdf->Cell(56,5,'_',0,1,'C');
    $pdf->SetFont('Arial','B',6.5);
    $pdf->Cell(55,5,'SRI KAAPPI',0,1,'C');
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(55,5,'THE ROYAL TASTE OF KOVAI',0,1,'C');
    $pdf->SetFont('Arial','',6);
    $pdf->MultiCell(55,3,'118 RAJA STREET, KK PLAK, COIMBATORE 641001',0,'C',false);
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(55,5,'CASH BILL',0,1,'C');

    
    $pdf->SetFont('Arial','',6);
    date_default_timezone_set('Asia/Kolkata');
    $pdf->Cell(10,5,' Bill no:',0,0);
    $pdf->Cell(18,5,$bill,0,0);
    $pdf->Cell(10,5,'Date:',0,0);
    $pdf->Cell(10,5,date("Y/m/d"),0,1);
    $pdf->Cell(28,5,'',0,0);
    $pdf->Cell(10,5,'Time:',0,0);
    $pdf->Cell(10,5,date("h:i a"),0,1);
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(29,5,'Items',0,0,'C');
    $pdf->Cell(9,5,'Qty',0,0,'C');
    $pdf->Cell(15,5,'Amt',0,1,'C');
    $pdf->SetFont('Arial','',6);
    $pdf->Ln(2);
    
    $pdf->Line(1,43,56,43);

    if(!$con){
        die("Connection error ".mysqli_connect_error());
    }
    $sql="select * from selected_items";
    $res=$con->query($sql);
    
    $width=54;

    $count=0;
    $total=0;

    while($row=$res->fetch_assoc()){
    // echo "<tr>
    // <td></td>
    // <td>{$row["quantity"]}</td>
    // <td>{$row["amount"]}</td>
    // </tr>";
    if($count==0){
        $pdf->MultiCell(30,-2,$row["items"],0,'C');
    }else{
        $pdf->MultiCell(30,6,$row["items"],0,'C');
    }
    $pdf->SetXY(30,$width);
    $pdf->Cell(9,0,$row["quantity"],0,0,'C');
    $pdf->Cell(15,0,$row["amount"],0,1,'C');
    
     $pdf->Cell(15,3,'',0,0,'C');
    $pdf->Cell(10,3,'',0,0,'L');
    $pdf->Cell(18,3,'',0,0,'R');
    $pdf->Cell(10,3,'',0,1,'L');

    $total=$row["amount"]+$total;
    $count++;
    $width=$width+6;
    }

    $sql="Truncate table selected_items";
    $res=$con->query($sql);
    // $pdf->Cell(15,3,'',1,0,'C');
    // $pdf->Cell(10,3,'',1,0,'L');
    // $pdf->Cell(18,3,'',1,0,'R');
    // $pdf->Cell(10,3,'',1,1,'L');

    $pdf->Cell(15,16,'Tot Items: ',0,0,'C');
    // $pdf->SetFont('Arial','B',6);
    $pdf->Cell(10,16,$count,0,0,'L');
    $pdf->SetFont('Arial','',6); 
    $pdf->Cell(18,16,'Tot Amt: ',0,0,'R');
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(10,16,$total.'.00',0,1,'L');
    $pdf->SetFont('Arial','B',6);
    
    // $pdf->Ln(2);
    $pdf->Cell(55,0,"******************************************************************",0,1,'L');
    $pdf->Ln(1);
    $pdf->Cell(55,3,"******************************************************************",0,1,'L');
    $pdf->Ln(1);
    $pdf->Ln(2);
    
    // $pdf->Cell(55,1,"***********************************************",0,0,'L');
    // $pdf->Ln(1);
    // $pdf->Cell(55,6,"***********************************************",0,1,'L');

    // $pdf->Line(1,47,54,47);
    // $pdf->Line(1,47,54,47);
    
    
    $output=$pdf->Output("bill.pdf",'I');
    // echo "<script>window.location.href='home.php';</script>";
    echo $output;
?>