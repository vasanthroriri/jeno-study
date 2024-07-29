<?php
    include "../class.php";

//    echo  $id = $_GET['payment_id'];
   $id = $_GET['payment_id'];
    // $id = 1;

    // Validate and sanitize the input
    if (!is_numeric($id)) {
        die("Invalid payment ID");
    }     

    $select_sql = "SELECT 
    `pay_id`
    , `pay_admission_id`
    , `pay_student_name`
    , `pay_year`
    , `pay_paid_method`
    , `pay_transaction_id`
    , `pay_description`
    , `pay_university_fees` 
    , `pay_study_fees`
    , `pay_total_amount`
    , `pay_balance`
    , `pay_date` 
    FROM `jeno_payment_history` 
    WHERE pay_id = $id 
    AND pay_status = 'Active';";


    $result = $conn->query($select_sql);

    if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
        $admisionId = $row['pay_admission_id'];
        $pay_student_name = $row['pay_student_name'];
        $pay_year = $row['pay_year'];
        $pay_paid_method = $row['pay_paid_method'];
        $pay_university_fees = $row['pay_university_fees'];
        $pay_study_fees = $row['pay_study_fees'];
        $pay_date = $row['pay_date'];

    
    } else {
    echo "0 results";
    }



    $fees_select_sql = "SELECT 
    a.fee_id 
    , a.fee_admision_id 
    , a.fee_stu_id 
    , a.fee_uni_fee_total 
    , a.fee_uni_fee 
    , a.fee_sdy_fee_total 
    , a.fee_sty_fee
    ,b.stu_cou_id 
    FROM `jeno_fees` AS a
     LEFT JOIN jeno_student AS b
      ON a.fee_stu_id = b.stu_id 
      WHERE a.fee_admision_id = '$admisionId'
       AND a.fee_status ='Active'
        AND b.stu_status ='Active'; ";


    $fees_result = $conn->query($fees_select_sql);

    if ($fees_result->num_rows > 0) {
    // Output data of each row
    $fee = $fees_result->fetch_assoc();
        $fee_id = $fee['fee_id'];
        $fee_admision_id = $fee['fee_admision_id'];
        $Student_course = courseNameOnly($fee['stu_cou_id']);
        $fee_sdy_fee_total = $fee['fee_sdy_fee_total'];
        $fee_uni_fee_total = $fee['fee_uni_fee_total'];
        $fee_uni_fee = $fee['fee_uni_fee'];
        $fee_sty_fee = $fee['fee_sty_fee'];

        $fees_toral = $fee_sdy_fee_total + $fee_uni_fee_total ;

        $fees_recived_toral = $fee_uni_fee + $fee_sty_fee ;

        $balanceFees = $fees_toral - $fees_recived_toral ;

    
    } else {
    echo "0 results";
    }





    $conn->close();

    function numberToWords($number) {
        $words = array(
            0 => '',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'forty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety',
            100 => 'hundred',
            1000 => 'thousand',
            1000000 => 'million',
            1000000000 => 'billion',
        );
    
        if ($number == 0) {
            return 'zero';
        }
    
        if ($number < 21) {
            return $words[$number];
        }
    
        if ($number < 100) {
            return $words[10 * floor($number / 10)] . ' ' . $words[$number % 10];
        }
    
        if ($number < 1000) {
            return $words[floor($number / 100)] . ' hundred ' . numberToWords($number % 100);
        }
    
        if ($number < 1000000) {
            return numberToWords(floor($number / 1000)) . ' thousand ' . numberToWords($number % 1000);
        }
    
        if ($number < 1000000000) {
            return numberToWords(floor($number / 1000000)) . ' million ' . numberToWords($number % 1000000);
        }
    
        return numberToWords(floor($number / 1000000000)) . ' billion ' . numberToWords($number % 1000000000);
    }
    

    // Include the FPDF library
    require('../fpdf186/fpdf.php');

    // Create a class extending FPDF
    class PDF extends FPDF
    {
    // Header
    function Header()
    {
        // Set font to Arial bold 15
        $this->SetFont('Arial', 'B', 20);

        // Title
        $this->Cell(0, 10, 'Bill Receipt', 0, 1, 'C');
        $this->Ln(5);

        // Move to the right
        $this->Cell(70);

        // Left logo
        $this->Image('../image/jenoLogopng.png', 10, 4, 50); // Adjust the path and size as needed

        
        // Company name
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'JENO STUDY CENTER MS UNIVERSITY', 0, 1, 'R');
        

        // Address
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'RORIRI IT PARK, NALLANATHAPURAM, Kalakkad, Keela Karuvelankulam, Tamil Nadu 627502', 0, 1, 'R');
        // Line break
        $this->Ln(10);
    }

    // Footer
        function Footer()
        {
            $this->SetY(-70);
            $this->SetFont('Arial', 'B', 12);
            $this->SetFont('Arial', 'B', 12);
            $this->Image('../image/seal.png', 90, 190, 45);
            $this->Image('../image/sign.png', 150, 193, 40);
            $this->Cell(0,10,"Authorized Signature",0,1,"R");
            
            
            
            
            
            $this->Ln(10);
            $this->SetY(-25);
            $this->Cell(0,10,"",'B',1);
            $this->Ln(10); // Adjust the line height as needed
            $this->SetY(-25);
            $this->SetFont('Arial', '', 10);
            $this->Cell(0,10,"Mobile : 9894653254  || email : contact@jeno.com   ",0,1,"c");
            $this->SetY(-23);
            $this->Cell(0,6,"Thankyou from Jeno Study Center MS University.",0,1,"R");
            
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }

    // Create a new PDF instance
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    // Set font for the document
    $pdf->SetFont('Arial', '', 12);

    // Add invoice content
    $pdf->Cell(0, 10, 'Name: '.$pay_student_name, 'T', 0,'L');
    $pdf->Cell(0, 10, 'Date: ' . $pay_date, 'T', 1,'R');
    $pdf->Cell(0, 10, 'Receipt Number: BRT-00'.$id, 0, 0,'L');
    $pdf->Cell(0, 10, 'Admission No:'.$admisionId, 0, 1,'R');
    $pdf->Cell(0, 10, 'Student Course :'.$Student_course, 0, 1,'L');
    
    $pdf->Ln(); // Move to the next line

    // Add item details to the table
    
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 15, 'S.No', 1, 0, 'C'); 
    $pdf->Cell(40, 15, 'Payment Method', 1, 0, 'C');// Changed alignment to center
    $pdf->Cell(40, 15, 'University Fees', 1, 0, 'C'); // Adjusted width and changed alignment to center    
    $pdf->Cell(40, 15, 'Total Fees', 1, 1, 'C'); // Adjusted width and changed alignment to center
    $pdf->SetFont('Arial', '', 10);

    
    $pdf->Cell(30, 12, 1, 1);
    $pdf->Cell(40, 12, $pay_paid_method, 1); 
    $totalAmt =$pay_university_fees + $pay_study_fees ;
    $pdf->Cell(40, 12, $totalAmt, 1,0,'R');  
    $pdf->Cell(40, 12, $totalAmt, 1, 0,'R'); // Border on the left and right sides

    $pdf->Ln();
 
   
    // Format the total amount to two decimal places
    $formattedTotalAmt = number_format($totalAmt, 2, '.', ',');

    // Convert total amount to words
    $totalAmtInWords = numberToWords($totalAmt);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(110, 15, ucfirst($totalAmtInWords), 1, 0, 'C'); // No border, aligned left, and move to next line
    // Add the cell with the "Total:" label
    $pdf->Cell(40, 15, 'Total:', 1, 0, 'R'); // Adjusted alignment to left for the label
    // Add the cell with the formatted total amount, aligned to the right
    $pdf->Cell(40, 15, $formattedTotalAmt, 1, 1, 'R'); // Adjusted alignment to right for the total amount

    // Add the cell with the total amount in words


    
    $pdf->Cell(150, 15, 'Balance:', 1, 0, 'R'); // Adjusted alignment to right
    $pdf->Cell(40, 15, '' . $balanceFees, 1, 1, 'R'); // Adjusted alignment to right and added line break

    // No need to specify the file path
    $pdf->Output("BillRecipt.pdf", 'D'); // Force download the PDF
    //echo "PDF invoice created successfully.";
?>
