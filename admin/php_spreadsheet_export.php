<?php

//php_spreadsheet_export.php
include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;


$connect = new PDO("mysql:host=localhost;dbname=apsystem", "root", "");


$query = "SELECT *, employees.id AS empid FROM employees LEFT JOIN position ON position.id=employees.position_id WHERE reason IS NULL ORDER BY lastname ASC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

if(isset($_POST["export"]))
{
  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();

  $active_sheet->setCellValue('A1', 'SYSTEM ID');
  $active_sheet->setCellValue('B1', 'NAME');
  $active_sheet->setCellValue('C1', 'PLANTILLA');
  $active_sheet->setCellValue('D1', 'SG');
  $active_sheet->setCellValue('E1', 'MONTHLY RATE');
  $active_sheet->setCellValue('F1', 'BIRTHDAY');
  $active_sheet->setCellValue('G1', 'AGE');
  $active_sheet->setCellValue('H1', 'CONTACT');
  $active_sheet->setCellValue('I1', 'DATE HIRED');
  $active_sheet->setCellValue('J1', 'GSIS BP NUMBER');
  $active_sheet->setCellValue('K1', 'PHILHEALTH NO. (MDR)');
  $active_sheet->setCellValue('L1', 'PAG-IBIG NO. (MDF)');
  $active_sheet->setCellValue('M1', 'BIR T.I.N.');
  $active_sheet->setCellValue('N1', 'COMELEC V.I.N. / V.R.R. NO.');
  $active_sheet->setCellValue('O1', 'GREEN CARD NO.');
  $active_sheet->setCellValue('P1', 'REMARKS');
  $active_sheet->setCellValue('Q1', 'VACCINATED');

  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["employee_id"]);
    $active_sheet->setCellValue('B' . $count, $row["lastname"].', '.$row["firstname"]);
    $active_sheet->setCellValue('C' . $count, $row["description"]);
    $active_sheet->setCellValue('D' . $count, $row["sg"]);
    $active_sheet->setCellValue('E' . $count, $row["monthly_rate"]);
    $active_sheet->setCellValue('F' . $count, date('M d, Y', strtotime($row['birthdate'])));
    $active_sheet->setCellValue('G' . $count, $row["age"]);
    $active_sheet->setCellValue('H' . $count, $row["contact_info"]);
    $active_sheet->setCellValue('I' . $count, date('M d, Y', strtotime($row['created_on'])));
    $active_sheet->setCellValue('I' . $count, $row["gsis"]);
    $active_sheet->setCellValue('K' . $count, $row["philhealth"]);
    $active_sheet->setCellValue('L' . $count, $row["pagibig"]);
    $active_sheet->setCellValue('M' . $count, $row["bir"]);
    $active_sheet->setCellValue('N' . $count, $row["comelec"]);
    $active_sheet->setCellValue('O' . $count, $row["green_card"]);
    $active_sheet->setCellValue('P' . $count, $row["remarks"]);
    $active_sheet->setCellValue('Q' . $count, $row["vaccinated"]);

    $count = $count + 1;
  }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

  $file_name = time() . '.' . strtolower($_POST["file_type"]);

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);

  exit;

}

?>
<!DOCTYPE html>
<html>
   <head>
     <title>Employee - Export to Excel File</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   </head>
   <body>
     <div class="container">
      <br />
      <h3 align="center"><b>EXPORT EMPLOYEE DATA FROM WEBPAGE TO EXCEL FILE</b></h3>
      <br />
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post">
              <div class="row">
                <div class="col-md-4">
                  <select name="file_type" class="form-control input-sm">
                    <option value="Xlsx">.xlsx</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="export" class="btn btn-primary btn-sm" value="Export" />
                </div>
              </div>
            </form>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
           <table class="table table-striped table-bordered">
                <tr>
                  <th>SYSTEM ID</th>
                  <th>NAME</th>
                  <th>PLANTILLA</th>
                  <th>SG</th>
                  <th>MONTHLY RATE</th>
                  <th>BIRTHDAY</th>
                  <th>AGE</th>
                  <th>CONTACT</th>
                  <th>DATE HIRED</th>
                  <th>GSIS BP NUMBER</th>
                  <th>PHILHEALTH NO. (MDR)</th>
                  <th>PAG-IBIG NO. (MDF)</th>
                  <th>BIR T.I.N.</th>
                  <th>COMELEC V.I.N. / V.R.R. NO.</th>
                  <th>GREEN CARD NO.</th>
                  <th>REMARKS</th>
                  <th>VACCINATED</th>
                </tr>
                <?php

                foreach($result as $row)
                {
                  echo '
                  <tr>
                    <td>'.$row["employee_id"].'</td>
                    <td>'.$row["lastname"].', '.$row["firstname"].'</td>
                    <td>'.$row["description"].'</td>
                    <td>'.$row["sg"].'</td>
                    <td>'.$row["monthly_rate"].'</td> 
                    <td>'.date('M d, Y', strtotime($row['birthdate'])).'</td>
                    <td>'.$row["age"].'</td>
                    <td>'.$row["contact_info"].'</td>
                    <td>'.date('M d, Y', strtotime($row['created_on'])).'</td>
                    <td>'.$row["gsis"].'</td>
                    <td>'.$row["philhealth"].'</td>
                    <td>'.$row["pagibig"].'</td>
                    <td>'.$row["bir"].'</td>
                    <td>'.$row["comelec"].'</td>
                    <td>'.$row["green_card"].'</td>
                    <td>'.$row["remarks"].'</td>
                    <td>'.$row["vaccinated"].'</td>
                  </tr>
                  ';
                }
                ?>

              </table>
          </div>
          </div>
        </div>
     </div>
      <br />
      <br />
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  </body>
</html>
