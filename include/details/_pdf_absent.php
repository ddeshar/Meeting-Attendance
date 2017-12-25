<?php
error_reporting(0);
include ('../dbconnect.php');
include ('../function.php');
require_once('../tcpdf/config/lang/thai.php');
require_once('../tcpdf/tcpdf.php');

class my_pdf extends TCPDF {

      //Page header
      public function Header() {
      	$file = 'image/mwa01.png';
        $this->Image($file, 15, 3, '', '', 'PNG', '', 'T', false, 600, '', false, false, 0, false, false, false);
      }

      // Page footer
      public function Footer() {
      	$this->SetFont('thsarabun', '', 14, '', true);
      	$footer_text = '<div><b>หมายเหตุ:</b> ลำดับเรียงตามเวลาสแกนบตัรเข้าที่ประชุม</div>';               
        // $this->writeHTMLCell(100, 50, 10, 285, $footer_text, 0, 0, 0, true, 'L', true);  
		$this->writeHTML($footer_text, true, true, true, true, '');
      }
}

// create new PDF document
$pdf = new my_pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPageOrientation('p'); // PDF_PAGE_ORIENTATION---> 'l' or 'p'
// set document information
$pdf->SetCreator('Ben');
$pdf->SetAuthor('BEN');
$pdf->SetTitle('การประชุมพระสังฆาธิการ');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
// $pdf->SetMargins(8, 10, 8, 10); // left = 2.5 cm, top = 4 cm, right = 2.5cm
$pdf->SetMargins(PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
$pdf->SetFont('thsarabun', '', 18, '', true);

// Add a page
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$i = "01";
// Set some content to print

$detail_id = $_GET["id"];

if(isset($_GET["id"])){
        $detail_id = $_GET["id"];
        $sql = "SELECT * FROM detail WHERE detail_id='$detail_id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $subject    = $row["subject"];
            $date       = DateThai($row["date"]);
        }else{
            $subject    = "";
            $date       = "";
        }
    }

$ft = ' <div style="text-align:center">
            <b>การประชุมพระสังฆาธิการ</b><br />  
            <b> ในเขตปกครองคณะสงฆ์อำเภอเมืองฉะเชิงเทรา</b><br />
            <b>เรื่อง '.$subject.'</b><br /> 
            <b>ในวันที่ '.$date.'</b><br /> 
            <b>ณ สำนักงานเจ้าคณะอำเภอเมืองฉะเชิงเทรา</b><br />
            <b>วัดบางปรงธรรมโชติการราม ตำบลบางพระ อำเภอเมืองฉะเชิงเทรา จังหวัดฉะเชิงเทรา</b><br />
        </div> ';
$pdf->writeHTML($ft, true, false, true, false, '');
$pdf->SetFont('thsarabun', '', 16, '', true);

$html = '';
$html = '<hr />';
$html .= '<table cellspacing="0" cellpadding="1" border="1">';
//Header
$html .= "<thead>";
$html .= "<tr>";
$html .= '<th  width="5%" align="center">ที่</th>';
$html .= '<th  width="35%" align="center">ชื่อ</th>';
$html .= '<th  width="25%" align="center">วัด</th>';
$html .= '<th  width="35%" align="center">ตำแหน่ง</th>';
$html .= "</tr>";
$html .= "</thead>";

$sql = "SELECT
            members.`name`,
            members.chaya,
            members.lastname,
            positions.position_name,
            wats.wat_name
        FROM members
        LEFT JOIN meeting_mem ON meeting_mem.meeting_nationalid = members.nationalid
        INNER JOIN positions ON members.position = positions.position_id
        INNER JOIN wats ON members.wat = wats.wat_id
        WHERE meeting_mem.meeting_detail_id = '$detail_id'
        AND meeting_mem.meeting_nationalid NOT IN (
            (
                SELECT members_nationalid
                FROM time
                WHERE detail_id = '$detail_id'
            )
        )";
$respdf = mysqli_query($conn, $sql);

//Content
$html .= "<tbody>";
$p = 1;
while ( $prow = mysqli_fetch_array($respdf)){
        $pname                = $prow["name"];
        $pchaya               = $prow["chaya"];
        $plastname            = $prow["lastname"];
        $pwat_name            = $prow["wat_name"];
        $pposition_name       = $prow["position_name"];
$t = $p++;
  $html .= "<tr nobr='true'>";
  $html .= "<td width=\"5%\" align=\"center\">$t</td>";
  $html .= "<td width=\"35%\">$pname $pchaya $plastname</td>";
  $html .= "<td width=\"25%\">$pwat_name</td>";
  $html .= "<td width=\"35%\">$pposition_name</td>";
  $html .= "</tr>";
}
$html .= "</tbody>";
$html .= "</table>";

$html .= '  <br />
            <div style="text-align:center">
                <b>รับรองตามนี้</b><br /> <br /> <br /> 
                <b> (พระครูโชติพัฒนากร)</b><br />
                <b>เจ้าคณะอำเภอเมืองฉะเชิงเทรา</b><br />
            </div>';
// Print text using writeHTMLCell()
// $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

$pdf->lastPage(); 

//============================================================+
// END OF FILE
//============================================================+
?>